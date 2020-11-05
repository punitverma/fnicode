<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Address $address
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Address'), ['action' => 'edit', $address->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Address'), ['action' => 'delete', $address->id], ['confirm' => __('Are you sure you want to delete # {0}?', $address->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Addresses'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Address'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="addresses view content">
            <h3><?= h($address->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('State') ?></th>
                    <td><?= $address->has('state') ? $this->Html->link($address->state->name, ['controller' => 'States', 'action' => 'view', $address->state->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('District') ?></th>
                    <td><?= $address->has('district') ? $this->Html->link($address->district->name, ['controller' => 'Districts', 'action' => 'view', $address->district->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Address') ?></th>
                    <td><?= h($address->address) ?></td>
                </tr>
                <tr>
                    <th><?= __('Pincode') ?></th>
                    <td><?= h($address->pincode) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($address->id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Companies') ?></h4>
                <?php if (!empty($address->companies)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Email') ?></th>
                            <th><?= __('Contactperson') ?></th>
                            <th><?= __('Phone') ?></th>
                            <th><?= __('Address Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($address->companies as $companies) : ?>
                        <tr>
                            <td><?= h($companies->id) ?></td>
                            <td><?= h($companies->name) ?></td>
                            <td><?= h($companies->email) ?></td>
                            <td><?= h($companies->contactperson) ?></td>
                            <td><?= h($companies->phone) ?></td>
                            <td><?= h($companies->address_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Companies', 'action' => 'view', $companies->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Companies', 'action' => 'edit', $companies->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Companies', 'action' => 'delete', $companies->id], ['confirm' => __('Are you sure you want to delete # {0}?', $companies->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Frenchies') ?></h4>
                <?php if (!empty($address->frenchies)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Mobile') ?></th>
                            <th><?= __('Address Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($address->frenchies as $frenchies) : ?>
                        <tr>
                            <td><?= h($frenchies->id) ?></td>
                            <td><?= h($frenchies->name) ?></td>
                            <td><?= h($frenchies->mobile) ?></td>
                            <td><?= h($frenchies->address_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Frenchies', 'action' => 'view', $frenchies->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Frenchies', 'action' => 'edit', $frenchies->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Frenchies', 'action' => 'delete', $frenchies->id], ['confirm' => __('Are you sure you want to delete # {0}?', $frenchies->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Members') ?></h4>
                <?php if (!empty($address->members)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Membertype Id') ?></th>
                            <th><?= __('Sponsor') ?></th>
                            <th><?= __('Parent') ?></th>
                            <th><?= __('Placement') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Adddetails') ?></th>
                            <th><?= __('Mobile') ?></th>
                            <th><?= __('Email') ?></th>
                            <th><?= __('Address Id') ?></th>
                            <th><?= __('Kyc') ?></th>
                            <th><?= __('Active') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($address->members as $members) : ?>
                        <tr>
                            <td><?= h($members->id) ?></td>
                            <td><?= h($members->membertype_id) ?></td>
                            <td><?= h($members->sponsor) ?></td>
                            <td><?= h($members->parent) ?></td>
                            <td><?= h($members->placement) ?></td>
                            <td><?= h($members->name) ?></td>
                            <td><?= h($members->adddetails) ?></td>
                            <td><?= h($members->mobile) ?></td>
                            <td><?= h($members->email) ?></td>
                            <td><?= h($members->address_id) ?></td>
                            <td><?= h($members->kyc) ?></td>
                            <td><?= h($members->active) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Members', 'action' => 'view', $members->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Members', 'action' => 'edit', $members->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Members', 'action' => 'delete', $members->id], ['confirm' => __('Are you sure you want to delete # {0}?', $members->id)]) ?>
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
