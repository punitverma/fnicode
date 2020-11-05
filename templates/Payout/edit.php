<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Payout $payout
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $payout->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $payout->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Payout'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="payout form content">
            <?= $this->Form->create($payout) ?>
            <fieldset>
                <legend><?= __('Edit Payout') ?></legend>
                <?php
                    echo $this->Form->control('period_from');
                    echo $this->Form->control('period_to');
                    echo $this->Form->control('member_id', ['options' => $members]);
                    echo $this->Form->control('sponsor');
                    echo $this->Form->control('kyc');
                    echo $this->Form->control('active');
                    echo $this->Form->control('self_bv');
                    echo $this->Form->control('left_bv');
                    echo $this->Form->control('right_bv');
                    echo $this->Form->control('balance_left');
                    echo $this->Form->control('balance_right');
                    echo $this->Form->control('match_bv');
                    echo $this->Form->control('amount');
                    echo $this->Form->control('process_on');
                    echo $this->Form->control('sponsor_income');
                    echo $this->Form->control('total');
                    echo $this->Form->control('tds');
                    echo $this->Form->control('sur');
                    echo $this->Form->control('net_pay');
                    echo $this->Form->control('paid_on', ['empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
