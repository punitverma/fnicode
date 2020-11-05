<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Membertypes Controller
 *
 * @property \App\Model\Table\MembertypesTable $Membertypes
 *
 * @method \App\Model\Entity\Membertype[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MembertypesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $membertypes = $this->paginate($this->Membertypes);

        $this->set(compact('membertypes'));
    }

    /**
     * View method
     *
     * @param string|null $id Membertype id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $membertype = $this->Membertypes->get($id, [
            'contain' => ['Members'],
        ]);

        $this->set('membertype', $membertype);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $membertype = $this->Membertypes->newEmptyEntity();
        if ($this->request->is('post')) {
            $membertype = $this->Membertypes->patchEntity($membertype, $this->request->getData());
            if ($this->Membertypes->save($membertype)) {
                $this->Flash->success(__('The membertype has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The membertype could not be saved. Please, try again.'));
        }
        $this->set(compact('membertype'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Membertype id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $membertype = $this->Membertypes->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $membertype = $this->Membertypes->patchEntity($membertype, $this->request->getData());
            if ($this->Membertypes->save($membertype)) {
                $this->Flash->success(__('The membertype has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The membertype could not be saved. Please, try again.'));
        }
        $this->set(compact('membertype'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Membertype id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $membertype = $this->Membertypes->get($id);
        if ($this->Membertypes->delete($membertype)) {
            $this->Flash->success(__('The membertype has been deleted.'));
        } else {
            $this->Flash->error(__('The membertype could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
