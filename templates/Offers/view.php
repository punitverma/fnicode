<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Offer $offer
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Offer'), ['action' => 'edit', $offer->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Offer'), ['action' => 'delete', $offer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $offer->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Offers'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Offer'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="offers view content">
            <h3><?= h($offer->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($offer->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Type') ?></th>
                    <td><?= h($offer->type) ?></td>
                </tr>
                <tr>
                    <th><?= __('Item') ?></th>
                    <td><?= $offer->has('item') ? $this->Html->link($offer->item->name, ['controller' => 'Items', 'action' => 'view', $offer->item->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($offer->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('If Item Id') ?></th>
                    <td><?= $this->Number->format($offer->if_item_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('If Item Qty') ?></th>
                    <td><?= $this->Number->format($offer->if_item_qty) ?></td>
                </tr>
                <tr>
                    <th><?= __('Invoice Value') ?></th>
                    <td><?= $this->Number->format($offer->invoice_value) ?></td>
                </tr>
                <tr>
                    <th><?= __('Qty') ?></th>
                    <td><?= $this->Number->format($offer->qty) ?></td>
                </tr>
                <tr>
                    <th><?= __('Discount') ?></th>
                    <td><?= $this->Number->format($offer->discount) ?></td>
                </tr>
                <tr>
                    <th><?= __('Active') ?></th>
                    <td><?= $offer->active ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Offerfors') ?></h4>
                <?php if (!empty($offer->offerfors)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Offer Id') ?></th>
                            <th><?= __('Member Id') ?></th>
                            <th><?= __('Usedt') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($offer->offerfors as $offerfors) : ?>
                        <tr>
                            <td><?= h($offerfors->id) ?></td>
                            <td><?= h($offerfors->offer_id) ?></td>
                            <td><?= h($offerfors->member_id) ?></td>
                            <td><?= h($offerfors->usedt) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Offerfors', 'action' => 'view', $offerfors->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Offerfors', 'action' => 'edit', $offerfors->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Offerfors', 'action' => 'delete', $offerfors->id], ['confirm' => __('Are you sure you want to delete # {0}?', $offerfors->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Offersitems') ?></h4>
                <?php if (!empty($offer->offersitems)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Offer Id') ?></th>
                            <th><?= __('Item Id') ?></th>
                            <th><?= __('Sale Price') ?></th>
                            <th><?= __('Discount') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($offer->offersitems as $offersitems) : ?>
                        <tr>
                            <td><?= h($offersitems->id) ?></td>
                            <td><?= h($offersitems->offer_id) ?></td>
                            <td><?= h($offersitems->item_id) ?></td>
                            <td><?= h($offersitems->sale_price) ?></td>
                            <td><?= h($offersitems->discount) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Offersitems', 'action' => 'view', $offersitems->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Offersitems', 'action' => 'edit', $offersitems->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Offersitems', 'action' => 'delete', $offersitems->id], ['confirm' => __('Are you sure you want to delete # {0}?', $offersitems->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
