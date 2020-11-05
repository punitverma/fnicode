<?php
declare(strict_types=1);

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Http\Exception\ForbiddenException;
use Cake\Http\Exception\NotFoundException;
use Cake\Http\Response;
use Cake\View\Exception\MissingTemplateException;
use Cake\Datasource\Exception\InvalidPrimaryKeyException;
use Cake\Database\Expression\QueryExpression;
use Cake\Datasource\ConnectionManager;
/**
 * Static content controller
 *
 * This controller will render views from templates/Pages/
 *
 * @link https://book.cakephp.org/4/en/controllers/pages-controller.html
 */
class PagesController extends AppController
{
    /**
     * Displays a view
     *
     * @param array ...$path Path segments.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Http\Exception\ForbiddenException When a directory traversal attempt.
     * @throws \Cake\View\Exception\MissingTemplateException When the view file could not
     *   be found and in debug mode.
     * @throws \Cake\Http\Exception\NotFoundException When the view file could not
     *   be found and not in debug mode.
     * @throws \Cake\View\Exception\MissingTemplateException In debug mode.
     */

    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        // configure the login action to don't require authentication, preventing
        // the infinite redirect loop issue
      //  $this->Authentication->addUnauthenticatedActions(['admindashborad']);
    }
    public function display(...$path): ?Response
    {
        if (!$path) {
            return $this->redirect('/login');                                                                                                                                                                                                                                                                                                                           
        }
        if (in_array('..', $path, true) || in_array('.', $path, true)) {
            throw new ForbiddenException();
        }
        $page = $subpage = null;

        if (!empty($path[0])) {
            $page = $path[0];
        }
        if (!empty($path[1])) {
            $subpage = $path[1];
        }
        $this->set(compact('page', 'subpage'));

        try {
           // $this->layout = 'home';
        
            $this->viewBuilder()->setLayout('landing');
            if($path[0]=='home'){
                return $this->redirect('/login');
            
            }
            else
            return $this->render(implode('/', $path));
        } catch (MissingTemplateException $exception) {
            if (Configure::read('debug')) {
                throw $exception;
            }
            throw new NotFoundException();
        }

        return $this->render();
    }
    public function districts($state_id){
        
        $this->loadModel('Districts');
        $result=$this->Districts->find('list')->where(['state_id'=>$state_id]);
                
        return $this->response->withType('application/json')->withStringBody(json_encode(['result' => $result]));
        
    }
    public function ifsc($code){
        $this->loadModel('Banks');
        
        try{
        $result=$this->Banks->find('all')->where(['IFSC'=>$code])->first();
        if($result)
        return $this->response->withType('application/json')->withStringBody(json_encode(['result' => 'ok','bank'=>$result]));
        else
        return $this->response->withType('application/json')->withStringBody(json_encode(['result' => 'error']));
        }
        catch(InvalidPrimaryKeyException  $exception  )
        {
            return $this->response->withType('application/json')->withStringBody(json_encode(['result' => 'error','ex'=>$exception]));
        }
        
        
        
        
    }
    public function getstate($id,$type,$inv_id,$fromid){
        $u = $this->Authentication->getResult()->getData();
        $this->allow([2,4,6,12]);
     
        $connection = ConnectionManager::get('default');
        $this->loadModel('States');
        $this->loadModel('Invoices');
        $name='';
        $additional='';


       // die($u->role_id.'    '. $id);
       $result=null;
        if($this->startWith($id,'FNIF') )
        {
            $this->loadModel('Frenchies');

            
            if($u->role_id==2 || $u->role_id==4 ||$u->role_id==12)
            $result=$this->Frenchies->find('all',['contain'=>['States']])->select(['States.id','States.name','Frenchies.name','Frenchies.address','Frenchies.gst']);//->where(['Frenchies.id'=>$id,'Frenchies.frenchietype_id'=>($u->role_id==2 ? 2 : 4)]);


            $f= $this->Frenchies->get($fromid);
            
            $result=$result->where(['Frenchies.id'=>$id,'Frenchies.frenchietype_id > '=> $f->frenchietype_id ]);
            
            
            if($result==null)
            return $this->response->withType('application/json')->withStringBody(json_encode(['status'=>'error','result' => '']));

            //die($result);

            $result= $result->first();
            
        }
        else
        if($this->startWith($id,'FNI')  && ($u->role_id==6 || ($u->role_id==4 && $this->startWith($fromid,'FNIFCF') ) ))
        {
            /*$this->loadModel('Frenchies');
            $f=$this->Frenchies->get($u->username);

            if($f->frenchietype_id!=4){
                return $this->response->withType('application/json')->withStringBody(json_encode(['status'=>'error','result' => '']));
            }
            */
            $this->loadModel('Members');
            $mem=$this->Members->find('all')->where(['Members.id'=>$id])->first();
            
            if($mem==null)
            return $this->response->withType('application/json')->withStringBody(json_encode(['status'=>'error','result' => '']));
            
            $result=$this->Members->Addresses->find('all',['contain'=>['States']])->select(['States.id','States.name'])->where(['Addresses.id'=>$mem['address_id']]);
            if($mem->sponsor=='NA')
                $additional=['name'=>$mem->name,'sponsor_id'=>'N/A','sponsor_name'=>'N/A'];
            else
            {
                $sp=$this->Members->find()->where(['Members.id'=>$mem->sponsor])->select('name')->first();
                $additional=['name'=>$mem->name,'sponsor_id'=>$mem->sponsor,'sponsor_name'=>$sp->name];

            }
            
            $result= $result->first();
        }
        else
        if($type=='O'){
          
            $result=['id'=>20,'name'=>'Jharkhand'];
        }
        else
        {
            $this->loadModel('Manufactures');
            $result=$this->Manufactures->find('all',['contain'=>['States']])->select(['States.id','States.name'])->where(['Manufactures.id'=>$id]);
            $result= $result->first();
            
        }
         
        $inv=  ['toid'=>"'".$id."'",'tostate'=> is_null( $result->state->id) ? 0 : $result->state->id];
       
        //debug($this->Invoices->updateAll($inv,['id'=>$inv_id]));
       // $connection->execute('invoices', $inv, ['id'=>$inv_id]);
        //debug($inv);
        $gst=null;
        if(! is_null( $result->gst) && $result->gst<>'')
            $gst=$result->gst;
        $statement = $connection->execute(
            'UPDATE invoices SET toid = ? , tostate = ? , togst=? WHERE id = ?',
            [ $id, $result->state->id,$gst, $inv_id],
            ['text', 'integer','text' ,'integer']
            );
        return $this->response->withType('application/json')->withStringBody(json_encode(['status'=>'ok','result' => $result,'addl'=>$additional]));
        
    }
    function confirm($title,$message){

        $this->set(compact('title','message'));

    }
    function startWith($string,$start){
        $len=strlen($start);
        return ( substr($string,0,$len)==$start ) ;
    }
}
