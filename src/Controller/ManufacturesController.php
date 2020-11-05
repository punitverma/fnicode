<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Manufactures Controller
 *
 * @property \App\Model\Table\ManufacturesTable $Manufactures
 *
 * @method \App\Model\Entity\Manufacture[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ManufacturesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    
    public function index($id=null)
    {
        $u = $this->Authentication->getResult()->getData();
        $this->allow([2,12]);

        
        
        $this->paginate = [
            'contain' => ['States']
        ];
        $states = $this->Manufactures->States->find('list', ['limit' => 200]);
        $items = $this->paginate($this->Manufactures);
        if(is_null($id))
            $item = $this->Manufactures->newEmptyEntity();
        else
            $item=$this->Manufactures->get($id, ['contain' => [],   ]);
        
        if ($this->request->is('post') || $this->request->is('put')) {
            
            $item = $this->Manufactures->patchEntity($item, $this->request->getData());
            
            if ($this->Manufactures->save($item)) {
                $this->Flash->success(__('The Manufacture has been saved.'));
                $item = $this->Manufactures->newEmptyEntity();
                $this->set(compact('items','item','states'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The Manufacture could not be saved. Please, try again.'));
        }

        $this->set(compact('items','item','states'));
    }


    
}
