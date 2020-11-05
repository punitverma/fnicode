<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Stock[]|\Cake\Collection\CollectionInterface $stocks
 */
?>
<div class="stocks index content">
    <h3><?= __('Stocks') ?>  </h3> <a href="/stocks/details">Click Here for More Detials</a>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                 
                    <th><?= $this->Paginator->sort('item_id') ?></th>
                    <th><?= $this->Paginator->sort('qty') ?></th>
                  
                    <th class="actions"><?= __('Last update on') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($stocks as $stock): ?>
                <tr>
                    <td><?= $stock->has('item') ? $this->Html->link($stock->item->name, ['controller' => 'Items', 'action' => 'view', $stock->item->id]) : '' ?></td>
                    <td><?= $this->Number->format($stock->qty) ?></td>
                    <td><?= h($stock->tm) ?></td>
                    
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
