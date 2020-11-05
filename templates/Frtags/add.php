<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Frtag $frtag
 */
?>
<div class="row">
    <div class="column-responsive column-80">
        <div class="frtags form content">
            <?= $this->Form->create($frtag) ?>
            <fieldset>
                <legend><?= __('Add Tag') ?></legend>
                <?php
                    echo $this->Form->control('frenchie_id', ['options' => $frenchies, 'empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('add Tag')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
