<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Offersitems Controller
 *
 * @property \App\Model\Table\OffersitemsTable $Offersitems
 *
 * @method \App\Model\Entity\Offersitem[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class OffersitemsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index($offer_id)
    {
        $this->paginate = [
            'contain' => ['Offers', 'Items'],
            'conditions'=>['offer_id'=>$offer_id]
        ];
        $offersitems = $this->paginate($this->Offersitems);

        $this->set(compact('offersitems'));
    }

    /**
     * View method
     *
     * @param string|null $id Offersitem id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $offersitem = $this->Offersitems->get($id, [
            'contain' => ['Offers', 'Items'],
        ]);

        $this->set('offersitem', $offersitem);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $offersitem = $this->Offersitems->newEmptyEntity();
        if ($this->request->is('post')) {
            $offersitem = $this->Offersitems->patchEntity($offersitem, $this->request->getData());
            if ($this->Offersitems->save($offersitem)) {
                $this->Flash->success(__('The offersitem has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The offersitem could not be saved. Please, try again.'));
        }
        $offers = $this->Offersitems->Offers->find('list', ['limit' => 200])->where(['active'=>true]);
        $items = $this->Offersitems->Items->find('list', ['limit' => 200])->where(['itemcat_id <>'=>0,'active'=>true]);
        $this->set(compact('offersitem', 'offers', 'items'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Offersitem id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $offersitem = $this->Offersitems->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $offersitem = $this->Offersitems->patchEntity($offersitem, $this->request->getData());
            if ($this->Offersitems->save($offersitem)) {
                $this->Flash->success(__('The offersitem has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The offersitem could not be saved. Please, try again.'));
        }
        $offers = $this->Offersitems->Offers->find('list', ['limit' => 200]);
        $items = $this->Offersitems->Items->find('list', ['limit' => 200]);
        $this->set(compact('offersitem', 'offers', 'items'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Offersitem id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $offersitem = $this->Offersitems->get($id);
        if ($this->Offersitems->delete($offersitem)) {
            $this->Flash->success(__('The offersitem has been deleted.'));
        } else {
            $this->Flash->error(__('The offersitem could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
