<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Frenchietype[]|\Cake\Collection\CollectionInterface $frenchietypes
 */
?>
<div class="frenchietypes index content">
    <h3><?= __('Frenchietypes') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('commission') ?></th>
                    <th><?= $this->Paginator->sort('scope') ?></th>
                    <th><?= $this->Paginator->sort('active') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($frenchietypes as $frenchietype): ?>
                <tr>
                    <td><?= $this->Number->format($frenchietype->id) ?></td>
                    <td><?= h($frenchietype->name) ?></td>
                    <td><?= $this->Number->format($frenchietype->commission) ?></td>
                    <td><?= $this->Number->format($frenchietype->scope) ?></td>
                    <td><?= h($frenchietype->active) ?></td>
                    <td><?= h($frenchietype->dttm) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $frenchietype->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $frenchietype->id]) ?>
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
