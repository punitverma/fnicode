<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Offersitem $offersitem
 */
?>
<div class="row">
    <div class="column-responsive column-80">
        <div class="offersitems form content">
            <?= $this->Form->create($offersitem) ?>
            <fieldset>
                <legend><?= __('Add Offersitem') ?></legend>
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
