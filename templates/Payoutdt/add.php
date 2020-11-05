<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Payoutdt $payoutdt
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Payoutdt'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="payoutdt form content">
            <?= $this->Form->create($payoutdt) ?>
            <fieldset>
                <legend><?= __('Add Payoutdt') ?></legend>
                <?php
                    echo $this->Form->control('period_from');
                    echo $this->Form->control('period_to');
                    echo $this->Form->control('process_on');
                    echo $this->Form->control('total_self_bv');
                    echo $this->Form->control('match_bv');
                    echo $this->Form->control('mbonus');
                    echo $this->Form->control('total');
                    echo $this->Form->control('tds');
                    echo $this->Form->control('surcharge');
                    echo $this->Form->control('net_pay');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
