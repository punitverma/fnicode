<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Offer[]|\Cake\Collection\CollectionInterface $offers
 */
?>
<div class="offers index content">
    <?= $this->Html->link(__('New Offer'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Offers') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('type') ?></th>
                    <th><?= $this->Paginator->sort('if_item_id') ?></th>
                    <th><?= $this->Paginator->sort('if_item_qty') ?></th>
                    <th><?= $this->Paginator->sort('invoice_value') ?></th>
                    <th><?= $this->Paginator->sort('item_id') ?></th>
                    <th><?= $this->Paginator->sort('qty') ?></th>
                    <th><?= $this->Paginator->sort('discount') ?></th>
                    <th><?= $this->Paginator->sort('active') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($offers as $offer): ?>
                <tr>
                    <td><?= $this->Number->format($offer->id) ?></td>
                    <td><?= h($offer->name) ?></td>
                    <td><?= h($offer->type) ?></td>
                    <td><?= $items[$offer->if_item_id] ?></td>
                    <td><?= $this->Number->format($offer->if_item_qty) ?></td>
                    <td><?= $this->Number->format($offer->invoice_value) ?></td>
                    <td><?= $items[$offer->item_id] ?></td>
                    <td><?= $this->Number->format($offer->qty) ?></td>
                    <td><?= $this->Number->format($offer->discount) ?></td>
                    <td><?= h($offer->active) ?></td>
                    <td class="actions">
              
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $offer->id]) ?>
                      
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
