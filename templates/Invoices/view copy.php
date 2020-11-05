<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Invoice $invoice
 */
$v = array('P' => 'Purchase', 'S' => 'Sale Invoice', 'O' => 'Order', 'I' => 'Sale Invoice');


?>
<div class="card">
    <div class="card-header info">
        <?= $v[$invoice->type] ?>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-2">
                <img src="/img/logo.jpg" alt="logo" width="120" />
            </div>
            <div class="col-8 h6">
                <div class="col-12">
                    FNI ONLINE MARKETING PRIVATE LIMITED
                </div>
                <div class="col-12">
                    RING ROAD KAMRE, NEAR SBM SCHOOL KAMRE
                </div>
                <div class="col-12">
                    RANCHI – 835222, JHARKHAND
                </div>
                <div class="col-12">
                    PH NO –
                </div>
                <div class="col-12">
                    WEBSITE – FRIENDSNETINDIA.IN
                </div>
                <div class="col-12">
                    Email id – fnionlinemarketing@gmail.com, info@friendsnetindia.com
                </div>
                <div class="col-6">
                    PAN NO. AAECF0203D
                </div>
                <div class="col-6">
                    GST NO.
                </div>

            </div>
            <div class="col-2">
                <?= $v[$invoice->type] ?>
            </div>
        </div> <!-- end row-->
        <div class="row">
            <div class="col-6">
                <div class="row">
                    <div class="col-6">Invoice No#</div>
                    <div class="col-6"><?= $invoice->receipt ?></div>
                </div>
            </div>
            <div class="col-6">
                <div class="row">
                    <div class="col-6"> Invoice Date : </div>
                    <div class="col-6"> <?= $invoice->date->format('d-m-Y') ?> </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="row">
                    <div class="col-6">BILL FROM</div>
                    <div class="col-6"> <?= $invoice->fromid=='admin' ? $invoice->fromname : $invoice->fromid .':' . $invoice->fromname  ?> </div>
                    <div class="col-6">STATE</div>
                    <div class="col-6"> <?= $invoice->fromstate .' : '.$states[$invoice->fromstate]  ?> </div>
                </div>
            </div>
            <div class="col-6">
                <div class="row">
                <div class="row">
                    <div class="col-6">BILL TO</div>
                    <div class="col-6"> <?= $invoice->toid=='admin' ? $invoice->toname : $invoice->toid .':' . $invoice->toname  ?> </div>
                    <div class="col-6">STATE</div>
                    <div class="col-6"> <?= $invoice->tostate .' : '.$states[$invoice->tostate]  ?> </div>
                </div>


                </div>
            </div>

        </div> <!-- end row-->

        <div class="row">
            <table class="table table-sm small border"  style="text-align:right">
                <thead>
                    <tr>
                    <th rowspan="2">Sr. NO</th>
                    <th rowspan="2">Name of Product </th>
                    <th rowspan="2">HSN </th>
                    <th rowspan="2">Qty </th>
                    <?php if($invoice->type=='P') {?> 
                        <th rowspan="2"> Batch No.</th>
                        <th rowspan="2"> Manf. Date</th>
                        <th rowspan="2"> Exp. Date</th>  
                
                    <?php } ?>
                    <th rowspan="2"> Rate</th>
                    <th rowspan="2"> Amount</th>
                    <th rowspan="2"> Less Deduction</th>
                    <th  rowspan="2"> Taxable Value</th>
                    <th colspan="2"> SGST</th>
                    <th colspan="2"> CGST</th>
                    <th colspan="2"> IGST</th>
                    <th rowspan="2"> TOTAL</th>
                    </tr>
                    <tr>
                        <th>Rate &percnt; </th>
                        <th>Amount</th>
                        <th>Rate &percnt; </th>
                        <th>Amount</th>
                        <th>Rate &percnt; </th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $i=1;
                    $total=0;
                    $amount=0;
                    $gtotal=0;
                    $cgst=0;$sgst=0;$igst=0;
                    $qty=0;
                    $less=0;
                    foreach ($invoice->invoicedetails as $rec) {
                        $amount = $rec->price * $rec->qty;
                        $total+=$amount;
                        $qty+= $rec->qty;
                        $gtotal+=$rec->amount;
                        $igst+= $rec->igst_a;
                        $cgst+= $rec->cgst_a;
                        $sgst+= $rec->sgst_a;
                        $less+= $amount * $rec->discount/100;
                    ?>
                    <tr>
                        <td><?= $i++ ?></td>
                        <td><?= $rec->itemname ?></td>
                        <td><?= $rec->hsn ?></td>
                        <td><?= $rec->qty ?></td>
                        <?php if($invoice->type=='P'){?>
                    <td><?= $rec->batch_no ?></td>
                    <td><?= $rec->dt_manf==null ? '' : $rec->dt_manf->format('d-m-Y') ?></td>
                    <td><?= $rec->dt_exp==null ? '' : $rec->dt_exp->format('d-m-Y') ?></td>
                    
                  <?php } ?>
             

                        <td><?= $rec->price ?></td>
                        <td><?= $amount ?></td>
                        <td><?= $rec->discount==0? '' : $rec->discount.'%'  ?></td>
                        <td><?= round( $amount * (100 -$rec->discount)/100 ,2)?></td>
                        <td><?= $rec->sgst_p ?>%</td>
                        <td><?= $this->Number->currency(  $rec->sgst_a,'INR') ?></td>
                        <td><?= $rec->cgst_p ?>%</td>
                        <td><?=  $this->Number->currency(  $rec->cgst_a,'INR') ?></td>
                        <td><?= $rec->igst_p ?>%</td>
                        <td><?= $this->Number->currency(  $rec->igst_a,'INR') ?></td>
                        <td><?= $this->Number->currency( $rec->amount,'INR') ?></td>
                        

                    </tr>

                    <?php } ?>
                    <tr>
                        <td colspan="3">Total</td>
                        <td><?=$qty ?></td>
                        <td></td>
                         <td><?=  $this->Number->currency( $total,'INR') ?></td>
                         <td><?=  $this->Number->currency( $less,'INR') ?></td>
                         <td><?=  $this->Number->currency( $total,'INR') ?></td>
                         <td></td>
                         <td><?=  $this->Number->currency( $sgst,'INR') ?></td>
                         <td></td>
                         <td><?=  $this->Number->currency( $cgst,'INR') ?></td>
                         <td></td>
                         <td><?=  $this->Number->currency( $igst,'INR') ?></td>
                         <td><?=  $this->Number->currency(  round( $gtotal ,2),'INR')?></td>
                    </tr>
                    <tr>
                            <td colspan="14">Discount</td><td><?=  $this->Number->currency(  round( $invoice->discount ,2),'INR')?></td>
                    </tr>
                    <tr>
                            <td colspan="14">Net Payable Amount</td><td><?=  $this->Number->currency(  round( $invoice->amount ,2),'INR')?></td>
                    </tr>
                </tbody>
            </table>

        </div> <!-- end row-->

    </div>
</div>