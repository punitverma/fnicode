<?php

declare(strict_types=1);

namespace App\Controller;
use Cake\Datasource\ConnectionManager;
use function PHPSTORM_META\type;
use Cake\Core\Configure;
use Cake\I18n\FrozenDate;
/**
 * Invoices Controller
 *
 * @property \App\Model\Table\InvoicesTable $Invoices
 *
 * @method \App\Model\Entity\Invoice[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class InvoicesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */

    public function list(){
        
        $u = $this->Authentication->getResult()->getData();
        
        if ($this->request->is('post') || $this->request->is('put')) {
            $connection = ConnectionManager::get('default');

            $from_dt=$this->request->getData('from_dt');
            $to_dt=$this->request->getData('to_dt');
            $type=$this->request->getData('type');
            
            $cat=$this->request->getData('cat');
            $sql='select id as invoice_id, receipt,date,qty,igst,cgst,sgst,discount,amount,points ';
            if($type=='P'){

                if($u->role_id==2 || $u->role_id==12){
                    $sql= $sql .' , toid as id, toname as name, togst as gst   from invoices where type="P" ';
                }else{
                    $sql= $sql .' , fromid as id, fromname as name, fromgst as gst   from invoices where type="S" and toid="'. $u->username  .'"';
                
                }

            }else{
                
                $sql= $sql .' , toid as id, toname as name, togst as gst   from invoices where type="S" ' ;
                $sql= $sql . (($u->role_id==2 || $u->role_id==12) ? '' : ' and fromid="'. $u->username  .'"');
                
            }
            if($cat=='D'){

                $sql=$sql .' and fromid like "FNIFH%" ' ;
            }
            else
            if($cat=='U'){
                $sql=$sql .' and togst is null';
            }
            else
            if($cat=='R'){
                $sql=$sql .' and togst is not null';
            }

            $sql=$sql .' and trtype <> "D" and  date between ? and ? ';

            //die($sql);    

            $stmt = $connection->execute($sql,[$from_dt,$to_dt]);
            $res = $stmt ->fetchAll('assoc');
           
            $this->set(compact('res','from_dt','to_dt','cat','type'));

        }
    } 
    public function index($type)
    {

        //Configure::write('DebugKit.forceEnable', true);
        //Configure::write('DebugKit.panels', ['DebugKit.Packages' => true]);
        $this->allow([2,4,6,12]);

        $type=strtoupper($type);
        $u = $this->Authentication->getResult()->getData();
        $conditions=[];
        if($type=='P' || $type=='S' || $type=='O'){
            $conditions=['type'=>$type, 'trtype !='=>'D','fromid'=> $u->username];
        }
        else
        if($type=='I')
        {
            $conditions=['type'=>'O','trtype !='=>'D','toid'=> $u->username];
        }


        $invoices = $this->paginate($this->Invoices,['conditions'=>$conditions]);
        $this->set(compact('invoices','type'));
        
    }

    /**
     * View method
     *
     * @param string|null $id Invoice id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        
        $this->allow([2,4,6,12]);

        $this->viewBuilder()->setLayout('print');
        
       $this->loadModel('States');
       $this->loadModel('Frenchies');
       $this->loadModel('Members');
       $u = $this->Authentication->getResult()->getData();
        $states = $this->States->find('list');

        $invoice = $this->Invoices->find('all',[
            'contain' => ['Invoicedetails'], 'conditions'=>[is_numeric($id) ? 'id' : 'receipt' =>$id ,'trtype !=' => 'D']
        ])->first();
     
        if($u->username!='admin' &&  strcasecmp($invoice->fromid,$u->username)!=0 ){
           return;

        }


        $fromid=$this->Frenchies->get($invoice->fromid,['contain'=>'Districts']);

        if( strcasecmp(substr($invoice->toid,0,4) ,'FNIF')==0 )   {
        $toid=$this->Frenchies->get($invoice->toid,['contain'=>'Districts']);    
        $addl=[];
        $addl['address']=$toid->address;

        $addl['dist']=$toid->district->name;
        $addl['pinno']=$toid->pincode;
        $addl['mobile']=$toid->mobile;
        $addl['gst']=$invoice->togst;
        $addl['pan']=$toid->pan;
        //$addl['email']=$toid->pan;
        $addl['state_code']=$toid->state_id;

        }else
        if( strcasecmp(substr($invoice->toid,0,3) ,'FNI')==0 )   {
        
            $toid=$this->Members->get($invoice->toid,['contain'=>'Kycs']);
          //  debug($toid);
            $addr=    $this->Members->Addresses->get($toid->address_id,['contain'=>'Districts']);
        $addl=[];
        $addl['address']=$addr->address;

        $addl['dist']=$addr->district->name;
        $addl['pinno']=$addr->pincode;
        $addl['mobile']=$toid->mobile;
        $addl['gst']='';
        $addl['pan']= '';//$toid->has('kyc') ?  $toid->kyc->pan : '';
        $addl['email']=$toid->email;
        $addl['state_code']=$addr->state_id;

        }
        
        


        //$inv = $this->Invoices->find('all')->where(['ref' => $ref, 'type' => $type])->contain(['invoicedetails'])->first();
        $this->set(compact('addl','toid','fromid'));
        $this->set('invoice', $invoice);
        $this->set('states', $states->toArray());
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($type=null,$ref=null)
    {
        $this->allow([2,4,6,12]);

        
        $invoice = $this->Invoices->newEmptyEntity();
        $invoicedetail = $this->Invoices->Invoicedetails->newEmptyEntity();
        $u = $this->Authentication->getResult()->getData();

        $tolist = null;
        $this->loadModel('States');
        $this->loadModel('Paymentmode');
    
        $this->loadModel('Items');
        $states = $this->States->find('list');
        $items = $this->Items->find('list')->where(['active'=>true]);

        if($type!='O'){
            $paymentmodes=$this->Paymentmode->find('all')->combine('name', 'name');
        }
        
        if ($type == 'I') {

            $inv = $this->Invoices->find('all')->where(['ref' => $ref, 'type' => $type])->contain(['invoicedetails'])->first();
        } else {
            $inv = $this->Invoices->find('all')->where(['fromid' => $u->username, 'trtype' => 'D', 'Invoices.type' => $type])->contain(['invoicedetails','Offers'])->first();
        }

        if($type=='P'){
            $this->loadModel('Manufactures');
            $tolist = $this->Manufactures->find('list');
        }
        else
        if($type=='S'){

           // $this->loadModel('Members');
           // $tolist = $this->Members->find('list');
           //$items[0]='Promotional';
        }        


            if (empty($inv)) {

                $this->loadModel('Frenchies');

                    
                if($u->role_id==4 || $u->role_id==6)
                    $frenchie=$this->Frenchies->get($u->username);
                else
                    $frenchie=$this->Frenchies->get('admin');

                if($type=='S' && ($u->role_id==4 || $u->role_id==6 || $u->role_id==2 || $u->role_id==12)){
                  
                    $invoice->fromid = $frenchie->id;
                    $invoice->fromname = $frenchie->name;
                    $invoice->fromstate = $frenchie->state_id;
                    $invoice->fromgst = $frenchie->gst;
                    
                    
                    $invoice->type = $type;
                    $invoice->trtype = 'D';
                    $invoice->ref=$ref;
                    $invoice->toid=0;
                    $invoice->tostate=0;
                    $invoice->toname='';
                    $invoice->points=0;
                    $invoice->amount=0;
                   

                }
                else
                if ( ($type == 'P' || $type=='I') && $u->role_id == 2 ) {

                    $invoice->type = $type;
                    $invoice->trtype = 'D';
                    $invoice->ref=$ref;
                    $invoice->fromid = $frenchie->id;
                    $invoice->fromname = $frenchie->name;
                    $invoice->fromstate = $frenchie->state_id;
                    $invoice->fromgst = $frenchie->gst;
                    
                    $invoice->toid=0;
                    $invoice->tostate=0;
                    $invoice->toname='';
                    $invoice->points=0;
                    $invoice->amount=0;
                    if($type=='I'){
                       $inv= $this->Invoices->find('all')->where(['receipt' => $ref, 'type' => 'O'])->first();
                       $invoice->toid=$inv->fromid;
                       $invoice->toname=$inv->fromname;
                       $invoice->tostate=$inv->fromstate;
                    }
                }
                if ($type == 'O' && $u->role_id == 4) {
                    $this->loadModel('Frenchies');
                    $f = $this->Frenchies->get($u->username);
    
                    $invoice->type = $type;
                    $invoice->trtype = 'D';
                    
                    $invoice->fromid = $f->id;
                    $invoice->fromname = $f->name;
                    $invoice->fromstate = $f->state_id;
    
                    $invoice->toid = 'admin';
                    $invoice->toname = 'Company';
                    $invoice->tostate = 20; //Jharkhand
                    //$this->loadModel('Manufactures');
                    //$tolist=$this->Manufactures->find('list');
                    $invoice->payment_mode='N/A';
                    $invoice->payment_reference='N/A';
                    
                    $paymentmodes=null;
    
                }
                

                $invoice->id = null;
                $s='';
                if($u->role_id==2)
                    $s='FNI';
                else
                if($u->role_id==4)
                    $s="DF";
                else
                    $s="HF";
                
                $invoice->receipt=$this->generateID($s,$type,$invoice->fromid);
                
                $invoice->date= new FrozenDate();
                
                if($this->Invoices->save($invoice))
                {
                    $inv=  ['ref'=>$invoice->receipt];

                    if($invoice->type=='I')
                    $this->Invoices->updateAll($inv,['receipt'=>$invoice->ref]);
                   // $invoice=$inv;
                }
                
                $invoice['invoicedetails']= null;//$this->Invoices->Invoicedetails->find()->where(['invoice_id'=>$invoice->id]);
            } else {
                $invoice = $inv;
            }
        
        $this->set('states', $states->toArray());
        $this->set('items', $items);

        $this->set('invoice_id', $invoice->id);
        $this->set(compact('invoice', 'type', 'tolist', 'invoicedetail','paymentmodes'));
    }
    function startWith($string,$start){
        $len=strlen($start);
        return ( substr($string,0,$len)==$start ) ;
    }
    
    public function save($id = null)
    {
        $this->allow([2,4,6,12]);

        $this->loadModel('Tablelocks');
        $lock=$this->Tablelocks->get('invoices');
       
        if($lock->status=='Y'){
            return $this->response->withType('application/json')->withStringBody(json_encode(['result' => 'error', 'receipt' => $inv->receipt]));
        }

        
        $invoice = $this->Invoices->newEmptyEntity();
        $u = $this->Authentication->getResult()->getData();
        $inv = $this->Invoices->get($id, [
            'contain' => [],
        ]);

        if($this->startWith($inv->toid,'FNIFHF') && $inv->amount<5000){

            return $this->response->withType('application/json')->withStringBody(json_encode(['result' => 'error', 'receipt' => $inv->receipt]));
        }

        if ($this->request->is(['patch', 'post', 'put'])) {
            $invoice = $this->Invoices->patchEntity($invoice, $this->request->getData());
            $inv->date = $invoice->date;

            if($inv->type!='O'){
            $inv->payment_mode=$invoice->payment_mode;
            $inv->payment_reference=$invoice->payment_reference;
            }
            if($inv->type=='P')
                $inv->receipt = $invoice->receipt;
            else
                $inv->date=date('Y-m-d');
               
            
            if($inv->type!='I'){
         //   $inv->toid = $invoice->toid;
             $inv->ref = $invoice->ref;

             $inv->toname = $invoice->toname;
          //  $inv->tostate = $invoice->tostate;
            }
            if ($inv->type == 'O') {
                $inv->toid = 'admin';
                $inv->toname = 'Company';
                $inv->tostate = 20;
                $inv->payment_mode='N/A';
                $inv->payment_reference='N/A';
                
            }


            if ($inv->trtype == 'D') {
                if ($u->role_id == 2)     $inv->trtype = 'C';
                if ($u->role_id == 4)     $inv->trtype = 'F';
                if ($u->role_id == 6)     $inv->trtype = 'F';
              //  debug($inv);
                //die();
                if ($this->Invoices->save($inv)) {
                    return $this->response->withType('application/json')->withStringBody(json_encode(['result' => 'ok', 'receipt' => $inv->receipt]));
                }
            }
        }
        return $this->response->withType('application/json')->withStringBody(json_encode(['result' => 'error', 'receipt' => $inv->receipt]));
    }

    public function generateID($s,$type,$fromid){

        $year=  date("Y");
        $yr= date("y");
        $y='';

        if(date("m")>=4){
            $y=$year.'-'.($yr+1);
        }  
        else{
            $y=($year-1).'-'.($yr);
        }
        $y=$type.''.$y;

       // $query->select(['count' => $query->func()->max('receipt')]);        
      
//       debug($fromid.'-'.$type.'-'.$y);
  //     die();
     
       $query=$this->Invoices->find();
        $inv=$query->select(['count' => $query->func()->max('receipt')])->where(['fromid'=>$fromid,'type'=>$type,'substring(receipt,1,8)'=>$y]);

        $inv=$inv->first();
        if($inv->count==null){
            $id=$y.'/'.str_pad('1',6,'0',STR_PAD_LEFT);
        }
        else{
            
            $id=$y.'/'.str_pad(''.(substr($inv->count,9) +1) ,6,'0',STR_PAD_LEFT);
        }
       // $id='S2020-21/000001';
       // $id= substr($id,9)+1;
       // debug($id);
       // die($id);
       // $id=$type . date("Y") . date("m") . date("d") .str_pad(''.rand(1,99999),6,'0',STR_PAD_LEFT);

        return $id;

    }
}
