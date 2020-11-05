<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Combo $combo
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Combo'), ['action' => 'edit', $combo->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Combo'), ['action' => 'delete', $combo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $combo->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Combos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Combo'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="combos view content">
            <h3><?= h($combo->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Item') ?></th>
                    <td><?= $combo->has('item') ? $this->Html->link($combo->item->name, ['controller' => 'Items', 'action' => 'view', $combo->item->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($combo->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Subitem') ?></th>
                    <td><?= $this->Number->format($combo->subitem) ?></td>
                </tr>
                <tr>
                    <th><?= __('Qty') ?></th>
                    <td><?= $this->Number->format($combo->qty) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
