<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Combo $combo
 */
?>
<div class="row">
    <div class="column-responsive column-80">
        <div class="combos form content">
            <?= $this->Form->create($combo) ?>
            <fieldset>
                <legend><?= __('Add Combo') ?></legend>
                <?php
                    echo $this->Form->control('subitem', ['options' => $items]);
                 
                    echo $this->Form->control('qty');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
