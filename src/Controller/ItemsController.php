<?php
    declare(strict_types=1);

    namespace App\Controller;

    /**
     * Items Controller
     *
     * @property \App\Model\Table\ItemsTable $Items
     *
     * @method \App\Model\Entity\Item[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
     */
    class ItemsController extends AppController
    {
        /**
         * Index method
         *
         * @return \Cake\Http\Response|null
         */
        public function index($id=null)
        {

            $this->allow([2]);

            $items = $this->paginate($this->Items);
            $itemcats=$this->Items->Itemcats->find('list');
            $itemcats=$itemcats->toArray();
            if(is_null($id))
                $item = $this->Items->newEmptyEntity();
            else
                $item=$this->Items->get($id, ['contain' => [],   ]);
            
            if ($this->request->is('post') || $this->request->is('put')) {
                
                $item = $this->Items->patchEntity($item, $this->request->getData());
                $item->unit='';
                
                if ($this->Items->save($item)) {
                    $this->Flash->success(__('The item has been saved.'));
                    $item = $this->Items->newEmptyEntity();
                    $this->set(compact('items','item','itemcats'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The item could not be saved. Please, try again.'));
            }

            $this->set(compact('items','item','itemcats'));
        }

        /**
         * View method
         *
         * @param string|null $id Item id.
         * @return \Cake\Http\Response|null
         * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
         */
        public function view($id = null)
        {
            
            $item = $this->Items->get($id, [
                'contain' => ['Invoicedetails', 'Stocks'],
            ]);

            $this->set('item', $item);
        }

        public function get($id = null)
        {
            $u = $this->Authentication->getResult()->getData();
            if($u->role_id==2 || $u->role_id==12)
                $username='admin';
            else
                $username=$u->username;

            if($this->request->is('ajax')){
            $item = $this->Items->get($id,['contain'=>['Itemcats']]);
            
            $stock= $this->Items->Stocks->find()->where(['frenchie_id'=>$username,'item_id'=>$item->id])->first();

            $item['qty']= is_null($stock) ? 0 : $stock->qty ;

            return $this->response->withType('application/json')->withStringBody(json_encode(['result' => 'ok','item'=>$item]));
            }
            return $this->response->withType('application/json')->withStringBody(json_encode(['result' => 'error']));
            
        }

        /**
         * Add method
         *
         * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
         */
        public function add()
        {
            $this->allow([2]);

            $itemcats=$this->Items->Itemcats->find('list');
            $itemcats=$itemcats->toArray();
            
            $item = $this->Items->newEmptyEntity();
            
            if ($this->request->is('post') || $this->request->is('put')) {
                $item = $this->Items->patchEntity($item, $this->request->getData());
                $item->unit='';
                $item->active=false;
                //debug($item);
                if ($this->Items->save($item)) {
                    $this->Flash->success(__('The item has been saved.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The item could not be saved. Please, try again.'));
            }
            $this->set(compact('item','itemcats'));
        }

        public function edit($id)
        {
            $this->allow([2]);

            $itemcats=$this->Items->Itemcats->find('list');
            $itemcats=$itemcats->toArray();
            
            $item = $this->Items->get($id);
            $itemcat=$item->itemcat_id;
          //  debug($this->request);
            if ($this->request->is('post') || $this->request->is('put')) {
                $item = $this->Items->patchEntity($item, $this->request->getData());

                if($itemcat==7)
                    $item->itemcat_id=7;
                if ($this->Items->save($item)) {
                    $this->Flash->success(__('The item has been saved.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The item could not be saved. Please, try again.'));
            }
            $this->set(compact('item','itemcats'));
        }

     
    }
