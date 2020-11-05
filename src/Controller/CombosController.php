<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Datasource\ConnectionManager;

/**
 * Combos Controller
 *
 * @property \App\Model\Table\CombosTable $Combos
 *
 * @method \App\Model\Entity\Combo[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CombosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function generate(){
        $this->allow([2]);
        $connection = ConnectionManager::get('default');
        $item_id='';
        
        if ($this->request->is('post') || $this->request->is('put')) {
            $item_id=$this->request->getData('item_id');
            $qty=$this->request->getData('qty');

            $sql="select fn_combo(?,?,?) as message" ;
            $stmt = $connection->execute($sql,[$item_id,$qty,'A']);
            $res = $stmt ->fetchAll('assoc');
           
            if($res[0]['message']=='Y'){
                $this->Flash->success(__('The combo created.'));
               }else
            $this->Flash->error(__('The combo could not create.'));
           
             }
        return $this->redirect(['action' => 'index',$item_id]);

        
    }

    public function release($item_id){
        $this->allow([2]);
        $connection = ConnectionManager::get('default');
        
         
            $sql="select fn_combo(?,?,?) as message" ;
            $stmt = $connection->execute($sql,[$item_id,0,'R']);
            $res = $stmt ->fetchAll('assoc');
   
            if($res[0]['message']=='Y'){
                $this->Flash->success(__('The combo Items are released.'));

        
            }else
            $this->Flash->error(__('The combo Items could not be released.'));
            return $this->redirect(['action' => 'index',$item_id]);

        
    }
    public function index($item_id)
    {
        $this->allow([2]);
        $connection = ConnectionManager::get('default');
        $max= $connection->query('SELECT min(qty) as qty from  stocks where frenchie_id="admin" and item_id in (select subitem from combos where item_id ='. $item_id .')')->fetchAll('assoc');
          
        $this->loadModel('Stocks');
        $stock=$this->Stocks->find()->where(['item_id'=>$item_id,'frenchie_id'=>'admin'])->first();
        
        $this->paginate = [
            'conditions'=>['item_id'=>$item_id]
        ];
        
        $items=$this->Combos->Items->find('list')->toArray();
        $combos = $this->paginate($this->Combos);

        $this->set(compact('combos','items','item_id','stock','max'));
    }

    public function add($item_id)
    {
        $this->allow([2]);
        $this->loadModel('Stocks');
        $stock=$this->Stocks->find()->where(['item_id'=>$item_id,'frenchie_id'=>'admin'])->first();
        if($stock->qty<>0)
        {
            $this->Flash->error(__('The combo could not be saved. Stock is not empty.'));
            return $this->redirect(['action' => 'index',$item_id]);
        }
        $combo = $this->Combos->newEmptyEntity();
        	
        if ($this->request->is('post')) {
            $combo = $this->Combos->patchEntity($combo, $this->request->getData());
            $combo->item_id=$item_id;
            if ($this->Combos->save($combo)) {
                $this->Flash->success(__('The combo has been saved.'));

                return $this->redirect(['action' => 'index',$combo->item_id]);
            }
            $this->Flash->error(__('The combo could not be saved. Please, try again.'));
        }
        $items=$this->Combos->Items->find('list',['conditions'=>['itemcat_id <>'=>7]]);
        $this->set(compact('combo', 'items'));
    }

    
    public function delete($id = null)
    {
        $this->allow([2]);
        $this->loadModel('Stocks');
        $this->request->allowMethod(['post', 'delete']);
        $combo = $this->Combos->get($id);

        $stock=$this->Stocks->find()->where(['item_id'=>$combo->item_id,'frenchie_id'=>'admin'])->first();
        if($stock->qty<>0)
        {
            $this->Flash->error(__('The combo could not be saved. Stock is not empty.'));
            return $this->redirect(['action' => 'index',$combo->item_id]);
        }
        if ($this->Combos->delete($combo)) {
            $this->Flash->success(__('The combo has been deleted.'));
        } else {
            $this->Flash->error(__('The combo could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index',$combo->item_id]);
    }
}
