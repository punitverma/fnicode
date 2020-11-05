<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Invoicedetail $invoicedetail
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Invoicedetail'), ['action' => 'edit', $invoicedetail->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Invoicedetail'), ['action' => 'delete', $invoicedetail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $invoicedetail->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Invoicedetails'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Invoicedetail'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="invoicedetails view content">
            <h3><?= h($invoicedetail->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Invoice') ?></th>
                    <td><?= $invoicedetail->has('invoice') ? $this->Html->link($invoicedetail->invoice->id, ['controller' => 'Invoices', 'action' => 'view', $invoicedetail->invoice->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Item') ?></th>
                    <td><?= $invoicedetail->has('item') ? $this->Html->link($invoicedetail->item->name, ['controller' => 'Items', 'action' => 'view', $invoicedetail->item->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Itemname') ?></th>
                    <td><?= h($invoicedetail->itemname) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($invoicedetail->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Price') ?></th>
                    <td><?= $this->Number->format($invoicedetail->price) ?></td>
                </tr>
                <tr>
                    <th><?= __('Points') ?></th>
                    <td><?= $this->Number->format($invoicedetail->points) ?></td>
                </tr>
                <tr>
                    <th><?= __('Qty') ?></th>
                    <td><?= $this->Number->format($invoicedetail->qty) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
