<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Frenchiecomms Controller
 *
 * @property \App\Model\Table\FrenchiecommsTable $Frenchiecomms
 *
 * @method \App\Model\Entity\Frenchiecomm[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FrenchiecommsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {

        $u = $this->Authentication->getResult()->getData();
        $fid=0;
        $this->allow([2,12,4,6]);
        $cond=[];
        if($u->role_id==4 || $u->role_id==6){
            $cond=['fid'=>$u->username];
        }
  
        $this->paginate = [
            'contain' => ['Frenchies'],'conditions'=>$cond
        ];
        $frenchiecomms = $this->paginate($this->Frenchiecomms);

        $this->set(compact('frenchiecomms'));
    }

    /**
     * View method
     *
     * @param string|null $id Frenchiecomm id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $frenchiecomm = $this->Frenchiecomms->get($id, [
            'contain' => ['Frenchies'],
        ]);

        $this->set('frenchiecomm', $frenchiecomm);
    }

    
}
