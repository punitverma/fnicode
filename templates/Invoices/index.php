<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Invoice[]|\Cake\Collection\CollectionInterface $invoices

 */
$v = array('P' => 'Purchase', 'S' => 'Sale', 'O' => 'Order','I'=>'Invoice');
?>
<div class="invoices index content">
    <h3><?= $v[$type] ?> List</h3>
    <div class="table-responsive">
        <table border=1 cellspace=1 >
            <thead>
                <tr>
                    
                    <th><?= $this->Paginator->sort('receipt') ?></th>
                    <th><?= $this->Paginator->sort('date') ?></th>
                    <?php if($type=='I') {?>
                    <th><?= $this->Paginator->sort('fromid',['label'=>'ID']) ?></th>
                    <th><?= $this->Paginator->sort('fromname',['label'=>'Name']) ?></th>
                    <?php } else { ?>
                    <th><?= $this->Paginator->sort('toid',['label'=>'ID']) ?></th>
                    <th><?= $this->Paginator->sort('toname',['label'=>'Name']) ?></th>
                    <?php } ?>
                    <th><?= $this->Paginator->sort('ref') ?></th>
                     <th><?= $this->Paginator->sort('amount') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($invoices as $invoice): ?>
                <tr>
                    <td><?= h($invoice->receipt) ?></td>
                    <td><?= h($invoice->date) ?></td>
                    <?php if( $type=='I') {?>
                    <td><?= h($invoice->fromid) ?></td>
                    <td><?= h($invoice->fromname) ?></td>
                    <?php } else { ?>
                    <td><?= h($invoice->toid) ?></td>
                    <td><?= h($invoice->toname) ?></td>
                    <?php } ?>
                    <td><?= h($invoice->ref) ?></td>
                    <td><?= $this->Number->format($invoice->amount) ?></td>

                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $invoice->id]) ?>
                        <?php if($type=='I') {?>
                        <?= $this->Html->link(__('Invoice'), ['controller'=>'/','action' => 'invoice',$invoice->receipt]) ?>
                        <?php } ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
