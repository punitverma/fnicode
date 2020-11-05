<?php
function  inWord($number){
 
    $no = floor($number);
    $point = round($number - $no, 2) * 100;
    $hundred = null;
    $digits_1 = strlen($no);
    $i = 0;
    $str = array();
    $words = array('0' => '', '1' => 'one', '2' => 'two',
     '3' => 'three', '4' => 'four', '5' => 'five', '6' => 'six',
     '7' => 'seven', '8' => 'eight', '9' => 'nine',
     '10' => 'ten', '11' => 'eleven', '12' => 'twelve',
     '13' => 'thirteen', '14' => 'fourteen',
     '15' => 'fifteen', '16' => 'sixteen', '17' => 'seventeen',
     '18' => 'eighteen', '19' =>'nineteen', '20' => 'twenty',
     '30' => 'thirty', '40' => 'forty', '50' => 'fifty',
     '60' => 'sixty', '70' => 'seventy',
     '80' => 'eighty', '90' => 'ninety');
    $digits = array('', 'hundred', 'thousand', 'lakh', 'crore');
    while ($i < $digits_1) {
      $divider = ($i == 2) ? 10 : 100;
      $number = floor($no % $divider);
      $no = floor($no / $divider);
      $i += ($divider == 10) ? 1 : 2;
      if ($number) {
         $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
         $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
         $str [] = ($number < 21) ? $words[$number] .
             " " . $digits[$counter] . $plural . " " . $hundred
             :
             $words[floor($number / 10) * 10]
             . " " . $words[$number % 10] . " "
             . $digits[$counter] . $plural . " " . $hundred;
      } else $str[] = null;
   }
   $str = array_reverse($str);
   $result = implode('', $str);
   $points = ($point) ?
     "." . $words[$point / 10] . " " . 
           $words[$point = $point % 10] : '';
   return $result . "Rupees  " . $points . " Paise";
 }
 ?>
<style type="text/css">
<!--
.style8 {font-size: x-small}
-->
</style>

