<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Payout $payout
 */
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
<div class="view border content">
    <div class="row">
        <div class="col-3">
        <img src="/img/logo.jpg" alt="logo" width="120" />

        </div>

        <div class="col-9">
                <div class="col-12">
                    <strong> FNI ONLINE MARKETING PRIVATE LIMITED</strong>
                </div>
                <div class="col-12">
                   <small> RING ROAD KAMRE, NEAR SBM SCHOOL KAMRE </small>
                </div>
                <div class="col-12">
                <small> RANCHI – 835222, JHARKHAND</small>

                </div>
                <div class="col-12">
                <small> PH NO –</small>

                </div>
                <div class="col-12">
                <small>  WEBSITE – FRIENDSNETINDIA.COM</small>

                </div>
                <div class="col-12">
                <small>    Email id – fnionlinemarketing@gmail.com, info@friendsnetindia.com</small>

                </div>
                <div class="col-6">
                <small>  PAN NO. AAECF0203D</small>

                </div>
                <div class="col-6">
                <small>  GST NO. </small>
                </div>

        </div>
    </div>

    <div class="row border text-center">
        <div class="col-12">
            <p class=""><u><strong>PAYOUT SUMMARY</strong></u></p>
        </div>
        <div class="col-6 text-left">
        DISTRIBUTOR ID:- <?=$payout->member->id ?>
        <br/>
        DISTRIBUTOR NAME : <?=$payout->member->name ?>
        <br/>
        </div>
        <div class="col-6 text-left">
        STATEMENT DATE :-  <?= $payout->payoutdt->process_on->format('d-m-Y') ?>
                   
        </br>
        Start DATE:-  <?= $payout->payoutdt->period_from->format('d-m-Y') ?>
        </br>
        Closing DATE:-  <?= $payout->payoutdt->period_to->format('d-m-Y') ?>
        
        </div>
        
        
    </div>
    <div class="row border">
        <div class="col-12">
        WEEKLY LEFT BV :- <?= $this->Number->format($payout->left_bv) ?> &nbsp;&nbsp;
        WEEKLY RIGHT BV :- <?= $this->Number->format($payout->right_bv) ?> &nbsp;&nbsp;
        MATCHING BV :- <?= $this->Number->format($payout->match_bv) ?> &nbsp;&nbsp;
        SELF BV :- <?= $this->Number->format($payout->self_bv) ?> &nbsp;&nbsp;
        MATCHING (%) :- <?= $this->Number->format($payout->mbonus) ?>%
        </div>
        
    </div>
    <div class="row border">
        <div class="col-2">
        </div>
        <div class="col-4 border">
            <div class="row border">
            <strong>COMISSION TYPE </strong>
            </div>
            <div class="row border">
            SELF BV BONUS :
                        </div>
           
            <div class="row border">
            MATCHIN BONUS :
                        </div>
            <div class="row border">
            SPONSOR BONUS :            </div>
            <div class="row border">
            RISING KING BONUS :            </div>
            <div class="row border">
            GROSS TOTAL
                        </div>
        </div>
        <div class="col-4 border">
        <div class="row border">
            <strong>AMOUNT </strong>
            </div>
            <div class="row border">
            <?= $this->Number->currency($payout->self_income,'INR') ?>
                        </div>
            
            <div class="row border">
            <?= $this->Number->currency($payout->amount,'INR') ?>
                        </div>
            <div class="row border">
            <?= $this->Number->currency($payout->sponsor_income,'INR') ?>
            </div>
            <div class="row border">             <?= $this->Number->currency($payout->rrp_bonus,'INR') ?>
</div>
            <div class="row border">
            <td><?= $this->Number->currency($payout->total,'INR') ?></td>
                        </div>
        </div>
        <div class="col-2">
        </div>
    </div>
    <div class="row text-center">
        <u>DEDUCTION</u>
    </div>
    <div class="row border">
    <div class="col-2">
        </div>
        <div class="col-4 border">
            <div class="row border">
                TSD
            </div>
            <div class="row border">
            ADMIN CHARGES
            </div>
            <div class="row">
            </div>
            <div class="row border">
            NET PAYOUT
            </div>
            
        </div>
        <div class="col-4 border">
            <div class="row border">
            <?= $this->Number->currency($payout->tds,'INR') ?>
            </div>
            <div class="row border">
            <?= $this->Number->currency($payout->sur,'INR') ?>
            </div>
            <div class="row">
            </div>
            <div class="row border">
            <?= $this->Number->currency($payout->net_pay,'INR') ?>
            </div>

            
        </div>

        <div class="col-2">
        </div>

    </div>
    <div class="row ">
    Amount in word : <?= inWord($payout->net_pay) ?>
    </div>
    <div class="row  text-center">
    This is computerised statement, it does not need to sign. 
    </div>

</div>