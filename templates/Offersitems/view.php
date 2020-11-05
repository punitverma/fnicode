<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Offersitem $offersitem
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Offersitem'), ['action' => 'edit', $offersitem->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Offersitem'), ['action' => 'delete', $offersitem->id], ['confirm' => __('Are you sure you want to delete # {0}?', $offersitem->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Offersitems'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Offersitem'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="offersitems view content">
            <h3><?= h($offersitem->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Offer') ?></th>
                    <td><?= $offersitem->has('offer') ? $this->Html->link($offersitem->offer->name, ['controller' => 'Offers', 'action' => 'view', $offersitem->offer->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Item') ?></th>
                    <td><?= $offersitem->has('item') ? $this->Html->link($offersitem->item->name, ['controller' => 'Items', 'action' => 'view', $offersitem->item->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($offersitem->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Sale Price') ?></th>
                    <td><?= $this->Number->format($offersitem->sale_price) ?></td>
                </tr>
                <tr>
                    <th><?= __('Discount') ?></th>
                    <td><?= $this->Number->format($offersitem->discount) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
