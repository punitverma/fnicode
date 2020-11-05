<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Frenchy $frenchy
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Frenchy'), ['action' => 'edit', $frenchy->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Frenchy'), ['action' => 'delete', $frenchy->id], ['confirm' => __('Are you sure you want to delete # {0}?', $frenchy->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Frenchies'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Frenchy'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="frenchies view content">
            <h3><?= h($frenchy->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= h($frenchy->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Frenchietype') ?></th>
                    <td><?= $frenchy->has('frenchietype') ? $this->Html->link($frenchy->frenchietype->name, ['controller' => 'Frenchietypes', 'action' => 'view', $frenchy->frenchietype->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Sponsor') ?></th>
                    <td><?= h($frenchy->sponsor) ?></td>
                </tr>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($frenchy->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Registered') ?></th>
                    <td><?= h($frenchy->registered) ?></td>
                </tr>
                <tr>
                    <th><?= __('Pangst') ?></th>
                    <td><?= h($frenchy->pangst) ?></td>
                </tr>
                <tr>
                    <th><?= __('Mobile') ?></th>
                    <td><?= h($frenchy->mobile) ?></td>
                </tr>
                <tr>
                    <th><?= __('Address') ?></th>
                    <td><?= h($frenchy->address) ?></td>
                </tr>
                <tr>
                    <th><?= __('State') ?></th>
                    <td><?= $frenchy->has('state') ? $this->Html->link($frenchy->state->name, ['controller' => 'States', 'action' => 'view', $frenchy->state->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('District') ?></th>
                    <td><?= $frenchy->has('district') ? $this->Html->link($frenchy->district->name, ['controller' => 'Districts', 'action' => 'view', $frenchy->district->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($frenchy->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($frenchy->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
