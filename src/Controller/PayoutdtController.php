<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Payoutdt Controller
 *
 * @property \App\Model\Table\PayoutdtTable $Payoutdt
 *
 * @method \App\Model\Entity\Payoutdt[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PayoutdtController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $payoutdt = $this->paginate($this->Payoutdt);

        $this->set(compact('payoutdt'));
    }

    /**
     * View method
     *
     * @param string|null $id Payoutdt id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        return $this->redirect(['controller'=>'payout','action' => 'index',$id]);

    }

}
