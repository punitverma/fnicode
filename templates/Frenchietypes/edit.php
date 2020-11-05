<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Frenchietype $frenchietype
 */
?>
<div class="row">
    <div class="column-responsive column-80">
        <div class="frenchietypes form content">
            <?= $this->Form->create($frenchietype) ?>
            <fieldset>
                <legend><?= __('Edit Frenchietype') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('commission');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
