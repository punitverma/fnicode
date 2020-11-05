<?php
declare(strict_types=1);


namespace App\Controller;
use Cake\Datasource\ConnectionManager;
use Cake\I18n\FrozenDate;
use Cake\Datasource\Exception\RecordNotFoundException;
/**
 * Members Controller
 *
 * @property \App\Model\Table\MembersTable $Members
 *
 * @method \App\Model\Entity\Member[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MembersController extends AppController
{

    public function beforeFilter(\Cake\Event\EventInterface $event)
{
parent::beforeFilter($event);
// configure the login action to don't require authentication, preventing
// the infinite redirect loop issue
$this->Authentication->addUnauthenticatedActions(['add','get','confirm']);
}
    
    /**
     * View method
     *
     * @param string|null $id Member id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
public function sendpassword($member_id){
    $this->allow([2]);

    $u = $this->Authentication->getResult()->getData();
    $refurl=$this->request->getData('refurl');
           
    $member=$this->Members->get($member_id);
    $this->loadModel('Users');
    $usr=$this->Users->newEmptyEntity();
    $usr=$this->Users->find()->where(['username'=>$member_id,'role_id'=>5])->first();
    if(! empty( $usr)){
        $password=$this->generatePassword();
        $usr->password=$password;

        $message='Thanks!,Dear Distributor  '. $member_id .' password is reset successfully  and password is '.$password.' Plz visit www.friendsnetindia.com .';
        //debug($usr);
        
        if($this->Users->save($usr)){
        $this->sendSMS($member['mobile'],$message);
        $this->Flash->success(__('Distributor Password Reset .'));

        }
        else
        {
            $this->Flash->error(__('Distributor Password Reset  Request is Failed. Please, try again.'));

        }
        return $this->redirect('/members');
      
    }
}
     public function edit($id = null)
    {
        $u = $this->Authentication->getResult()->getData();
     
        $refurl=$this->referer();
        if( $u->role_id==2 )
        {
            

        }else
        if( $u->role_id==5){
          //  $this->viewBuilder()->setLayout('member');
            $id=$u->username;

        }else
        {
            return null;

        }

        $member = $this->Members->get($id, [
            'contain' => ['Membertypes','Kycs','Addresses'],
        ]);
        
        $disable=false;
        
        if($u->role_id==5 && $member->father_name!=null)
            $disable=true;
        else
            $disable=false;    
        $this->loadModel('States');
        $states=$this->States->find('list');
        $this->loadModel('Districts');
        $districts=$this->Districts->find('list')->where(['state_id'=>$member->address->state_id]);
        
        if($member->sponsor<>'NA')
        $smember=$this->Members->get($member->sponsor);
        else
        $smember=null;

        if ($this->request->is(['patch', 'post', 'put'])) {
            
            $refurl=$this->request->getData('refurl');
            $refurl=base64_decode($refurl);
            if(!$disable){
            $member->father_name=$this->request->getData('father_name');
            $member->dob=$this->request->getData('dob');
            $member->gender=$this->request->getData('gender');
           
            $member->nominee_name=$this->request->getData('nominee_name');
            $member->nominee_age=$this->request->getData('nominee_age');
            $member->nominee_relation=$this->request->getData('nominee_relation');
            $member->marital_status=$this->request->getData('marital_status');
            }    

            $address=$member->address;
            $address->address = $this->request->getData('address');
            $address->state_id = $this->request->getData('state_id');
            $address->district_id = $this->request->getData('district_id');
            $address->pincode = $this->request->getData('pincode');

            $member->professional=$this->request->getData('professional');
            $member->email=$this->request->getData('email');
 

            if($u->role_id==2){
            $member->name=$this->request->getData('name');
            $member->mobile=$this->request->getData('mobile');
            
           // $member->kyc=$mem->kyc;
            $member->mod_user=$u->username;
            }
            else
            if($u->role_id==5){
              /*  if($member->kyc!='Y'){
                    $member->name=$mem->name;
                    
                }*/
            }
            if ($this->Members->save($member) && $this->Members->Addresses->save($address) ) {
                $this->Flash->success(__('Distributor Profile has been saved.'));

                 return $this->redirect($refurl);
            }
            $this->Flash->error(__('Distributor Profile  could not be saved. Please, try again.'));
        }
        //$membertypes = $this->Members->Membertypes->find('list', ['limit' => 200]);
        //$addresses = $this->Members->Addresses->find('list', ['limit' => 200]);
        $this->set('refurl', base64_encode( $refurl));
        $this->set(compact('member', 'smember','states','districts','disable','u'));
    }

	 public function view($id = null)
    {
     //   
     $u = $this->Authentication->getResult()->getData();
     
     $refurl=$this->referer();
     if( $u->role_id==2 )
     {
         

     }else
     if( $u->username==$id){
       //  $this->viewBuilder()->setLayout('member');

     }else
     {
         return null;

     }

        $member = $this->Members->get($id, [
            'contain' => ['Membertypes', 'Addresses', 'Kycs',  'Transcations'],
        ]);

        $this->set('member', $member);
    }

    public function index($txt=null)
    {

        $u = $this->Authentication->getResult()->getData();
        if($u->role_id!=2)
        {
            return null;
        }
        
       
        $this->paginate = [
            'contain' => ['Membertypes', 'Addresses'],
        ];
        if($txt!=null){
            $this->paginate['conditions']=['Members.id like '=>'FNI%'. $txt .'%'];
        }
        $members = $this->paginate($this->Members);

        $this->set(compact('members','txt'));
    }

    public function get($id = null)
    {
        
        $member = $this->Members->find('all',['fields'=>'name'])->where(['id'=>$id]);
        return $this->response->withType('application/json')->withStringBody(json_encode(['result' => $member]));
        
      

    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->viewBuilder()->setLayout('landing');
        $member = $this->Members->newEmptyEntity();

        if ($this->request->is('post')) {
            $member = $this->Members->patchEntity($member, $this->request->getData());
            $state_id=$this->request->getData('state_id');

            $member['id']=$this->generateID();
            if($member['membertype_id']!=1){
                $member['gender']='N';
            }
  
            $connection = ConnectionManager::get('default');

            $status='';
            $password=$this->generatePassword();
            $passtxt=$password;
            $this->loadModel('Users');
            $user=$this->Users->newEmptyEntity();
            $user['password']=$password;
            $password=$user['password'];

            $connection->execute('CALL sp_addmemeber(?,?,?,?,?,?,?,?,@status,?,?)',[$member['id'],strtoupper($member['sponsor']),$member['placement'],strtoupper($member['name']),$member['membertype_id'],$member['mobile'],strtoupper($member['email']),$password,$member['gender'],$state_id]);
            $status= $connection->query('SELECT @status as status')->fetchAll('assoc');;
            //debug($member);
            //debug($status);
           // die($status[0]['status']);
            if ($status[0]['status']=='Y') {
               // $this->Flash->success(__('The member has been saved.'));
                $this->set('username',$member['id']);
                $this->set('mobile',$member['mobile']);
                $this->set('name',$member['name']);
                $this->set('password',$passtxt);
                
                //return $this->redirect(['action' => 'confirm']);
                $message='Thanks!,Dear Distributor  Registration is successfully done with user id '.$member['id'].' and password is '.$passtxt.' Plz visit www.friendsnetindia.com .';
                $this->sendSMS($member['mobile'],$message);

                return $this->render('confirm');
            }
            $this->Flash->error(__('The Distributor  could not be saved. Please, try again.'));
        }
        $membertypes = $this->Members->Membertypes->find('list', ['limit' => 200]);
        $this->loadModel('States');
        $states=$this->States->find('list');
        $place=['L'=>'Placement: Left','R'=>'Placement: Right'];
        $genders=['M'=>'Sex :Male','F'=>'Sex :Female','X'=>'Sex :Transgender' ,'N'=>'Sex :N/A'];
 //       $addresses = $this->Members->Addresses->find('list', ['limit' => 200]);
        $this->set(compact('member', 'membertypes','place','states','genders'));
    }

    
    public function generateID(){

        $id="FNI".str_pad(''.rand(1,99999999),8,'0',STR_PAD_LEFT);

        return $id;

    }
    public function generatePassword(){

        $id=str_pad(''.rand(1,99999999),8,'0',STR_PAD_LEFT);

        return $id;

    }

    public function genealogy($id=null){
        try{

        
      //  die($id);
        $u = $this->Authentication->getResult()->getData();
        $root=null;    
        if($u->role_id==2)
        {
            $root='FNI00000001';
            
            
      
        }else
        if($u->role_id==5){
            $root=$u->username;
             // $this->viewBuilder()->setLayout('member');
      
        }

        $paths=$root;
    
        
        if($id==null){
            
            $members= $this->genealogy_fetch($root);
        }
        else
            $members= $this->genealogy_fetch($id);
        //debug($members);
        $paths=null;
        $next=$members->id;
        //die($next);
        $show=false;
        while( strcasecmp($root,$next)!=0){
            $paths=$paths==null ? $next : $next.'$'.$paths;
            //debug($root .'@'.$paths);
            $m=$this->Members->get($next);
            
            $next=$m->parent;
        }
        if(strcasecmp($root,$next)==0){

        }
        $paths=$paths==null ? $root : $root.'$'.$paths;
        if(! is_null( $paths))
        $paths=explode('$',$paths);     
     
    }catch(RecordNotFoundException $e){
            $members=null;
            //$paths=null;
            $this->Flash->error(__('The Distributor  ID is not found. Please, try again.'));
    }
    $this->set(compact('members'));
    $this->set(compact('paths'));
       // debug($paths);
    }

    private function genealogy_fetch($id){
        static $i=1;
        
        $member = $this->Members->get($id);
        
        //debug($member);
        if($member->leftid!=null){
            
            $member['left']=$this->Members->get($member->leftid);//$this->genealogy_fetch($member->leftid);
            if($member['left']->leftid!=null){
                $member['left']['left']=$this->Members->get($member['left']->leftid);
                
                if($member['left']['left']->leftid!=null){
                    $member['left']['left']['left']=$this->Members->get($member['left']['left']->leftid);
                }

                if($member['left']['left']->rightid!=null){
                    $member['left']['left']['right']=$this->Members->get($member['left']['left']->rightid);
                }

            }
            if($member['left']->rightid!=null){
                $member['left']['right']=$this->Members->get($member['left']->rightid);

                if($member['left']['right']->leftid!=null){
                    $member['left']['right']['left']=$this->Members->get($member['left']['right']->leftid);
                }

                if($member['left']['right']->rightid!=null){
                    $member['left']['right']['right']=$this->Members->get($member['left']['right']->rightid);
                }

            }
            
        }
        if($member->rightid!=null){
            $member['right']=$this->Members->get($member->rightid);//$this->genealogy_fetch($member->rightid);
            if($member['right']->leftid!=null){
                $member['right']['left']=$this->Members->get($member['right']->leftid);


                   
                if($member['right']['left']->leftid!=null){
                    $member['right']['left']['left']=$this->Members->get($member['right']['left']->leftid);
                }

                if($member['right']['left']->rightid!=null){
                    $member['right']['left']['right']=$this->Members->get($member['right']['left']->rightid);
                }



            }
            if($member['right']->rightid!=null){
                $member['right']['right']=$this->Members->get($member['right']->rightid);

                if($member['right']['right']->leftid!=null){
                    $member['right']['right']['left']=$this->Members->get($member['right']['right']->leftid);
                }

                if($member['right']['right']->rightid!=null){
                    $member['right']['right']['right']=$this->Members->get($member['right']['right']->rightid);
                }


            }
        }

        return $member;



    }
    public function mydirect($id=null)
    {
        $u = $this->Authentication->getResult()->getData();
     
        $sponsor_id=null;


        if($u->role_id==2)
        {
            $sponsor_id='FNI00000001';
            
      
        }else
        if($u->role_id==5){
            $sponsor_id=$u->username;
          //  $this->viewBuilder()->setLayout('member');
        }

        if($id!=null){
          try{  
        //  $mem=$this->Members->get($id);
          //if($mem->sponsor==$sponsor_id){
              $sponsor_id=$id;
          //}
        }catch(RecordNotFoundException $r){
            
        }
        }
        
     /*   $sql="SELECT m.* , t.points from members m left join    (SELECT from_memeber,sum(points) as points FROM `transcations` WHERE member_id='".$sponsor_id."' GROUP by from_memeber) t on m.id = t.from_memeber WHERE m.sponsor='". $sponsor_id."'";
        $conn = ConnectionManager::get('default');
        $stmt = $conn->execute($sql);
        $results = $stmt ->fetchAll('assoc');
   */
        $results=$this->Members->find()->where(['sponsor'=>$sponsor_id]);

        if (empty($results)) {
            $this->Flash->error(__('No Distributor found.'));
             
        }else{
        $this->set(compact('results','sponsor_id','u'));
         
        }    

    }

    public function active($id){
        $u = $this->Authentication->getResult()->getData();
        
        $cond=['id'=>$id ,'active'=>'N'];
        $vals=['active'=>'Y','dt_activate'=> new FrozenDate(),'mod_user'=>$u->username];
        $this->Members->updateAll($vals,$cond);

        $this->Flash->success('Distributor '.$id.' has been activated.');

        return $this->redirect($this->referer());


    }
    public function block($id,$v){
        $u = $this->Authentication->getResult()->getData();
        
        $cond=['id'=>$id];
        $vals=['block'=>$v,'modified'=> new FrozenDate(),'mod_user'=>$u->username];
        $this->Members->updateAll($vals,$cond);

        $this->Flash->success('Distributor '.$id.' has been '. ( $v=='Y' ? 'Blocked' : 'UnBlocked')  .'.');

        return $this->redirect($this->referer());


    }
}
