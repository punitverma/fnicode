<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Frenchiecomm $frenchiecomm
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Frenchiecomm'), ['action' => 'edit', $frenchiecomm->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Frenchiecomm'), ['action' => 'delete', $frenchiecomm->id], ['confirm' => __('Are you sure you want to delete # {0}?', $frenchiecomm->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Frenchiecomms'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Frenchiecomm'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="frenchiecomms view content">
            <h3><?= h($frenchiecomm->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Fid') ?></th>
                    <td><?= h($frenchiecomm->fid) ?></td>
                </tr>
                <tr>
                    <th><?= __('Invoiceno') ?></th>
                    <td><?= h($frenchiecomm->invoiceno) ?></td>
                </tr>
                <tr>
                    <th><?= __('Frenchy') ?></th>
                    <td><?= $frenchiecomm->has('frenchy') ? $this->Html->link($frenchiecomm->frenchy->name, ['controller' => 'Frenchies', 'action' => 'view', $frenchiecomm->frenchy->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($frenchiecomm->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Amount') ?></th>
                    <td><?= $this->Number->format($frenchiecomm->amount) ?></td>
                </tr>
                <tr>
                    <th><?= __('Percent') ?></th>
                    <td><?= $this->Number->format($frenchiecomm->percent) ?></td>
                </tr>
                <tr>
                    <th><?= __('Commision') ?></th>
                    <td><?= $this->Number->format($frenchiecomm->commision) ?></td>
                </tr>
                <tr>
                    <th><?= __('Tm') ?></th>
                    <td><?= h($frenchiecomm->tm) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
