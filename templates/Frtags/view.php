<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Frtag $frtag
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Frtag'), ['action' => 'edit', $frtag->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Frtag'), ['action' => 'delete', $frtag->id], ['confirm' => __('Are you sure you want to delete # {0}?', $frtag->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Frtags'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Frtag'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="frtags view content">
            <h3><?= h($frtag->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Tagwith') ?></th>
                    <td><?= h($frtag->tagwith) ?></td>
                </tr>
                <tr>
                    <th><?= __('Frenchy') ?></th>
                    <td><?= $frtag->has('frenchy') ? $this->Html->link($frtag->frenchy->name, ['controller' => 'Frenchies', 'action' => 'view', $frtag->frenchy->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($frtag->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updt') ?></th>
                    <td><?= h($frtag->updt) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
