<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Kycdoc $kycdoc
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Kycdoc'), ['action' => 'edit', $kycdoc->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Kycdoc'), ['action' => 'delete', $kycdoc->id], ['confirm' => __('Are you sure you want to delete # {0}?', $kycdoc->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Kycdocs'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Kycdoc'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="kycdocs view content">
            <h3><?= h($kycdoc->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Kyc') ?></th>
                    <td><?= $kycdoc->has('kyc') ? $this->Html->link($kycdoc->kyc->name, ['controller' => 'Kycs', 'action' => 'view', $kycdoc->kyc->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($kycdoc->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
