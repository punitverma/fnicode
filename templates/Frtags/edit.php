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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $frtag->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $frtag->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Frtags'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="frtags form content">
            <?= $this->Form->create($frtag) ?>
            <fieldset>
                <legend><?= __('Edit Frtag') ?></legend>
                <?php
                    echo $this->Form->control('tagwith');
                    echo $this->Form->control('frenchie_id', ['options' => $frenchies, 'empty' => true]);
                    echo $this->Form->control('updt');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
