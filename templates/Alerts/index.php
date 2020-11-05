<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Alert[]|\Cake\Collection\CollectionInterface $alerts
 */
?>
<div class="alerts index content">
    <?= $this->Html->link(__('New Alert'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Alerts') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('role_id') ?></th>
                    <th><?= $this->Paginator->sort('message') ?></th>
                    <th><?= $this->Paginator->sort('periodfrom') ?></th>
                    <th><?= $this->Paginator->sort('periodto') ?></th>
                    <th><?= $this->Paginator->sort('active') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($alerts as $alert): ?>
                <tr>
                    <td><?= $this->Number->format($alert->id) ?></td>
                    <td><?= $alert->role->name ?></td>
                    <td><?= h($alert->message) ?></td>
                    <td><?= h($alert->periodfrom) ?></td>
                    <td><?= h($alert->periodto) ?></td>
                    <td><?= h($alert->active) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $alert->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $alert->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $alert->id], ['confirm' => __('Are you sure you want to delete # {0}?', $alert->id)]) ?>
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
