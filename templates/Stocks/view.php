<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Stock $stock
 */
?>
<div class="row">
    <div class="column-responsive column-80">
        <div class="stocks view content">
            <h3><?= h($stock->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Frenchy') ?></th>
                    <td><?= $stock->has('frenchy') ? $this->Html->link($stock->frenchy->name, ['controller' => 'Frenchies', 'action' => 'view', $stock->frenchy->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Item') ?></th>
                    <td><?= $stock->has('item') ? $this->Html->link($stock->item->name, ['controller' => 'Items', 'action' => 'view', $stock->item->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($stock->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Qty') ?></th>
                    <td><?= $this->Number->format($stock->qty) ?></td>
                </tr>
                <tr>
                    <th><?= __('Tm') ?></th>
                    <td><?= h($stock->tm) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
