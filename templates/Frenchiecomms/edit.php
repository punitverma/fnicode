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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $frenchiecomm->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $frenchiecomm->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Frenchiecomms'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="frenchiecomms form content">
            <?= $this->Form->create($frenchiecomm) ?>
            <fieldset>
                <legend><?= __('Edit Frenchiecomm') ?></legend>
                <?php
                    echo $this->Form->control('fid');
                    echo $this->Form->control('invoiceno');
                    echo $this->Form->control('amount');
                    echo $this->Form->control('percent');
                    echo $this->Form->control('commision');
                    echo $this->Form->control('frenchie_id', ['options' => $frenchies]);
                    echo $this->Form->control('tm');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
