<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Datasource\ConnectionManager;
use Cake\I18n\FrozenDate;

/**
 * Payout Controller
 *
 * @property \App\Model\Table\PayoutTable $Payout
 *
 * @method \App\Model\Entity\Payout[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PayoutController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        // configure the login action to don't require authentication, preventing
        // the infinite redirect loop issue
        $this->Authentication->addUnauthenticatedActions(['generateenolpqxudred','admindashborad']);
    }
    public function admindashborad(){
        $connection = ConnectionManager::get('default');

        $connection->execute('call sp_dash_admin()');
        
        return $this->response->withType('application/json')->withStringBody(json_encode(['status'=>'ok']));
    
    }
    public function distbdashborad(){
        $connection = ConnectionManager::get('default');

        $connection->execute('call sp_dash_distb()');
        
        return $this->response->withType('application/json')->withStringBody(json_encode(['status'=>'ok']));
    
    }
    public function generateenolpqxudred()
    {

        $connection = ConnectionManager::get('default');

        
        $this->sendSMS('9835997959','Payout In Process');
        $this->sendSMS('8986666755','Payout In Process');
        $connection->execute("CALL sp_payout('N')");
             $this->sendSMS('9835997959','Payout Generated');
             $this->sendSMS('8986666755','Payout Generated');

        return $this->response->withType('application/json')->withStringBody(json_encode(['status'=>'ok']));
     
    }
    public function index($pid=null)
    {

        $u = $this->Authentication->getResult()->getData();
       

        $this->allow([2,13,5]);

        $this->paginate = [
            'contain' => ['Members','Payoutdt'],
        ];
        if($u->role_id==5){
            $this->paginate['conditions'] = ['member_id'=>$u->username,'payoutdt_id <>'=>0,'Payout.net_pay > '=>0];
            
        }
        else
        if($pid!=null){
            $this->paginate['conditions'] = ['payoutdt_id'=>$pid,'Payout.net_pay > '=>0];
        }
        else{
            
            $this->paginate['conditions'] = ['payoutdt_id <>'=>0,'Payout.net_pay > '=>0];
           
        }
        $payout = $this->paginate($this->Payout);

        $this->set(compact('payout','u'));
        $this->set('title','Payout');
    }
    public function mock()
    {

        $u = $this->Authentication->getResult()->getData();
        $this->allow([2]);

        $connection = ConnectionManager::get('default');

        $connection->execute("CALL sp_payout('Y')");
      

        $this->paginate = [
            'contain' => ['Members'],
        ];
        
            
            $this->paginate['conditions'] = ['payoutdt_id'=>0,'net_pay > '=>0];
           
        
        $payout = $this->paginate($this->Payout);

        $this->set(compact('payout','u'));

        $this->set('title','Mock Payout for Current Week');
        return $this->render('index');


    }
    public function sponsor($p_id,$mem_id)
    {

        $u = $this->Authentication->getResult()->getData();

        $this->allow([2,5,13]);

        $u->role_id==2;
       
        $this->paginate = [
            'contain' => ['Members'],
        ];
        
            
        $this->paginate['conditions'] = ['payoutdt_id'=>$p_id,'Payout.sponsor'=>$mem_id,'Payout.net_pay >' => 0];
           
        
        $payout = $this->paginate($this->Payout);

        $this->set(compact('payout','u'));
        $this->set('title','Sponsor Income for Distributor '.$mem_id);
     //   return $this->render('index');


    }
    /**
     * View method
     *
     * @param string|null $id Payout id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null,$p_id=null)
    {
        $u = $this->Authentication->getResult()->getData();
        $this->allow([2,5,13]);

        
        if($u->role_id==2 || $u->role_id==13){
            $payout = $this->Payout->get($id, [
                'contain' => ['Members','Payoutdt'],
            ]);
    
        }else{
            $payout = $this->Payout->find('all', [
                'contain' => ['Members','Payoutdt'],
            ])->where(['member_id'=>$u->username,'payoutdt_id'=>$p_id]);
        }
       
        $this->set('payout', $payout);
    }

    
}
