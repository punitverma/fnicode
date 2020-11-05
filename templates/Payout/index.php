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
                <?php if($u->role_id==2){ ?>
                <th>
                    
                    <?= $this->Paginator->sort('member_id',['lebel'=>'Distributor#']) ?></th>
                <?php } ?>
                    <th>Rank</th>
                    <th><?= $this->Paginator->sort('period_from',['label'=>'Date From']) ?></th>
                    <th><?= $this->Paginator->sort('period_to',['label'=>'Date To']) ?></th>
                    
                   
                    <th><?= $this->Paginator->sort('total_left_bv',['label'=>'Total Left BV']) ?></th>
                    <th><?= $this->Paginator->sort('total_right_bv',['label'=>'Total Right BV']) ?></th>
                    <th><?= $this->Paginator->sort('self_bv',['label'=>'Weekly Self BV']) ?></th>
                    
                    <th><?= $this->Paginator->sort('left_bv',['label'=>'Weekly Left BV']) ?></th>
                    <th><?= $this->Paginator->sort('right_bv',['label'=>'Weekly Right BV']) ?></th>
                    <th><?= $this->Paginator->sort('match_bv',['label'=>'Weekly Matching BV']) ?></th>
                   <!--
                    <th><?= $this->Paginator->sort('total_self_bv',['label'=>'Total Self BV']) ?></th>
                  -->
                    <th><?= $this->Paginator->sort('mbonus',['label'=>'Matching Bonus (%)']) ?></th>
                    <th><?= $this->Paginator->sort('rrp_match',['label'=>'Matching RRP']) ?></th>
                                    
                    <th><?= $this->Paginator->sort('self_income',['label'=>'Self BV Bonus']) ?></th>

                    <th><?= $this->Paginator->sort('amount',['label'=>'Matching Bonus']) ?></th>
                   
                    <th><?= $this->Paginator->sort('sponsor_income',['label'=>'Sponsor Bonus']) ?></th>
                    <th><?= $this->Paginator->sort('rrp_bonus',['label'=>'Rising King Bonus']) ?></th>
                  
                    <th><?= $this->Paginator->sort('total',['label'=>'Gross Total']) ?></th>
                    <th><?= $this->Paginator->sort('tds') ?></th>
                    <th><?= $this->Paginator->sort('sur',['label'=>'Srchg']) ?></th>
                    <th><?= $this->Paginator->sort('net_pay',['label'=>'Net Amount']) ?></th>
                    <th><?= $this->Paginator->sort('paid_on',['label'=>'Payment Released On']) ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($payout as $payout): ?>
                <tr>
                <?php if($u->role_id==2){?>
                <td> 
                
                <?= $payout->member_id ?> <?= $payout->has('member') ? $this->Html->link($payout->member->name, ['controller' => 'Members', 'action' => 'view', $payout->member->id]) : '' ?>
                </td>
                <?php } ?>
                    <td>
                    
                    </td>
                    <td><?=  is_null($payout->payoutdt) ?'' : $payout->payoutdt->period_from->format('d-m-Y') ?></td>
                    <td><?=  is_null($payout->payoutdt) ?'' : h($payout->payoutdt->period_to->format('d-m-Y')) ?></td>
                   <td><?= $this->Number->format($payout->total_left_bv) ?></td>
                    <td><?= $this->Number->format($payout->total_right_bv) ?></td>
                    <td><?= $this->Number->format($payout->self_bv) ?></td>

                    <td><?= $this->Number->format($payout->left_bv) ?></td>
                    <td><?= $this->Number->format($payout->right_bv) ?></td>
                    <td><?= $this->Number->format($payout->match_bv) ?></td>
<!--                    <td><?= $this->Number->format($payout->total_self_bv) ?></td> -->
                    
                    <td><?= $this->Number->format($payout->mbonus) ?>%</td>
                   <td><?= $this->Number->format($payout->rrp_match) ?></td>
                    <td><?= $this->Number->format($payout->self_income) ?></td>
                    
                    <td><?= $this->Number->format($payout->amount) ?></td>
                    
                    <td>
                    <?php if($payout->sponsor_income>0) { ?>
                    <a href="/payout/sponsor/<?= $payout->payoutdt_id .'/'. $payout->member_id ?>"> <?= $this->Number->format($payout->sponsor_income) ?> </a> 
                    <?php } else echo '0.0'; ?>
                    </td>
                    <td><?= $this->Number->format($payout->rrp_bonus) ?></td>
                    <td><?= $this->Number->format($payout->total) ?></td>


                    <td><?= $this->Number->format($payout->tds) ?></td>
                    <td><?= $this->Number->format($payout->sur) ?></td>
                    <td><?= $this->Number->format($payout->net_pay) ?></td>
                   
                  
                    <td><?= $payout->paid_on==null ?'' :  $payout->paid_on->i18nFormat('dd-MM-yyyy') ?></td>
                    <td class="actions">
                    
                        <?= $this->Html->link(__('View'), ['action' => 'view', $payout->id,$payout->payoutdt_id]) ?>
                    <!--    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $payout->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $payout->id], ['confirm' => __('Are you sure you want to delete # {0}?', $payout->id)]) ?>
                    -->
                    </td>
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
