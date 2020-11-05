<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Frenchietypes Controller
 *
 * @property \App\Model\Table\FrenchietypesTable $Frenchietypes
 *
 * @method \App\Model\Entity\Frenchietype[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FrenchietypesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->allow([2,12]);

         $frenchietypes = $this->paginate($this->Frenchietypes);

        $this->set(compact('frenchietypes'));
    }

    /**
     * View method
     *
     * @param string|null $id Frenchietype id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $frenchietype = $this->Frenchietypes->get($id, [
            'contain' => ['Frenchies'],
        ]);

        $this->set('frenchietype', $frenchietype);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    /*
    public function add()
    {
        $frenchietype = $this->Frenchietypes->newEmptyEntity();
        if ($this->request->is('post')) {
            $frenchietype = $this->Frenchietypes->patchEntity($frenchietype, $this->request->getData());
            if ($this->Frenchietypes->save($frenchietype)) {
                $this->Flash->success(__('The frenchietype has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The frenchietype could not be saved. Please, try again.'));
        }
        $this->set(compact('frenchietype'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Frenchietype id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->allow([2,12]);

        
        $frenchietype = $this->Frenchietypes->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $frenchietype = $this->Frenchietypes->patchEntity($frenchietype, $this->request->getData());
            if ($this->Frenchietypes->save($frenchietype)) {
                $this->Flash->success(__('The frenchietype has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The frenchietype could not be saved. Please, try again.'));
        }
        $this->set(compact('frenchietype'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Frenchietype id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    /*
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $frenchietype = $this->Frenchietypes->get($id);
        if ($this->Frenchietypes->delete($frenchietype)) {
            $this->Flash->success(__('The frenchietype has been deleted.'));
        } else {
            $this->Flash->error(__('The frenchietype could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }*/
}
