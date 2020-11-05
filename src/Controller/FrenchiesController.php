<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Frenchies Controller
 *
 * @property \App\Model\Table\FrenchiesTable $Frenchies
 *
 * @method \App\Model\Entity\Frenchy[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FrenchiesController extends AppController
{

    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
    parent::beforeFilter($event);
    // configure the login action to don't require authentication, preventing
    // the infinite redirect loop issue
    $this->Authentication->addUnauthenticatedActions(['get']);
    }
    
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $u= $this->Authentication->getResult()->getData();
        $this->allow([2,4,6,12]);
        $frenchies=null;
        $this->paginate = [
            'contain' => ['Frenchietypes', 'States', 'Districts'],
        ];
        if($u->role_id==2 || $u->role_id==12)
            $frenchies = $this->paginate($this->Frenchies);
        else
        if($u->role_id==4 || $u->role_id==6){
            
            $frenchies = $this->paginate($this->Frenchies,['conditions'=>['sponsor '=>$u->username]]);
        }
        $this->set(compact('frenchies','u'));
    }

    /**
     * View method
     *
     * @param string|null $id Frenchy id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $frenchy = $this->Frenchies->get($id, [
            'contain' => ['Frenchietypes', 'States', 'Districts'],
        ]);

        $this->set('frenchy', $frenchy);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {

        $u= $this->Authentication->getResult()->getData();
        

        $this->allow([2,4,12,6]);

        
        $max_id=0;

        if($u->role_id==2 || $u->role_id==12){
            $frenchietypes=$this->Frenchies->Frenchietypes->find()->combine('scope', 'name');
            }
        else
        if($u->role_id==4 || $u->role_id==6){
                $f=$this->Frenchies->get($u->username);
                $max_id=$f->frenchietype_id;
                $frenchietypes=null;

                if($max_id==1){
                    $frenchietypes=$this->Frenchies->Frenchietypes->find('all')->where(['scope'=>3])->combine('scope', 'name');// select(['id'=> 'scope','name'])->toArray();
             
                }
                
              //  $frenchietypes=$this->Frenchies->Frenchietypes->find('all')->where(['scope'=>4])->combine('scope', 'name');// select(['id'=> 'scope','name'])->toArray();
             
            }

        $frenchy = $this->Frenchies->newEmptyEntity();
        $states = $this->Frenchies->States->find('list', ['limit' => 200]);
        
        $frenchy->registered='Y';
        $this->loadModel('Users');
        if ($this->request->is('post')) {
            $frenchy = $this->Frenchies->patchEntity($frenchy, $this->request->getData());
            
          //  if($u->role_id==4||$u->role_id==2){
                $frenchy->sponsor=$u->username;
            //}
        
            $user=$this->Users->newEmptyEntity();
            
            $pass=$this->generatePassword();
            $user->password=$pass;
            $user->role_id=4;
            if($u->role_id==6){
                    $frenchy->frenchietype_id=4;
                    $user->role_id=6;
                
            }else
            {
                if($frenchy->frenchietype_id==4){
                    $user->role_id=6;
                
                }
            }
            $frenchy->id=$this->generateID( $frenchy->frenchietype_id);
            //if($frenchy->frenchietype_id >$max_id)
            $user->username=$frenchy->id;
            $user->refid=$frenchy->id;

            if ($this->Users->save($user) &&  $this->Frenchies->save($frenchy)) {
                $this->Flash->success(__('The Franchise has been saved.'));
                $message='Thanks!,Dear Franchisee  Your user id '.$frenchy->id.' and password is '.$pass.' Plz visit www.friendsnetindia.com .';
                $this->sendSMS($frenchy->mobile,$message);

                return $this->redirect(['action' => 'index']);
            }
            $this->set(compact('frenchy', 'frenchietypes', 'states'));

            $this->Flash->error(__('The Franchise could not be saved. Please, try again.'));
        }
       // $frenchietypes = $this->Frenchies->Frenchietypes->find('list', ['limit' => 200]);
       $this->set(compact('frenchy', 'frenchietypes', 'states'));
        
    }

    /**
     * Edit method
     *
     * @param string|null $id Frenchy id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $u= $this->Authentication->getResult()->getData();
        

        $this->allow([2,12]);

        $max_id=0;

        $frenchy = $this->Frenchies->get($id, [
            'contain' => [],
        ]);


        $sp=    $frenchy->sponsor;
        $type=    $frenchy->frenchietype_id;
        $max_id=0;

        if( ($u->role_id==4 || $u->role_id==6)  && $u->username<>$sp)
            return;
            
     
        if ($this->request->is(['patch', 'post', 'put'])) {
            $frenchy = $this->Frenchies->patchEntity($frenchy, $this->request->getData());

            if($u->role_id!=2)
                $frenchy->sponsor=$sp;
            
             $frenchy->frenchietype_id=$type;

            if ($this->Frenchies->save($frenchy)) {
                $this->Flash->success(__('The Franchise has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            //debug($frenchy);
            $this->Flash->error(__('The Franchise could not be saved. Please, try again.'));
        }
        //$frenchietypes = $this->Frenchies->Frenchietypes->find('list', ['limit' => 200]);
        
        $states = $this->Frenchies->States->find('list', ['limit' => 200]);
        $districts = $this->Frenchies->Districts->find('list', ['conditions'=>['state_id'=>$frenchy->state_id]]);
        $this->set(compact('frenchy', 'states', 'districts','u'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Frenchy id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    
    public function generateID($type){
        $types=['1'=>'SP','2'=>'DF','3'=>'CF','4'=>'HF'];
        $id="FNIF". $types[$type] . str_pad(''.rand(1,999999),6,'0',STR_PAD_LEFT);

        return $id;

    }

    public function get($id = null)
    {
       
        $member = $this->Frenchies->find('all',['fields'=>'name'])->where(['id'=>$id]);
        if($member){
        return $this->response->withType('application/json')->withStringBody(json_encode(['status'=>'ok','result' => $member]));
        }
        return $this->response->withType('application/json')->withStringBody(json_encode(['status'=>'error' ]));
        
    }
    public function generatePassword(){

        $id=str_pad(''.rand(1,99999999),8,'0',STR_PAD_LEFT);

        return $id;

    }

}
