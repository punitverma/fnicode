<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Item[]|\Cake\Collection\CollectionInterface $items
 */
$states=['N'=>'Pending','Y'=>'Approved','A'=>'All','R'=>'Rejected'];
?>
<div class="row">
    
    <div class="col-12">
    <div class="card">
    <div class="card-header info">
    <?= $this->Form->control('status',['options'=>$states,'label'=>'List Distributors KYC for ','default'=>$status]) ?>
  </div>
  <div class="card-body">
  <div class="items index content">
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                <th><?= $this->Paginator->sort('member_id') ?></th>
                    <th><?= 'Distributor Name' ?></th>
                    <th><?= $this->Paginator->sort('pan') ?></th>
                    <th><?= $this->Paginator->sort('ifsc') ?></th>
                    <th><?= $this->Paginator->sort('accno') ?></th>
                    <th><?= 'Status' ?></th>
                    
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($kycs as $item): ?>
                <tr>
                <td><?= h($item->member_id) ?></td>
                    <td><?= h($item->member->name) ?></td>
                    <td><?= h($item->ifsc) ?></td>
                    <td><?= h($item->pan) ?></td>
                    
                    <td><?= h($item->accno) ?></td>
                    <td><?= h($states[$item->member->kyc]) ?></td>
                    <td class="actions">
                        
                        <?= $this->Html->link(__('View'), ['action' => 'view', $item->id]) ?>
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
</div>
  </div>
    </div>
</div>
<script>
$(function() {
    $("#status").change(function(){
        document.location="/kycs/list/"+$(this).val();
    });
});
</script>