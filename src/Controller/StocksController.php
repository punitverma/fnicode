<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Datasource\ConnectionManager;

/**
 * Stocks Controller
 *
 * @property \App\Model\Table\StocksTable $Stocks
 *
 * @method \App\Model\Entity\Stock[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class StocksController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        
        $u = $this->Authentication->getResult()->getData();
        $this->allow([2,12,4,6]);
        $fid=0;
        if($u->role_id==2 || $u->role_id==12)
            $fid='admin';
        else
        if($u->role_id==4)
            $fid=$u->username;

        $this->paginate = [
            'contain' => ['Items'],'conditions'=>['frenchie_id'=>$fid]
        ];
        $stocks = $this->paginate($this->Stocks);

        $this->set(compact('stocks'));
    }
    public function details($fid=null)
    {
        
        $u = $this->Authentication->getResult()->getData();
        $this->allow([2,12,4,6]);
        if( ($u->role_id==2 || $u->role_id==12) && $fid==null) 
            {
                $fid='admin';
                $sql="select i.* , purchase.qty in_qty, sale.qty out_qty from items i left join (SELECT `item_id`, sum(invoicedetails.qty) qty FROM `invoicedetails` INNER join invoices on invoices.id=invoice_id and invoices.type  in ( 'S' ,'I') and invoices.trtype<>'D' and invoices.fromid='".$fid."' GROUP by item_id) sale on i.id= sale.item_id left join (SELECT `item_id`, sum(invoicedetails.qty) qty FROM `invoicedetails` INNER join invoices on invoices.id=invoice_id and invoices.type ='P' and invoices.trtype<>'D' and invoices.fromid='".$fid."' GROUP by item_id ) purchase on purchase.item_id = i.id";
            }
        else
           {   
               //if(($u->role_id==2 || $u->role_id==12) && $fid!=null)

               if( $u->role_id==4 || $u->role_id==6)
                     $fid=$u->username;
            $sql="select i.* , purchase.qty in_qty, sale.qty out_qty from items i left join (SELECT `item_id`, sum(invoicedetails.qty) qty FROM `invoicedetails` INNER join invoices on invoices.id=invoice_id and invoices.type <> 'O' and invoices.trtype<>'D' and invoices.fromid='".$fid."' GROUP by item_id) sale on i.id= sale.item_id left join (SELECT `item_id`, sum(invoicedetails.qty) qty FROM `invoicedetails` INNER join invoices on invoices.id=invoice_id and invoices.type <> 'O' and invoices.trtype<>'D' and invoices.toid='".$fid."' GROUP by item_id ) purchase on purchase.item_id = i.id";
        
         }  
        $connection = ConnectionManager::get('default');
        $stmt = $connection->execute($sql);
        $stocks = $stmt ->fetchAll('assoc');
        
        $this->set(compact('stocks','fid'));
        
    }

    /**
     * View method
     *
     * @param string|null $id Stock id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $stock = $this->Stocks->get($id, [
            'contain' => ['Frenchies', 'Items'],
        ]);

        $this->set('stock', $stock);
    }

}
