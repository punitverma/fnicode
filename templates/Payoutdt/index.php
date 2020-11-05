<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Payoutdt[]|\Cake\Collection\CollectionInterface $payoutdt
 */
?>
<div class="payoutdt index content">
    <h3><?= __('Payout Report') ?></h3>
    <div class="table-responsive">
        <table class="table table-border small">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('period_from') ?></th>
                    <th><?= $this->Paginator->sort('period_to') ?></th>
                    <th><?= $this->Paginator->sort('process_on') ?></th>
                    <th><?= $this->Paginator->sort('self_bv',['label'=>'Closing BV ']) ?></th>
                    
                    <th><?= $this->Paginator->sort('total_self_bv',['label'=>'Total Self BV Bonus']) ?></th>
                    <th><?= $this->Paginator->sort('match_bv',['label'=>'Total M Bonus']) ?></th>
                    <th><?= $this->Paginator->sort('mbonus',['label'=>'Total Sponsor  Bonus']) ?></th>
                    
                    <th><?= $this->Paginator->sort('total_rrp_bonus',['label'=>'Total RK Bonus']) ?></th>
                                        
                    <th><?= $this->Paginator->sort('total',['label'=>'Gross Total']) ?></th>
                    <th><?= $this->Paginator->sort('tds') ?></th>
                    <th><?= $this->Paginator->sort('surcharge') ?></th>
                    <th><?= $this->Paginator->sort('net_pay') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($payoutdt as $payoutdt): ?>
                <tr>
                   
                    <td><?= h($payoutdt->period_from->i18nFormat('dd-MM-yyyy')) ?></td>
                    <td><?= h($payoutdt->period_to->i18nFormat('dd-MM-yyyy')) ?></td>
                    <td><?= h($payoutdt->process_on->i18nFormat('dd-MM-yyyy')) ?></td>
                    <td><?= $this->Number->format($payoutdt->self_bv) ?></td>

                    <td><?= $this->Number->format($payoutdt->total_self_bv) ?></td>
                    <td><?= $this->Number->format($payoutdt->match_bv) ?></td>
                    <td><?= $this->Number->format($payoutdt->mbonus) ?></td>
                    <td><?= $this->Number->format($payoutdt->total_rrp_bonus) ?></td>

                    <td><?= $this->Number->format($payoutdt->total) ?></td>

                    <td><?= $this->Number->format($payoutdt->tds) ?></td>
                    <td><?= $this->Number->format($payoutdt->surcharge) ?></td>
                    <td><?= $this->Number->format($payoutdt->net_pay) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $payoutdt->id]) ?>
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
