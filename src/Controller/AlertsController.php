<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Alerts Controller
 *
 * @property \App\Model\Table\AlertsTable $Alerts
 *
 * @method \App\Model\Entity\Alert[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AlertsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
   
         $this->allow([2]);
        $this->paginate = [
            'contain' => ['Roles'],
        ];
        $alerts = $this->paginate($this->Alerts);

        $this->set(compact('alerts'));
    }

    /**
     * View method
     *
     * @param string|null $id Alert id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->allow([2]); 
        $alert = $this->Alerts->get($id, [
            'contain' => ['Roles'],
        ]);

        $this->set('alert', $alert);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->allow([2]);

        $alert = $this->Alerts->newEmptyEntity();
        if ($this->request->is('post')) {
            $alert = $this->Alerts->patchEntity($alert, $this->request->getData());
            if ($this->Alerts->save($alert)) {
                $this->Flash->success(__('The alert has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The alert could not be saved. Please, try again.'));
        }
        $roles = $this->Alerts->Roles->find('list', ['limit' => 200]);
        $this->set(compact('alert', 'roles'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Alert id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
       $this->allow([2]);

        $alert = $this->Alerts->get($id, [
            'contain' => [],
        ]);
        $pf=$alert->periodfrom;
        $pt=$alert->periodto;

        if ($this->request->is(['patch', 'post', 'put'])) {
            $alert = $this->Alerts->patchEntity($alert, $this->request->getData());
            if($alert->periodfrom==null)
            {
                $alert->periodfrom=$pf;
            }
            if($alert->periodto==null)
            {
                $alert->periodto=$pt;
            }
            
            if ($this->Alerts->save($alert)) {
                $this->Flash->success(__('The alert has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The alert could not be saved. Please, try again.'));
        }
        $roles = $this->Alerts->Roles->find('list', ['limit' => 200]);
        $this->set(compact('alert', 'roles'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Alert id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
       $this->allow([2]);

        $this->request->allowMethod(['post', 'delete']);
        $alert = $this->Alerts->get($id);
        if ($this->Alerts->delete($alert)) {
            $this->Flash->success(__('The alert has been deleted.'));
        } else {
            $this->Flash->error(__('The alert could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
