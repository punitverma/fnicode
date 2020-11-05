<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Frenchiecomm[]|\Cake\Collection\CollectionInterface $frenchiecomms
 */
?>
<div class="frenchiecomms index content">
    <h3><?= __('Frenchiecomms') ?></h3>
    <div class="table-responsive">
        <table class="table border table-striped table-responsive">
            <thead>
                <tr>
                    <th>Franchise ID</th>
                    <th>Franchise Name</th>
                    
                    <th><?= $this->Paginator->sort('invoiceno',['label'=>'Bill No']) ?></th>
                    <th><?= $this->Paginator->sort('tm',['label'=>'Bill Date']) ?></th>
                    <th><?= $this->Paginator->sort('amount',['label'=>'Bill Amount']) ?></th>
                    <th><?= $this->Paginator->sort('percent',['label'=>'Direct Referal']) ?></th>
                    <th><?= $this->Paginator->sort('commision',['label'=>'Referal Points']) ?></th>
                  
                   </tr>
            </thead>
            <tbody>
                <?php foreach ($frenchiecomms as $frenchiecomm): ?>
                <tr>
                <td><?= $frenchiecomm->frenchy->id ?></td>
                    <td><?= $frenchiecomm->frenchy->name ?></td>
                    <td><?= h($frenchiecomm->invoiceno) ?></td>
                    <td><?= h($frenchiecomm->tm->setTimezone( new \DateTimeZone( 'Asia/Kolkata' ) )->i18nFormat('dd-MM-yyyy')) ?></td>
                  
                    <td><?= $this->Number->currency($frenchiecomm->amount,'INR') ?></td>
                   
                  
                    <td><?= $this->Number->format($frenchiecomm->percent) ?>%</td>
                    <td><?= $this->Number->currency($frenchiecomm->commision,'INR') ?></td>
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