<table cellspacing="0" border="0">
  <tr> 
    <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 rowspan=6 height="60" align="center" valign=center bgcolor="#FFFFFF"><font color="#000000">
      <img src="/img/logo.jpg" width=200 height=200 > </font></td>
    <td style="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=10 align="center" valign=bottom bgcolor="#FFFFFF"><font size="+2"><b> 
      <?= $fromid->name ?>
      </b></font></td>
    <td style="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 align="center" valign=middle bgcolor="#FFFFFF"><span class="style8"><font color="#000000">ORIGINAL 
      FOR RECEIPIENT</font></span></td>
    <td width="98" align="left" valign=bottom><font color="#000000">&nbsp;
      </font></td>
  </tr>
  <tr> 
    <td height="27" colspan=10 align="center" valign=bottom bgcolor="#FFFFFF" style="border-left: 1px solid #000000; border-right: 1px solid #000000"><font color="#000000">&nbsp; 
      </font><font size=""><b> 
      <?= $fromid->address ?>
      </b></font></td>
    <td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 align="center" valign=middle bgcolor="#FFFFFF"><span class="style8"><font color="#000000">DUPLICATE 
      FOR SUPPLIER/TRANSPORTER</font></span></td>
    <td align="left" valign=bottom><font color="#000000">&nbsp;
      </font></td>
  </tr>
  <tr> 
    <td style="border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=10 align="center" valign=bottom bgcolor="#FFFFFF"><font size=""><b> 
      <?= $fromid->district->name .'-'. $fromid->pinno.' , '  .$states[$fromid->state_id]?>
      </b></font></td>
    <td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 rowspan=4 align="center" valign=middle bgcolor="#FFFFFF"><b><font size=4 color="#000000"> 
      INVOICE</font></b></td>
    <td align="left" valign=bottom><font color="#000000">&nbsp;
      </font></td>
  </tr>
  <tr> 
    <td style="border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=10 align="center" valign=bottom bgcolor="#FFFFFF"><font color="#000000" >
      
      <?= $fromid->id=='admin' ? 'WWW.FRIENDSNETINDIA.COM, EMAIL – FNIONLINEMARKETING@GMAIL.COM' : 'EMAIL – ' ?>
      </font></td>
    <td align="left" valign=bottom><font color="#000000">&nbsp;
      </font></td>
  </tr>
  <tr> 
    <td style="border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=10 align="center" valign=bottom bgcolor="#FFFFFF"><font color="#000000">PH 
      NO – 
      <?= $fromid->mobile ?>
      </font></td>
    <td align="left" valign=bottom><font color="#000000">&nbsp;
      </font></td>
  </tr>
  <tr> 
    <td width="195" align="left" valign=bottom bgcolor="#FFFFFF" style="border-bottom: 1px solid #000000"><b><font color="#000000">PAN 
      No:-</font></b></td>
    <td style="border-bottom: 1px solid #000000" colspan=2 align="center" valign=bottom bgcolor="#FFFFFF"><font color="#000000"> 
      <?= $fromid->pan ?>
      
      </font></td>
    <td width="84" align="left" valign=bottom bgcolor="#FFFFFF" style="border-bottom: 1px solid #000000"><b><font color="#000000">GST 
      No:-</font></b></td>
    <td style="border-bottom: 1px solid #000000" colspan=2 align="center" valign=bottom><font color="#000000">
      <?= $fromid->gst ?>
      </font></td>
    <td style="border-bottom: 1px solid #000000" colspan=4 align="center" valign=bottom bgcolor="#FFFFFF"><b><font color="#000000"><b><font color="#000000">STATE</font></b> 
      : 
      <?= $states[$fromid->state_id].':'. $fromid->state_id?>
      </font></b></td>
    <td align="left" valign=bottom><font color="#000000">&nbsp;
      </font></td>
  </tr>
  <tr> 
    <td width="135" height="19" align="left" valign=bottom bgcolor="#558ED5" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000"><font color="#000000">&nbsp;
      </font></td>
    <td width="273" align="left" valign=bottom bgcolor="#558ED5" style="border-bottom: 1px solid #000000"><font color="#000000">&nbsp;
      </font></td>
    <td style="border-bottom: 1px solid #000000" align="left" valign=bottom bgcolor="#558ED5"><font color="#000000">&nbsp;
      </font></td>
    <td width="89" align="left" valign=bottom bgcolor="#558ED5" style="border-bottom: 1px solid #000000"><font color="#000000">&nbsp;
      </font></td>
    <td width="44" align="left" valign=bottom bgcolor="#558ED5" style="border-bottom: 1px solid #000000"><b><font color="#000000">
      </font></b></td>
    <td style="border-bottom: 1px solid #000000" align="left" valign=bottom bgcolor="#558ED5"><font color="#000000">&nbsp;
      </font></td>
    <td width="97" align="left" valign=bottom bgcolor="#558ED5" style="border-bottom: 1px solid #000000"><font color="#000000">&nbsp;
      </font></td>
    <td width="91" align="left" valign=bottom bgcolor="#558ED5" style="border-bottom: 1px solid #000000"><font color="#000000">&nbsp;
      </font></td>
    <td width="64" align="left" valign=bottom bgcolor="#558ED5" style="border-bottom: 1px solid #000000"><font color="#000000">&nbsp;
      </font></td>
    <td width="52" align="left" valign=bottom bgcolor="#558ED5" style="border-bottom: 1px solid #000000"><b><font color="#000000">
      </font></b></td>
    <td width="51" align="left" valign=bottom bgcolor="#558ED5" style="border-bottom: 1px solid #000000"><font color="#000000">&nbsp;
      </font></td>
    <td width="96" align="left" valign=bottom bgcolor="#558ED5"><font color="#000000">&nbsp;
      </font></td>
    <td width="74" align="left" valign=bottom bgcolor="#558ED5" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000"><b><font color="#000000">
      </font></b></td>
    <td width="78" align="left" valign=bottom bgcolor="#558ED5" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000"><font color="#000000">&nbsp;
      </font></td>
    <td width="113" align="left" valign=bottom bgcolor="#558ED5" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-right: 1px solid #000000"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom><font color="#000000">&nbsp;
      </font></td>
  </tr>
  <tr> 
    <td height="19" colspan="5" align="left" valign=middle bordercolor="#000000" bgcolor="#CCCCCC" style="border-left: 2px solid #000000"><b><font color="#000000">DETAILS 
      OF RECEIVER (BILL TO):-</font></b><font color="#000000">&nbsp;
      </font><font color="#000000">&nbsp;</font></td>
    <td colspan="6" align="left" valign=middle bordercolor="#000000" bgcolor="#CCCCCC" style="border-left: 1px solid #000000"><b><font color="#000000">DETAILS 
      OF CONSIGNEE (SHIPPED TO)</font></b><font color="#000000">&nbsp;</font></td>
    <td align="left" valign=middle bordercolor="#000000" bgcolor="#CCCCCC" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000"><b><font color="#000000">TOTAL 
      BV:</font></b></td>
    <td colspan=2 align="left" valign=middle bordercolor="#000000" bgcolor="#CCCCCC" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000" sdval="600" sdnum="1033;"><b><font color="#000000"><?= $invoice->points ?></font></b></td>
    <td align="left" valign=middle bordercolor="#000000" bgcolor="#CCCCCC" style="border-bottom: 1px solid #000000; border-right: 1px solid #000000">&nbsp;</td>
    <td align="left" valign=bottom>&nbsp;</td>
  </tr>
  <tr> 
    <td style="border-left: 1px solid #000000" height="19" align="left" valign=middle bgcolor="#FFFFFF"><b><font color="#000000">NAME:-</font></b></td>
    <td style="border-top: 1px solid #000000" colspan=2 align="left" valign=middle bgcolor="#FFFFFF"><font color="#000000"><?= $toid->name ?></font></font></td>
    <td colspan="2" align="left" valign=middle><font color="#000000">(<?= $toid->id ?>)</font><font color="#000000">&nbsp;
      </font></td>
    <td colspan="6" align="left" valign=middle bgcolor="#FFFFFF" style="border-left: 1px solid #000000"><b><font color="#000000">NAME:-</font></b><font color="#000000">&nbsp;
      </font></td>
    <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000" align="center" valign=middle bgcolor="#FFFFFF">&nbsp;</td>
    <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000" colspan=2 align="center" valign=middle sdval="600" sdnum="1033;">&nbsp;</td>
    <td style="border-bottom: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=middle bgcolor="#FFFFFF"><font color="#FFFFFF">&nbsp;
      </font></td>
    <td align="left" valign=bottom><font color="#000000">&nbsp;
      </font></td>
  </tr>
  <tr> 
    <td style="border-left: 1px solid #000000" height="19" align="left" valign=top bgcolor="#FFFFFF"><b><font color="#000000">ADDRESS:-</font></b></td>
    <td colspan=4 rowspan="2" align="left" valign=top bgcolor="#FFFFFF" style="border-right: 1px solid #000000"><font color="#000000"><?= $addl['address'] ?></font></td>
    <td colspan="6" align="left" valign=top bgcolor="#FFFFFF" style="border-left: 1px solid #000000"><b><font color="#000000">ADDRESS:-</font></b><font color="#000000">&nbsp;
      </font></td>
    <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000" colspan=2 align="left" valign=bottom bgcolor="#FFFFFF"><font size="-1"><b><font color="#000000">DATE:-</font></b></font></td>
    <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-right: 1px solid #000000" colspan=2 align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000"><?= $invoice->date->format('d-m-Y') ?>
      </font></td>
    <td align="left" valign=bottom><font color="#000000">&nbsp;
      </font></td>
  </tr>
  <tr> 
    <td style="border-left: 1px solid #000000" height="19" align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td style="border-left: 1px solid #000000" align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td colspan="2" align="left" valign=bottom bgcolor="#FFFFFF" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000"><font size="-1"><b><font color="#000000">INVOICE 
      NO:-</font></b><comment></comment><font color="#000000">
      </font></font></td>
    <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-right: 1px solid #000000" colspan=2 align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000"><?= $invoice->receipt ?> 
      <font color="#000000"></font>
      </font></td>
    <td align="left" valign=bottom><font color="#000000">&nbsp;
      </font></td>
  </tr>
  <tr> 
    <td style="border-left: 1px solid #000000" height="19" align="left" valign=bottom bgcolor="#FFFFFF"><b><font color="#000000">DIST.</font></b></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">
      <?= $addl['dist'] ?>
    </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><b><font color="#000000">PIN No:-</font></b></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">
      <?=$addl['pinno'] ?>
    </font></td>
    <td style="border-right: 1px solid #000000" align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td colspan="2" align="left" valign=bottom bgcolor="#FFFFFF" style="border-left: 1px solid #000000"><b><font color="#000000">DIST.</font></b><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td colspan="3" align="left" valign=bottom bgcolor="#FFFFFF"><b><font color="#000000">PIN 
      No:-</font></b><font color="#000000">&nbsp;
      </font><font color="#000000">&nbsp;
      </font></td>
    <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000" colspan=2 align="left" valign=bottom bgcolor="#FFFFFF"><font size="-1"><b><font color="#000000">STATE 
      CODE:</font></b></font></td>
    <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-right: 1px solid #000000" colspan=2 align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">
      <?= $invoice->tostate?>
    </font></td>
    <td align="left" valign=bottom><font color="#000000">&nbsp;
      </font></td>
  </tr>
  <tr> 
    <td style="border-left: 1px solid #000000" height="19" align="left" valign=bottom bgcolor="#FFFFFF"><b><font color="#000000">PHONE 
      No:-</font></b></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">
      <?= $toid->mobile ?>
    </font></td>
    <td align="left" valign=bottom><b><font color="#000000">STATE:-</font></b></td>
    <td colspan="2" align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">
      <?= $states[$invoice->tostate] ?>
    </font><font color="#000000">&nbsp;
      </font></td>
    <td colspan="3" align="left" valign=bottom bgcolor="#FFFFFF" style="border-left: 1px solid #000000"><b><font color="#000000">PHONE 
      No:-</font></b><font color="#000000">&nbsp;
      </font><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><b><font color="#000000">STATE:-</font></b></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000" colspan=2 align="left" valign=bottom bgcolor="#FFFFFF"><font size="-2"><b><font color="#000000">MODE 
      OF TRANSPORT</font></td>
    <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000" align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">SELF</font></td>
    <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom><font color="#000000">&nbsp;
      </font></td>
  </tr>
  <tr> 
    <td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000" height="19" align="left" valign=bottom bgcolor="#FFFFFF"><b><font color="#000000">GST 
      No:-</font></b></td>
    <td style="border-bottom: 1px solid #000000" align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">
      <?= h($invoice->togst) ?>
    </font></td>
    <td style="border-bottom: 1px solid #000000" align="left" valign=bottom bgcolor="#FFFFFF"><b><font color="#000000">PAN 
      No:-</font></b></td>
    <td style="border-bottom: 1px solid #000000; border-right: 1px solid #000000" colspan=2 align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">
      <?= $toid->pan ?>
    </font></td>
    <td colspan="3" align="left" valign=bottom bgcolor="#FFFFFF" style="border-bottom: 1px solid #000000; border-left: 1px solid #000000"><b><font color="#000000">GST 
      No:-</font></b><font color="#000000">&nbsp;
      </font><font color="#000000">&nbsp;
      </font></td>
    <td colspan="3" align="left" valign=bottom bgcolor="#FFFFFF" style="border-bottom: 1px solid #000000"><b><font color="#000000">PAN 
      No:-</font></b><font color="#000000">&nbsp;
      </font><font color="#000000">&nbsp;
      </font></td>
    <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000" colspan=2 align="left" valign=bottom bgcolor="#FFFFFF"><font size="-1"><b><font color="#000000">PAYMENT 
      MODE:-</font></b></font></td>
    <td colspan="2" align="left" valign=bottom bgcolor="#FFFFFF" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000"><font color="#000000"><?= $invoice->payment_mode ?></font><font color="#000000">&nbsp;
    </font></td>
    <td align="left" valign=bottom><font color="#000000">&nbsp;
      </font></td>
  </tr>
  
                    <tr bordercolor="#000000" bgcolor="#CCCCCC">
                    <th rowspan="2">Sr. NO</th>
                    <th rowspan="2">Name of Product </th>
                    <th rowspan="2">HSN </th>
                    <th rowspan="2">Qty </th>
                    <?php if($invoice->type=='P') {?> 
                        <th rowspan="2"> Batch No.</th>
                        <th rowspan="2"> Manf. Date</th>
                        <th rowspan="2"> Exp. Date</th>  
                
                    <?php } ?>
                    <th rowspan="2" align="right"> Rate</th>
                    <th rowspan="2" align="right"> Amount</th>
                    <th rowspan="2" align="right"> Less Deduction</th>
                    <th  rowspan="2" align="right"> Taxable Value</th>
                    <th colspan="2" align="center"> SGST</th>
                    <th colspan="2" align="center"> CGST</th>
                    <th colspan="2" align="center"> IGST</th>
                    <th rowspan="2" align="right"> TOTAL</th>
                    </tr>
                    <tr>
                        <th align="right" bgcolor="#CCCCCC">Rate &percnt; </th>
                        <th align="right" bgcolor="#CCCCCC">Amount</th>
                        <th align="right" bgcolor="#CCCCCC">Rate &percnt; </th>
                        <th align="right" bgcolor="#CCCCCC">Amount</th>
                        <th align="right" bgcolor="#CCCCCC">Rate &percnt; </th>
                        <th align="right" bgcolor="#CCCCCC">Amount</th>
                    </tr>
            
           <?php 
                    $i=1;
                    $total=0;
                    $amount=0;
                    $gtotal=0;
                    $cgst=0;$sgst=0;$igst=0;
                    $qty=0;
                    $less=0;
                    $taxable=0;
					$offer='';
                    foreach ($invoice->invoicedetails as $rec) {
						if($rec->offer=='Y')
							$offer=$rec->itemname .'(QTY :.' .$rec->qty .')'; 
                        $amount = $rec->price * $rec->qty;
                        $total+=$amount;
                        $qty+= $rec->qty;
                        $gtotal+=$rec->amount;
                        $igst+= $rec->igst_a;
                        $cgst+= $rec->cgst_a;
                        $sgst+= $rec->sgst_a;
                        $less+= $amount * $rec->discount/100;
                        $taxable+= $amount * (1- $rec->discount/100);

                    ?>
           
           <tr>
                        <td><?= $i++ ?></td>
                        <td><?= $rec->itemname ?></td>
                        <td><?= $rec->hsn ?></td>
                        <td align="left"><?= $rec->qty ?></td>
                        <?php if($invoice->type=='P'){?>
                    <td><?= $rec->batch_no ?></td>
                    <td><?= $rec->dt_manf==null ? '' : $rec->dt_manf->format('d-m-Y') ?></td>
                    <td><?= $rec->dt_exp==null ? '' : $rec->dt_exp->format('d-m-Y') ?></td>
                    
                  <?php } ?>
             

                        <td align="right"><?= $rec->price ?></td>
                        <td align="right"><?= $amount ?></td>
                        <td align="right"><?= $rec->discount==0? '' : $rec->discount.'%'  ?></td>
                        <td align="right"><?= round( $amount * (100 -$rec->discount)/100 ,2)?></td>
                        <td align="right"><?= $rec->sgst_p ?>%</td>
                        <td align="right"><?= $this->Number->currency(  $rec->sgst_a,'INR') ?></td>
                        <td align="right"><?= $rec->cgst_p ?>%</td>
                        <td align="right"><?=  $this->Number->currency(  $rec->cgst_a,'INR') ?></td>
                        <td align="right"><?= $rec->igst_p ?>%</td>
                        <td align="right"><?= $this->Number->currency(  $rec->igst_a,'INR') ?></td>
                        <td align="right"><?= $this->Number->currency( $rec->amount,'INR') ?></td>
  </tr>

           <?php } ?>
           
           <tr bgcolor="#CCCCCC">
                        <td colspan="3">Total</td>
                        <td align="left">                          <?=$qty ?>                        </td>
                        <td align="right"></td>
                         <td align="right">                           <?=  $this->Number->currency( $total,'INR') ?>                         </td>
                         <td align="right">                           <?=  $this->Number->currency( $less,'INR') ?>                         </td>
                         <td align="right"><?=  $this->Number->currency( $taxable,'INR') ?></td>
                         <td align="right"></td>
                         <td align="right">                           <?=  $this->Number->currency( $sgst,'INR') ?>                         </td>
                         <td align="right"></td>
                         <td align="right">                           <?=  $this->Number->currency( $cgst,'INR') ?>                         </td>
                         <td align="right"></td>
                         <td align="right">                           <?=  $this->Number->currency( $igst,'INR') ?>                         </td>
                         <td align="right">                           <?=  $this->Number->currency(  round( $gtotal ,2),'INR')?>                         </td>
  </tr>

  <tr> 
    <td style="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=11 height="27" align="left" valign=middle bgcolor="#FFFFFF"><b>FREE 
      (SAMPLE/OFFER/SCHEME):- <?= $offer ?></b></td>
    <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000" colspan=3 align="right" valign=middle bgcolor="#FFFFFF"><b>DISCOUNT <?= $invoice->discount==0 ? '' : '('.(round($invoice->discount*100/$gtotal)).'%)' ?></b></td>
    <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-right: 1px solid #000000" align="right" valign=middle bgcolor="#FFFFFF"><font face="Segoe UI"><?=  $this->Number->currency(  round( $invoice->discount ,2),'INR')?></font></td>
    <td align="left" valign=bottom><font color="#000000">&nbsp;
      </font></td>
  </tr>
  <tr> 
    <td style="border-left: 1px solid #000000" height="27" align="left" valign=bottom bgcolor="#FFFFFF"></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF" sdnum="1033;0;0%"></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"></td>
    <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000" colspan=3 align="right" valign=middle bgcolor="#FFFFFF"><b>Net 
      Payable Amount</b></td>
    <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-right: 1px solid #000000" align="right" valign=middle bgcolor="#FFFFFF"><font face="Segoe UI"><?=  $this->Number->currency(  round( $invoice->amount ,2),'INR')?></font></td>
    <td align="left" valign=bottom><font color="#000000">&nbsp;
      </font></td>
  </tr>
  <tr> 
    <td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=11 height="19" align="left" valign=bottom bgcolor="#FFFFFF"><b><font color="#000000">INVOICE 
      TOTAL (IN WORDS) :- <?= inWord(round( $invoice->amount ,2)) ?> </font></b></td>
    <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=4 align="center" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom><font color="#000000">&nbsp;
      </font></td>
  </tr>
  <tr> 
    <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000" height="19" align="left" valign=bottom bgcolor="#558ED5"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#558ED5"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#558ED5"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#558ED5"><font color="#000000">&nbsp;
      </font></td>
    <td style="border-top: 1px solid #000000" align="left" valign=bottom bgcolor="#558ED5"><font color="#000000">&nbsp;
      </font></td>
    <td style="border-top: 1px solid #000000" align="left" valign=bottom bgcolor="#558ED5"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#558ED5"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#558ED5"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#558ED5"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#558ED5"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#558ED5"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#558ED5"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#558ED5"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#558ED5"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#558ED5"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom><font color="#000000">&nbsp;
      </font></td>
  </tr>
  <tr> 
    <td style="border-top: 1px solid #000000; border-left: 1px solid #000000" height="19" align="left" valign=bottom bgcolor="#FFFFFF"><b><u><font color="#000000">Terms 
      &amp; Conditions:-</font></u></b></td>
    <td style="border-top: 1px solid #000000" align="left" valign=bottom><font color="#000000">&nbsp;
      </font></td>
    <td style="border-top: 1px solid #000000" align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td style="border-top: 1px solid #000000" align="left" valign=bottom><font color="#000000">&nbsp;
      </font></td>
    <td style="border-top: 1px solid #000000" align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td style="border-top: 1px solid #000000; border-left: 1px solid #000000" align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td style="border-top: 1px solid #000000" align="left" valign=bottom bgcolor="#FFFFFF"><b><font color="#000000">
      </font></b></td>
    <td style="border-top: 1px solid #000000" align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td style="border-top: 1px solid #000000" align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td style="border-top: 1px solid #000000" align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td style="border-top: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td style="border-top: 1px solid #000000; border-left: 1px solid #000000" align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000" align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000" align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom><font color="#000000">&nbsp;
      </font></td>
  </tr>
  <tr> 
    <td style="border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=5 height="19" align="left" valign=bottom bgcolor="#FFFFFF"><font size=1 color="#000000">Payment 
      By A/C Payee Cheque/Draft Only.</font></td>
    <td style="border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=6 rowspan=3 align="center" valign=middle bgcolor="#FFFFFF"><strong><font color="#000000">For, 
      
      <?= $fromid->name ?>
      </font><font color="#000000">.</font></strong></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 align="center" valign=bottom bgcolor="#FFFFFF"><b><font color="#000000">TAX 
      DETAILS:-</font></b></td>
    <td align="left" valign=bottom><font color="#000000">&nbsp;
      </font></td>
  </tr>
  <tr> 
    <td style="border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=5 height="19" align="left" valign=bottom bgcolor="#FFFFFF"><font size=1 color="#000000">Seller 
      is Not Responsible of Any Loss or Damage of Goods in Transit</font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle bgcolor="#FFFFFF"><b><font color="#000000">CGST</font></b></td>
    <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle bgcolor="#FFFFFF"><b><font color="#000000">SGST</font></b></td>
    <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle bgcolor="#FFFFFF"><b><font color="#000000">IGST</font></b></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
  </tr>
  <tr> 
    <td style="border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=5 height="21" align="left" valign=bottom bgcolor="#FFFFFF"><font size=1 color="#000000">The 
      Scheme Product in The Invoice Can Not be Returned or Exchanged</font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000" align="center" valign=middle bgcolor="#FFFFFF"><font face="Segoe UI"><?=  $this->Number->currency( $cgst,'INR') ?></font></td>
    <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle bgcolor="#FFFFFF"><font face="Segoe UI"><?=  $this->Number->currency( $sgst,'INR') ?></font></td>
    <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign=middle bgcolor="#FFFFFF" sdval="0" sdnum="1033;0;0.00"><font color="#000000"><?=  $this->Number->currency( $igst,'INR') ?></font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
  </tr>
  <tr> 
    <td style="border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=5 height="19" align="left" valign=bottom bgcolor="#FFFFFF"><font size=1 color="#000000">Any 
      Inaccuracy in This Bill Must be Notified Immidetly on Its Receipt</font></td>
    <td style="border-left: 1px solid #000000" align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><b><font color="#000000">
      </font></b></td>
    <td align="left" valign=bottom><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td style="border-right: 1px solid #000000" align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td style="border-right: 1px solid #000000" align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
  </tr>
  <tr> 
    <td style="border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=5 height="19" align="left" valign=bottom bgcolor="#FFFFFF"><font size=1 color="#000000">Disputes 
      if Any Will be Subject to Ranchi Court Jurisdiction</font></td>
    <td style="border-left: 1px solid #000000" align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td colspan=2 align="center" valign=bottom bgcolor="#FFFFFF"><b><font color="#000000">Authorised 
      Signatury</font></b></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td style="border-right: 1px solid #000000" align="left" valign=bottom><b><font face="Arial" color="#222222">E&amp;EO</font></b></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td style="border-right: 1px solid #000000" align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
  </tr>
  <tr> 
    <td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000" height="19" align="left" valign=bottom bgcolor="#FFFFFF"><font size=1 color="#000000">&nbsp;
      </font></td>
    <td style="border-bottom: 1px solid #000000" align="left" valign=bottom bgcolor="#FFFFFF"><font size=1 color="#000000">&nbsp;
      </font></td>
    <td style="border-bottom: 1px solid #000000" align="left" valign=bottom bgcolor="#FFFFFF"><font size=1 color="#000000">&nbsp;
      </font></td>
    <td style="border-bottom: 1px solid #000000" align="left" valign=bottom bgcolor="#FFFFFF"><font size=1 color="#000000">&nbsp;
      </font></td>
    <td style="border-bottom: 1px solid #000000" align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000" align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td style="border-bottom: 1px solid #000000" align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td style="border-bottom: 1px solid #000000" align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td style="border-bottom: 1px solid #000000" align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td style="border-bottom: 1px solid #000000" align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td style="border-bottom: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td style="border-bottom: 1px solid #000000" align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td style="border-bottom: 1px solid #000000" align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td style="border-bottom: 1px solid #000000" align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td style="border-bottom: 1px solid #000000; border-right: 1px solid #000000" align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
  </tr>
  <tr> 
    <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=15 height="19" align="center" valign=middle bgcolor="#92D050"><b><font color="#FFFFFF">Regd. 
      Office :- HOUSE NO – 85/B-4, RING ROAD KAMRE, RANCHI – 835222, WWW.FRIENDSNETINDIA.COM, 
      EMAIL – FNIONLINEMARKETING@GMAIL.COM, PH NO – 9508108530</font></b></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
  </tr>
  <tr> 
    <td style="border-top: 1px solid #000000" colspan=15 height="19" align="center" valign=bottom bgcolor="#FFFFFF"><b><font color="#000000">This 
      is Computer Generated Invoice</font></b></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
  </tr>
  <tr> 
    <td height="19" align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
  </tr>
  <tr> 
    <td height="19" align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
  </tr>
  <tr> 
    <td height="19" align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
  </tr>
  <tr> 
    <td height="19" align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
  </tr>
  <tr> 
    <td height="19" align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
  </tr>
  <tr> 
    <td height="19" align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
  </tr>
  <tr> 
    <td height="19" align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
  </tr>
  <tr> 
    <td height="19" align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
    <td align="left" valign=bottom bgcolor="#FFFFFF"><font color="#000000">&nbsp;
      </font></td>
  </tr>
</table>
