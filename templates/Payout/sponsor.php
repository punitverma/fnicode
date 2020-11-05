<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Payout[]|\Cake\Collection\CollectionInterface $payout
 */
$i=1;
?>
<div class="payout index content">
    <h3><?= $title ?></h3>
    <div class="table-responsive">
        <table class="table small table-bordered">
            <thead>
                <tr>
                <th>
                    
                    <?= $this->Paginator->sort('member_id',['lebel'=>'Distributor#']) ?></th>
                    <th><?= $this->Paginator->sort('amount',['label'=>'Matching Bonus']) ?></th>
                    <th>Matching Bonus (%)</th>
                    <th> Credit(+) </th>
                    <th>Description</th>

                    
                </tr>
            </thead>
            <tbody>
                <?php foreach ($payout as $payout): ?>
                <tr>
                <td> 
                
                <?= $payout->member_id ?> <?= $payout->has('member') ? $this->Html->link($payout->member->name, ['controller' => 'Members', 'action' => 'view', $payout->member->id]) : '' ?>
                </td>
                    <td><?= $this->Number->format($payout->amount) ?></td>
                    <td>50%</td>
                    <td><?= $this->Number->format($payout->amount/2) ?></td>
                    <td>Sponsor Bonus</td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
