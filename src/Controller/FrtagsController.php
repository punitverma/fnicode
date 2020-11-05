<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Frtags Controller
 *
 * @property \App\Model\Table\FrtagsTable $Frtags
 *
 * @method \App\Model\Entity\Frtag[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FrtagsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index($tagwith=null)
    {

        $this->allow([2,4,12]);

        $u= $this->Authentication->getResult()->getData();

        if($u->role_id==4)
            $tagwith=$u->username;

        $this->paginate = [
            'contain' => ['Frenchies'],
            'conditions'=>['tagwith'=>$tagwith]
        ];
        $tag=$this->Frtags->Frenchies->get($tagwith);
        $frtags = $this->paginate($this->Frtags);

        $this->set(compact('frtags','tagwith','tag','u'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($tagwith)
    {
        $this->allow([2,12]);

        $f=$this->Frtags->Frenchies->get($tagwith);
        $frtag = $this->Frtags->newEmptyEntity();

        if ($this->request->is('post') && $f->frenchietype_id==2) {

            $frtag = $this->Frtags->patchEntity($frtag, $this->request->getData());
            $frtag->tagwith=$tagwith;
            if ($this->Frtags->save($frtag)) {
                $this->Flash->success(__('The tag has been saved.'));

                return $this->redirect(['action' => 'index',$tagwith]);
            }
            $this->Flash->error(__('The tag could not be saved. Please, try again.'));
        }
        $frenchies = $this->Frtags->Frenchies->find('list', ['conditions' => ['frenchietype_id'=>3]]);
        $this->set(compact('frtag', 'frenchies'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Frtag id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    /**
     * Delete method
     *
     * @param string|null $id Frtag id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->allow([2,12]);
        $this->request->allowMethod(['post', 'delete']);
        
        $frtag = $this->Frtags->get($id);
        $fid=$frtag->tagwith;
        if ($this->Frtags->delete($frtag)) {
            $this->Flash->success(__('The frtag has been deleted.'));
        } else {
            $this->Flash->error(__('The frtag could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index',$fid]);
    }
}
