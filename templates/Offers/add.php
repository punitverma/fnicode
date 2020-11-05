<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Offer $offer
 */
$types=['P'=>'Product' , 'I'=>'Invoice'];
?>
<div class="row">
    <div class="column-responsive column-80">
        <div class="offers form content">
            <?= $this->Form->create($offer) ?>
            <fieldset>
                <legend><?= __('Add Offer') ?></legend>
                <?php
                    echo $this->Form->control('name',['label'=>'OFFER NAME']);
                    echo $this->Form->control('type',['options'=>$types]);
                    echo $this->Form->control('if_item_id',['label'=>'IF PURCHASE OF ']);
                    echo $this->Form->control('if_item_qty',['label'=>' and Minimun Qty is ']);
                    echo $this->Form->control('invoice_value',['label'=>'Invoice Value Minimun']);
                    echo $this->Form->control('item_id', ['options' => $items,'label'=>'GET Offer Item']);
                    echo $this->Form->control('qty');
                    echo $this->Form->control('points',['label'=>'BV ']);
                    echo $this->Form->control('discount',['label'=>'Discount in(%) on Sale Price']);
                    echo $this->Form->control('active');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
<script>
$(function() {
$("#type").change(function(){ 
    if($("#type").val()=='I'){
        $("label[for='if-item-id']").hide();
        $("#if-item-id").hide();
        $("label[for='if-item-qty']").hide();
        $("#if-item-qty").hide();
        $("label[for='invoice-value']").show();
        $("#invoice-value").show();
        

    }
    else
    {
        $("label[for='if-item-id']").show();
        $("#if-item-id").show();
        $("label[for='if-item-qty']").show();
        $("#if-item-qty").show();
        $("label[for='invoice-value']").hide();
        $("#invoice-value").hide();
        
    }
});

$('#type').trigger("change");


});
</script>