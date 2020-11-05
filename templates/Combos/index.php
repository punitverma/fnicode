<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Combo[]|\Cake\Collection\CollectionInterface $combos
 */
?>
<div class="combos index content">
    <h3>Combo Name: <?= $items[$item_id] ?> </h3>
    <?= $stock->qty==0 ?  $this->Html->link(__('add New Item'), ['action' => 'add',$item_id], ['class' => 'button float-right']) :'' ?>
      <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('subitem') ?></th>
                    <th><?= $this->Paginator->sort('qty') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($combos as $combo): ?>
                <tr>
                    <td><?= h($items[$combo->subitem]) ?></td>
                    <td><?= $this->Number->format($combo->qty) ?></td>
                    <td class="actions">
                       <?= $stock->qty==0 ?  $this->Form->postLink(__('Delete'), ['action' => 'delete', $combo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $combo->id)]) :'' ?>
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

    <div class="row">
    <?= $this->Form->create($combo,['url'=>'/combos/generate','class'=>'form-inline']) ?>

        <input type='hidden' name='item_id' value="<?= $item_id ?>" />        
        <div class="col-4">Generate Item Qty</div>
        <div class="col-4"><input type='number' value="<?= h($max[0]['qty']) ?>" name='qty' min="1" max="<?= h($max[0]['qty']) ?>"> </div>
        <div class="col-4"><button class="btn btn-success">GENERATE</button> </div>
        <?= $this->Form->end() ?>

    </div>
    <?php if($stock->qty>0 ) { ?>
    <div class="row">
        <form class='form-inline'>
        <div class="col-4">Available QTY </div>
        <div class="col-2"><?= $stock->qty ?> </div> 
        <div class="col-6">
        <a href="/combos/release/<?= $item_id ?>" class="btn btn-danger"> Release Items</a></div>
        </form>
    </div>
    <?php } ?>
</div>
