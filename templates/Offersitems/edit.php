<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Offersitem $offersitem
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $offersitem->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $offersitem->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Offersitems'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="offersitems form content">
            <?= $this->Form->create($offersitem) ?>
            <fieldset>
                <legend><?= __('Edit Offersitem') ?></legend>
                <?php
                    echo $this->Form->control('offer_id', ['options' => $offers]);
                    echo $this->Form->control('item_id', ['options' => $items]);
                    echo $this->Form->control('sale_price');
                    echo $this->Form->control('discount');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
