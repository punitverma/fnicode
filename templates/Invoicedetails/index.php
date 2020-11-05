<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Invoicedetail[]|\Cake\Collection\CollectionInterface $invoicedetails
 */
?>
<div class="invoicedetails index content">
    <?= $this->Html->link(__('New Invoicedetail'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Invoicedetails') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('invoice_id') ?></th>
                    <th><?= $this->Paginator->sort('item_id') ?></th>
                    <th><?= $this->Paginator->sort('itemname') ?></th>
                    <th><?= $this->Paginator->sort('price') ?></th>
                    <th><?= $this->Paginator->sort('points') ?></th>
                    <th><?= $this->Paginator->sort('qty') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($invoicedetails as $invoicedetail): ?>
                <tr>
                    <td><?= $this->Number->format($invoicedetail->id) ?></td>
                    <td><?= $invoicedetail->has('invoice') ? $this->Html->link($invoicedetail->invoice->id, ['controller' => 'Invoices', 'action' => 'view', $invoicedetail->invoice->id]) : '' ?></td>
                    <td><?= $invoicedetail->has('item') ? $this->Html->link($invoicedetail->item->name, ['controller' => 'Items', 'action' => 'view', $invoicedetail->item->id]) : '' ?></td>
                    <td><?= h($invoicedetail->itemname) ?></td>
                    <td><?= $this->Number->format($invoicedetail->price) ?></td>
                    <td><?= $this->Number->format($invoicedetail->points) ?></td>
                    <td><?= $this->Number->format($invoicedetail->qty) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $invoicedetail->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $invoicedetail->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $invoicedetail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $invoicedetail->id)]) ?>
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
