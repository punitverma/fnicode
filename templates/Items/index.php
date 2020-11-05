<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Item[]|\Cake\Collection\CollectionInterface $items
 */
?>
<div class="row">
    
    <div class="col-12">
    <div class="card">
    <div class="card-header info">
    List
  </div>
  <div class="card-body">
  <div class="items index content">
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                <th><?= $this->Paginator->sort('code') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('hsn') ?></th>
                    <th><?= $this->Paginator->sort('description') ?></th>
                    <th><?= $this->Paginator->sort('mrp') ?></th>
                    <th><?= $this->Paginator->sort('saleprice') ?></th>
                    <th><?= $this->Paginator->sort('purchaseprice') ?></th>
                    <th><?= $this->Paginator->sort('points') ?></th>
                    <th><?= $this->Paginator->sort('tax') ?></th>
                    <th><?= $this->Paginator->sort('active') ?></th>
                    
                    <th colspan="1" class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($items as $item): ?>
                <tr>
                <td><?= h($item->code) ?></td>
                    <td><?= h($item->name) ?></td>
                    <td><?= h($item->hsn) ?></td>
                    <td><?= h($item->description) ?></td>
                    <td><?= $this->Number->format($item->mrp) ?></td>
                    <td><?= $this->Number->format($item->saleprice) ?></td>
                    <td><?= $this->Number->format($item->purchaseprice) ?></td>
                    <td><?= $this->Number->format($item->points) ?></td>
                    <td><?= $this->Number->format($item->tax) ?></td>
                    <td><?= h($item->active ?'Yes' : 'No') ?></td>
                    
                    <td class="actions">
                        
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $item->id]) ?>
                        <?= $item->itemcat_id==7 ? $this->Html->link(__('Link Combo'), ['controller'=>'combos','action' => 'index', $item->id]) : '' ?>
                        
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
</div>
  </div>
    </div>
</div>
