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
            <?= $this->Html->link(__('Edit Payoutdt'), ['action' => 'edit', $payoutdt->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Payoutdt'), ['action' => 'delete', $payoutdt->id], ['confirm' => __('Are you sure you want to delete # {0}?', $payoutdt->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Payoutdt'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Payoutdt'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="payoutdt view content">
            <h3><?= h($payoutdt->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($payoutdt->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Total Self Bv') ?></th>
                    <td><?= $this->Number->format($payoutdt->total_self_bv) ?></td>
                </tr>
                <tr>
                    <th><?= __('Match Bv') ?></th>
                    <td><?= $this->Number->format($payoutdt->match_bv) ?></td>
                </tr>
                <tr>
                    <th><?= __('Mbonus') ?></th>
                    <td><?= $this->Number->format($payoutdt->mbonus) ?></td>
                </tr>
                <tr>
                    <th><?= __('Total') ?></th>
                    <td><?= $this->Number->format($payoutdt->total) ?></td>
                </tr>
                <tr>
                    <th><?= __('Tds') ?></th>
                    <td><?= $this->Number->format($payoutdt->tds) ?></td>
                </tr>
                <tr>
                    <th><?= __('Surcharge') ?></th>
                    <td><?= $this->Number->format($payoutdt->surcharge) ?></td>
                </tr>
                <tr>
                    <th><?= __('Net Pay') ?></th>
                    <td><?= $this->Number->format($payoutdt->net_pay) ?></td>
                </tr>
                <tr>
                    <th><?= __('Period From') ?></th>
                    <td><?= h($payoutdt->period_from) ?></td>
                </tr>
                <tr>
                    <th><?= __('Period To') ?></th>
                    <td><?= h($payoutdt->period_to) ?></td>
                </tr>
                <tr>
                    <th><?= __('Process On') ?></th>
                    <td><?= h($payoutdt->process_on) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Payout') ?></h4>
                <?php if (!empty($payoutdt->payout)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Payoutdt Id') ?></th>
                            <th><?= __('Member Id') ?></th>
                            <th><?= __('Sponsor') ?></th>
                            <th><?= __('Kyc') ?></th>
                            <th><?= __('Active') ?></th>
                            <th><?= __('Total Self Bv') ?></th>
                            <th><?= __('Self Bv') ?></th>
                            <th><?= __('Total Left Bv') ?></th>
                            <th><?= __('Left Bv') ?></th>
                            <th><?= __('Total Right Bv') ?></th>
                            <th><?= __('Right Bv') ?></th>
                            <th><?= __('Balance Left') ?></th>
                            <th><?= __('Balance Right') ?></th>
                            <th><?= __('Match Bv') ?></th>
                            <th><?= __('Mbonus') ?></th>
                            <th><?= __('Self Income') ?></th>
                            <th><?= __('Amount') ?></th>
                            <th><?= __('Sponsor Income') ?></th>
                            <th><?= __('Total') ?></th>
                            <th><?= __('Tds') ?></th>
                            <th><?= __('Sur') ?></th>
                            <th><?= __('Net Pay') ?></th>
                            <th><?= __('Process On') ?></th>
                            <th><?= __('Paid On') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($payoutdt->payout as $payout) : ?>
                        <tr>
                            <td><?= h($payout->id) ?></td>
                            <td><?= h($payout->payoutdt_id) ?></td>
                            <td><?= h($payout->member_id) ?></td>
                            <td><?= h($payout->sponsor) ?></td>
                            <td><?= h($payout->kyc) ?></td>
                            <td><?= h($payout->active) ?></td>
                            <td><?= h($payout->total_self_bv) ?></td>
                            <td><?= h($payout->self_bv) ?></td>
                            <td><?= h($payout->total_left_bv) ?></td>
                            <td><?= h($payout->left_bv) ?></td>
                            <td><?= h($payout->total_right_bv) ?></td>
                            <td><?= h($payout->right_bv) ?></td>
                            <td><?= h($payout->balance_left) ?></td>
                            <td><?= h($payout->balance_right) ?></td>
                            <td><?= h($payout->match_bv) ?></td>
                            <td><?= h($payout->mbonus) ?></td>
                            <td><?= h($payout->self_income) ?></td>
                            <td><?= h($payout->amount) ?></td>
                            <td><?= h($payout->sponsor_income) ?></td>
                            <td><?= h($payout->total) ?></td>
                            <td><?= h($payout->tds) ?></td>
                            <td><?= h($payout->sur) ?></td>
                            <td><?= h($payout->net_pay) ?></td>
                            <td><?= h($payout->process_on) ?></td>
                            <td><?= h($payout->paid_on) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Payout', 'action' => 'view', $payout->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Payout', 'action' => 'edit', $payout->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Payout', 'action' => 'delete', $payout->id], ['confirm' => __('Are you sure you want to delete # {0}?', $payout->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
