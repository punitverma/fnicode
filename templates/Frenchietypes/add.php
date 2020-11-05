<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Frenchietype $frenchietype
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Frenchietypes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="frenchietypes form content">
            <?= $this->Form->create($frenchietype) ?>
            <fieldset>
                <legend><?= __('Add Frenchietype') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('commission',['label'=>'Commission( in %)']);
                    echo $this->Form->control('scope');
                    echo $this->Form->control('active');
                    echo $this->Form->control('dttm');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
