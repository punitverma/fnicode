<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Member $member
 */
?>
<div class="row">
    <div class="column-responsive column-80">
        <div class="members view content">
            <h3><?= h($member->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= h($member->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Membertype') ?></th>
                    <td><?= $member->membertype->name ?></td>
                </tr>
                <tr>
                    <th><?= __('Sponsor') ?></th>
                    <td><?= l($member->sponsor) ?></td>
                </tr>
                <tr>
                    <th><?= __('Parent') ?></th>
                    <td><?= l($member->parent) ?></td>
                </tr>
                <tr>
                    <th><?= __('Placement') ?></th>
                    <td><?= h($member->placement) ?></td>
                </tr>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($member->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Gender') ?></th>
                    <td><?= h($member->gender) ?></td>
                </tr>
                <tr>
                    <th><?= __('Address') ?></th>
                    <td><?= h($member->adddetails) ?></td>
                </tr>
                <tr>
                    <th><?= __('Mobile') ?></th>
                    <td><?= h($member->mobile) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($member->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Address') ?></th>
                    <td><?= $member->has('address') ? $this->Html->link('View', ['controller' => 'Addresses', 'action' => 'view', $member->address->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Kyc') ?></th>
                    <td><?= h($member->kyc) ?></td>
                </tr>
                <tr>
                    <th><?= __('Active') ?></th>
                    <td><?= h($member->active) ?></td>
                </tr>
                <tr>
                    <th><?= __('Date of  Activation') ?></th>
                    <td><?= h($member->dt_activate) ?></td>
                </tr>
                <tr>
                    <th><?= __('Leftid') ?></th>
                    <td><?= l($member->leftid) ?></td>
                </tr>
                
                <tr>
                    <th><?= __('Left Activate') ?></th>
                    <td><?= h($member->left_activate) ?></td>
                </tr>
                <tr>
                    <th><?= __('Rightid') ?></th>
                    <td><?= l($member->rightid) ?></td>
                </tr>
                
                <tr>
                    <th><?= __('Right Activate') ?></th>
                    <td><?= h($member->right_activate) ?></td>
                </tr>
                <tr>
                    <th><?= __('Self Week Points') ?></th>
                    <td><?= $this->Number->format($member->self_week_points) ?></td>
                </tr>
                <tr>
                    <th><?= __('Self Total Points') ?></th>
                    <td><?= $this->Number->format($member->self_total_points) ?></td>
                </tr>
                <tr>
                    <th><?= __('Week Points') ?></th>
                    <td><?= $this->Number->format($member->week_points) ?></td>
                </tr>
                <tr>
                    <th><?= __('Total Points') ?></th>
                    <td><?= $this->Number->format($member->total_points) ?></td>
                </tr>
                <tr>
                    <th><?= __('Registered on') ?></th>
                    <td><?= h($member->cr_tm) ?></td>
                </tr>
                          </table>
            <div class="related">
                <h4><?= __('Related Kycs') ?></h4>
                <?php if (!empty($member->kycs)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Member Id') ?></th>
                            <th><?= __('Pan') ?></th>
                            <th><?= __('Ifsc') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Accno') ?></th>
                            <th><?= __('Approveby') ?></th>
                            <th><?= __('Approveon') ?></th>
                        </tr>
                        <?php foreach ($member->kycs as $kycs) : ?>
                        <tr>
                            <td><?= h($kycs->id) ?></td>
                            <td><?= h($kycs->member_id) ?></td>
                            <td><?= h($kycs->pan) ?></td>
                            <td><?= h($kycs->ifsc) ?></td>
                            <td><?= h($kycs->name) ?></td>
                            <td><?= h($kycs->accno) ?></td>
                            <td><?= h($kycs->approveby) ?></td>
                            <td><?= h($kycs->approveon) ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Transcations') ?></h4>
                <?php if (!empty($member->transcations)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Dt') ?></th>
                            <th><?= __('From Memeber') ?></th>
                            <th><?= __('Placement') ?></th>
                            <th><?= __('Points') ?></th>
                            <th><?= __('Invoice Id') ?></th>
                        </tr>
                        <?php foreach ($member->transcations as $transcations) : ?>
                        <tr>
                            <td><?= h($transcations->dt) ?></td>
                            <td><?= h($transcations->from_memeber) ?></td>
                            <td><?= h($transcations->placement) ?></td>
                            <td><?= h($transcations->points) ?></td>
                            <td><?= h($transcations->invoice_id) ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php
function l($id){
    return $id==null || $id=='NA' ? "--" : "<a href='/members/view/". $id."'>".$id."</a>" ;
}
?>