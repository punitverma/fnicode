<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Item[]|\Cake\Collection\CollectionInterface $items
 */
?>
<div class="row">
    <div class="col-4">
    <div class="card">
    <div class="card-header info">
    SUPPLIER
  </div>
  <div class="card-body">
  <?= $this->Form->create($item) ?>
            <fieldset>
                
                <?php
                    echo $this->Form->control('id',['type'=>'hidden']);
                    echo $this->Form->control('name');
                    echo $this->Form->control('address');
                    echo $this->Form->control('state_id', ['options' => $states]);
                    echo $this->Form->control('contact');
                    
                ?>
            </fieldset>
            <?= $this->Form->button(__('Save')) ?>
            <?= $this->Form->end() ?>

  </div>
    </div>
    </div>
    <div class="col-8">
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
                    
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('address') ?></th>
                    <th><?= $this->Paginator->sort('contact') ?></th>
                    <th><?= $this->Paginator->sort('state') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($items as $item): ?>
                <tr>
                    
                    <td><?= h($item->name) ?></td>
                    <td><?= h($item->address) ?></td>
                    <td><?= h($item->contact) ?></td>
                    <td><?= h($item->state->name) ?></td>
                    
                    <td class="actions">
                        
                        <?= $this->Html->link(__('Edit'), ['action' => 'index', $item->id]) ?>
                        <!--<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $item->id], ['confirm' => __('Are you sure you want to delete # {0}?', $item->id)]) ?>-->
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
