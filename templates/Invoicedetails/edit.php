<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Invoicedetail $invoicedetail
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $invoicedetail->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $invoicedetail->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Invoicedetails'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="invoicedetails form content">
            <?= $this->Form->create($invoicedetail) ?>
            <fieldset>
                <legend><?= __('Edit Invoicedetail') ?></legend>
                <?php
                    echo $this->Form->control('invoice_id', ['options' => $invoices]);
                    echo $this->Form->control('item_id', ['options' => $items]);
                    echo $this->Form->control('itemname');
                    echo $this->Form->control('price');
                    echo $this->Form->control('points');
                    echo $this->Form->control('qty');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
