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
            <?= $this->Html->link(__('List Kycdocs'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="kycdocs form content">
            <?= $this->Form->create($kycdoc) ?>
            <fieldset>
                <legend><?= __('Add Kycdoc') ?></legend>
                <?php
                    echo $this->Form->control('kyc_id', ['options' => $kycs]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
