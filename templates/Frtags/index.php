<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Frtag[]|\Cake\Collection\CollectionInterface $frtags
 */
?>
<div class="frtags index content">
    <?= $u->role_id==2 ? $this->Html->link(__('New Tag'), ['action' => 'add',$tagwith], ['class' => 'button float-right']) : '' ?>
    <h3><?= __('Tag') ?> </h3>
    <b><?= 'ID : ' .$tag->id.' Name : '.$tag->name.' Owner Name : '.$tag->ownername ?></b>
   
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('frenchie_id') ?></th>
                    <th>Name</th>
                    <th>Owner Name</th>
                    <th>Mobile</th>
                    <th>Address</th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($frtags as $frtag): ?>
                <tr>
                    <td><?= $frtag->frenchy->id ?></td>
                    <td><?= $frtag->frenchy->name ?></td>
                    <td><?= $frtag->frenchy->ownername ?></td>
                    <td><?= $frtag->frenchy->mobile ?></td>
                    <td><?= $frtag->frenchy->address ?></td>
                    <td class="actions">
                        <?= ($u->role_id==2 || $u->role_id==12)  ? $this->Form->postLink(__('UnTag'), ['action' => 'delete', $frtag->id], ['confirm' => __('Are you sure you want to untag # {0}?', $frtag->frenchy->id)]) : '' ?>
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
