<?php
    $types=['S'=>'Sale','P'=>'Purchase'];
    $cats=['D'=>'Distributor','U'=>'UnRegistered','R'=>'Registered'];
?>
<div class="invoices index content">
<?= $this->Form->create() ?>
<div class="row">
<div class="col-4">Date From <input type="date" require name="from_dt" value="<?= h($from_dt) ?>" /></div>
<div class="col-4">Date To <input type="date" require value="<?= h($to_dt) ?>" name="to_dt"/></div>
    
</div>
<div class="row mt-2">
<div class="col-4"><?= $this->Form->control('type',[ 'select'=>h($type), 'label'=>'Transaction','options'=>$types]) ?></div>
<div class="col-4"><?= $this->Form->control('cat',['label'=>'Category','options'=>$cats]) ?></div>
<div class="col-4"><button class="btn btn-success">SHOW</button></div>
    
</div>
<?= $this->Form->end() ?>


</div>
<div class="invoices index content">
    <table class="table-striped border small">
    <thead>
                <tr>
                    <th>SL</th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>GST No</th>
                    <th>Bill Date</th>
                    <th>Bill No#</th>
                    <th>No of Items</th>
                    <th>IGST</th>
                    <th>CGST</th>
                    <th>SGST</th>
                    <th>Discount</th>
                    <th>Amount</th>
                    
                </tr>
    </thead>
    <tbody>
        <?php $i=1; foreach ($res as $rec):  ?>
        <tr>
            <td><?= $i++ ?></td>
            <td><?= $rec['id'] ?> </td>
            <td><?= $rec['name'] ?> </td>
            <td><?= $rec['gst'] ?> </td>
            <td><?= $rec['date'] ?> </td>
            <td><a href="/invoices/view/<?= $rec['invoice_id'] ?>" target='_blank'> <?= $rec['receipt'] ?> </a> </td>
            <td><?= $rec['qty'] ?> </td>
            <td><?= $rec['igst'] ?> </td>
            <td><?= $rec['cgst'] ?> </td>
            <td><?= $rec['sgst'] ?> </td>
            <td><?= $rec['discount'] ?> </td>
            <td><?= $rec['amount'] ?> </td>
            
        </tr>
        <?php endforeach; ?>

    <tbody>
    </table>
</div>