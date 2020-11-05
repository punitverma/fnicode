<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Item[]|\Cake\Collection\CollectionInterface $items
 */
?>
<div class="row">
    
    <div class="col-12">
    <div class="card">
    <div class="card-header info">
    Stock Report Of <?= $fid ?>
  </div>
  <div class="card-body">
  <div class="items index content">
    <div class="table-responsive">
        <table class="table small border">
            <thead>
                <tr>
                <th>SL</th>
                    <th>Item Code</th>
                    <th>Item Name</th>
                    <th>HSN CODE</th>
                    <th>BV</th>
                    <th>Price</th>
                    <th>QTY IN</th>
                    <th>QTY OUT</th>
                    <th>Balance</th>
                    <th>Stock Value</th>
                    <th>Total BV</th>
                </tr>
            </thead>
            <tbody>
                <?php $i=1; foreach ($stocks as $item): ?>
                <tr>
                <td><?= h($i++) ?></td>
                    <td><?= h($item['code']) ?></td>
                    <td><?= h($item['name']) ?></td>
                    <td><?= h($item['hsn']) ?></td>
                    <td><?= h($item['points']) ?></td>
                    <td><?= h($item['saleprice']) ?></td>
                    <td><?= h($item['in_qty']) ?></td>
                    <td><?= h($item['out_qty']) ?></td>
                    <td><?= h($item['in_qty']- $item['out_qty']) ?></td>
                    <td><?= ($item['in_qty']- $item['out_qty']) *$item['saleprice']  ?></td>
                    <td><?= ($item['in_qty']- $item['out_qty']) *$item['points'] ?></td>
                    
                  
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    
</div>
</div>
  </div>
    </div>
</div>
