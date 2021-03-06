<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Kyc $kyc
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Kycs'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="kycs form content">
            <?= $this->Form->create($kyc) ?>
            <fieldset>
                <legend><?= __('Add Kyc') ?></legend>
                <?php
                    echo $this->Form->control('member_id', ['options' => $members]);
                    echo $this->Form->control('pan');
                    echo $this->Form->control('ifsc');
                    echo $this->Form->control('name');
                    echo $this->Form->control('accno');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
