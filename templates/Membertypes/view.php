<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Membertype $membertype
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Membertype'), ['action' => 'edit', $membertype->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Membertype'), ['action' => 'delete', $membertype->id], ['confirm' => __('Are you sure you want to delete # {0}?', $membertype->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Membertypes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Membertype'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="membertypes view content">
            <h3><?= h($membertype->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($membertype->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($membertype->id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Members') ?></h4>
                <?php if (!empty($membertype->members)) : ?>
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
                        <?php foreach ($membertype->members as $members) : ?>
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
