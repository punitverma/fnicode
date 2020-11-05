<?php

//die();
?>
<!--Main layout-->
<main>
    <div class="container">

        <!--Section: Main info-->
        <section class="wow">
            <div class="row">
                <div class="col-md-12 col-xl-10 col-sm-12 mb-1 ">

                    <div class="card">
                        <div class="card-header info">
                            KYC (Know Your Customer)
                        </div>
                        <div class="card-body">
                        <?= $this->Form->create($kyc,['onsubmit'=>'return valPan();']) ?>
                            <div class="row">
                            <?php if($kyc->member->kyc=='R') {?>
                                <div class="col-md-12 col-sm-6">
                                <div class="alert alert-danger" role="alert">
                                Rejected Due to : <?= $kyc->remarks ?>
                                </div>
                                </div>
                            <?php } ?>
                            <div class="col-md-12 col-sm-6">
                                <div class="md-form">
                                    <?= $this->Form->control('pan', ['style'=>"text-transform:uppercase",'label' => 'PAN Card No.', 'class' => 'form-control']); ?>
                                </div>
                            </div>
                            <!--
<!--                            <div class="col-md-6 col-sm-12">
                                <div class="md-form">
                                    <?= $this->Form->control('name', ['label' => 'Name of Acc Holder.', 'class' => 'form-control']); ?>
                                </div>
                            </div>
-->                        
                            <div class="col-md-6 col-sm-12">
                                <div class="md-form">
                                    <?= $this->Form->control('bank', ['style'=>"text-transform:uppercase",'label' => 'Name of Bank', 'class' => 'form-control']); ?>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="md-form">
                                    <?= $this->Form->control('branch', ['style'=>"text-transform:uppercase",'label' => 'Branch Name', 'class' => 'form-control']); ?>
                                </div>
                            </div>    
                            <div class="col-md-6 col-sm-12">
                                <div class="md-form">
                                    <?= $this->Form->control('ifsc', ['style'=>"text-transform:uppercase",'label' => 'IFSC Code', 'class' => 'form-control']); ?>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="md-form">
                                    <?= $this->Form->control('accno', ['label' => 'Bank Account No', 'class' => 'form-control']); ?>
                                </div>
                            </div>


                            
                        </div>
                        <dic class="row">
                        <div class="col-md-6 col-sm-12">
                        <?php if( ($kyc->approveby==null && $kyc->approveon==null) || $kyc->member->kyc=='R') { ?>
                        <?= $this->Form->button(__('Submit'),['id'=>'btnSave','class' => 'form-control btn btn-success']) ?>
                        <?php } ?>
                        </div>
                        <?php if($kyc->id!=null){?>
                        <div class="col-md-6 col-sm-12">
                        
                            <a href="/kycdocs/index/<?= $kyc->member_id?>" class="button btn" >Upload Document</a>
                               
                         </div>   
                        <?php } ?>
                         </div>
                        </div>
                        <?= $this->Form->end() ?>

                    </div>
                    <div class="row">
                            
                        </div>

                </div>
                    
            </div>

        </section>
    </div>
    </div>
</main>
<script>
function valPan(){

   var txtPANCard = document.getElementById("pan");
        var regex = /([A-Z]){5}([0-9]){4}([A-Z]){1}$/;
var ret=false;
        if (regex.test(txtPANCard.value.toUpperCase()) || txtPANCard.value==='A/F') {
            ret= true;
        } else {
            message('error','PAN is not valid ,Please Valid PAN or Write A/F for Applied For PAN');

         ret= false;
        }
return ret;
}
$(function() {

$("#ifsc").blur(function(){
//    ifsc($("#btnSave").prop('disabled',true));
/*    if($("#ifsc").val().length>=8){
        ifsc($("#ifsc").val());     
    }*/
});

});

function ifsc(code){
    var lb=$("#bank");
    $("#btnSave").prop('disabled',true);

    $.ajax('/ifsc/'+code, {
        type: 'GET',  
        success: function (data, status, xhr) {
            if(data['result']=='ok'){
                $("#btnSave").prop('disabled',false);
            
                lb.html(data['bank']['BANK']+" Branch :"+ data['bank']['BRANCH']);
            }
            else
            if(data['result']=='error'){
                lb.html("Not Found")
            }
        },
        error: function (jqXhr, textStatus, errorMessage) {
            lb.html("N/A")
        }
        });
}

//ifsc('<?= $kyc->ifsc  ?>');
</script>