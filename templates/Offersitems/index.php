<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Offersitem[]|\Cake\Collection\CollectionInterface $offersitems
 */
?>
<div class="offersitems index content">
    <?= $this->Html->link(__('New Offersitem'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Offersitems') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('offer_id') ?></th>
                    <th><?= $this->Paginator->sort('item_id') ?></th>
                    <th><?= $this->Paginator->sort('sale_price') ?></th>
                    <th><?= $this->Paginator->sort('discount') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($offersitems as $offersitem): ?>
                <tr>
                    <td><?= $this->Number->format($offersitem->id) ?></td>
                    <td><?= $offersitem->has('offer') ? $this->Html->link($offersitem->offer->name, ['controller' => 'Offers', 'action' => 'view', $offersitem->offer->id]) : '' ?></td>
                    <td><?= $offersitem->has('item') ? $this->Html->link($offersitem->item->name, ['controller' => 'Items', 'action' => 'view', $offersitem->item->id]) : '' ?></td>
                    <td><?= $this->Number->format($offersitem->sale_price) ?></td>
                    <td><?= $this->Number->format($offersitem->discount) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $offersitem->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $offersitem->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $offersitem->id], ['confirm' => __('Are you sure you want to delete # {0}?', $offersitem->id)]) ?>
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
