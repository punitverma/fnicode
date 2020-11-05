<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Item $item
 */
?>
<div class="row">
    <div class="column-responsive column-80">
        <div class="items view content">
            <h3><?= h($item->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($item->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Description') ?></th>
                    <td><?= h($item->description) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($item->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Mrp') ?></th>
                    <td><?= $this->Number->format($item->mrp) ?></td>
                </tr>
                <tr>
                    <th><?= __('Saleprice') ?></th>
                    <td><?= $this->Number->format($item->saleprice) ?></td>
                </tr>
                <tr>
                    <th><?= __('BV') ?></th>
                    <td><?= $this->Number->format($item->points) ?></td>
                </tr>
            </table>
            </div>
    </div>
</div>
