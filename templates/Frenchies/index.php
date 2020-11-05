<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Frenchy[]|\Cake\Collection\CollectionInterface $frenchies
 */
?>
<div class="frenchies index content">
    <h3><?= __('Frenchies') ?></h3>
    <div class="table-responsive">
        <table class="table small border">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('frenchietype_id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('pan') ?></th>
                    <th><?= $this->Paginator->sort('registered') ?></th>
                    <th><?= $this->Paginator->sort('gst',['lable'=>' GST  ']) ?></th>
                    <th><?= $this->Paginator->sort('mobile') ?></th>
                    <th><?= $this->Paginator->sort('address') ?></th>
                    <th><?= $this->Paginator->sort('state_id') ?></th>
                    <th><?= $this->Paginator->sort('district_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($frenchies as $frenchy): ?>
                <tr>
                    <td><?= h($frenchy->id) ?></td>
                    <td><?= $frenchy->has('frenchietype') ? $this->Html->link($frenchy->frenchietype->name, ['controller' => 'Frenchietypes', 'action' => 'view', $frenchy->frenchietype->id]) : '' ?></td>
                    <td><?= h($frenchy->name) ?></td>
                    <td><?= h($frenchy->pan) ?></td>
                    <td><?= h($frenchy->registered) ?></td>
                    <td><?= h($frenchy->gst) ?></td>
                    <td><?= h($frenchy->mobile) ?></td>
                    <td><?= h($frenchy->address) ?></td>
                    <td><?= $frenchy->state->name ?></td>
                    <td><?= $frenchy->district->name ?></td>
                    <td class="actions">
                <?php if($u->role_id==2 || $u->role_id==12)  {?>
                  <?= $this->Html->link(__('Edit'), ['action' => 'edit', $frenchy->id]) ?> 
                  <?= $frenchy->frenchietype->id==2 ?  $this->Html->link(__('Tag'), ['controller'=>'frtags','action' => 'index', $frenchy->id]) : '' ?> 
                  
                <?= $this->Html->link(__('View Stock'), ['controller'=>'stocks','action' => 'details', $frenchy->id]) ?>
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
