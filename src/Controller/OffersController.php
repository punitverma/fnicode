<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Datasource\ConnectionManager;

/**
 * Offers Controller
 *
 * @property \App\Model\Table\OffersTable $Offers
 *
 * @method \App\Model\Entity\Offer[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class OffersController extends AppController
{

    public function find($invoice_id){
        $conn = ConnectionManager::get('default');

        //$this->loadModel('Invoices');
       // $invoice=$this->Invoices->get($invoice_id);

        $inv_val=0;
        $item_qty=[];
        $sql="select sum(amount) as amount from invoicedetails where invoice_id=?";
                $stmt = $conn->execute($sql,[$invoice_id]);
                $results = $stmt ->fetchAll('assoc');
                $inv_val=$results[0]['amount'];

        $sql="select item_id , sum(qty) as qty from invoicedetails where invoice_id=? group by item_id";
                $stmt = $conn->execute($sql,[$invoice_id]);
                $item_qty = $stmt ->fetchAll('assoc');
              


        $offers=$this->Offers->find()->where(['active'=>true]);
        $offers=$offers->toArray();
        $result=[];
        foreach ($offers as $offer ) :
            if($offer->type=='I'){
                   // debug($offer->invoice_value.'#'.$inv_val);
                    $offer->active=($offer->invoice_value<=$inv_val);
            }else{
                $offer->active=false;
                for($i=0;$i<count($item_qty);$i++){
                    $v=$item_qty[$i];
                    if($v['item_id']==$offer->if_item_id && $v['qty']>= $offer->if_item_qty){
                        $offer->active=true;
                    break;
                    }
                }
            }
            array_push($result,$offer);
        endforeach;

        return $this->response->withType('application/json')->withStringBody(json_encode(['result' => $result]));
      
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->allow([2]);

        $this->paginate = [
//            'contain' => ['Items'],
        ];
        $offers = $this->paginate($this->Offers);
        $items= $this->Offers->Items->find('list')->toArray();
        $this->set(compact('offers','items'));
    }

    /**
     * View method
     *
     * @param string|null $id Offer id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $offer = $this->Offers->get($id);

        $this->set('offer', $offer);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $u = $this->Authentication->getResult()->getData();
        $this->allow([2]);

        $offer = $this->Offers->newEmptyEntity();
        if ($this->request->is('post')) {
            $offer = $this->Offers->patchEntity($offer, $this->request->getData());
            if ($this->Offers->save($offer)) {
                $this->Flash->success(__('The offer has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The offer could not be saved. Please, try again.'));
        }
        //$ifItems = $this->Offers->IfItems->find('list', ['limit' => 200]);
        $items = $this->Offers->Items->find('list', ['limit' => 200])->where(['active'=>true]);
        $ifItems=$items;
        $this->set(compact('offer', 'ifItems', 'items'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Offer id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $u = $this->Authentication->getResult()->getData();
        $this->allow([2]);

        $offer = $this->Offers->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $offer = $this->Offers->patchEntity($offer, $this->request->getData());
            if ($this->Offers->save($offer)) {
                $this->Flash->success(__('The offer has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The offer could not be saved. Please, try again.'));
        }
        //$ifItems = $this->Offers->IfItems->find('list', ['limit' => 200]);
        $items = $this->Offers->Items->find('list', ['limit' => 200])->where(['active'=>true]);
        $ifItems=$items;
        $this->set(compact('offer', 'ifItems', 'items'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Offer id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    /*public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $offer = $this->Offers->get($id);
        if ($this->Offers->delete($offer)) {
            $this->Flash->success(__('The offer has been deleted.'));
        } else {
            $this->Flash->error(__('The offer could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }*/

}
