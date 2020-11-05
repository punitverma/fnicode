<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Frenchy $frenchy
 */
$reg=['Y'=>'Yes','N'=>'No'];
?>
<div class="row">
    <div class="column-responsive column-80">
        <div class="frenchies form content">
            <?= $this->Form->create($frenchy,['onsubmit'=>'return check(this)']) ?>
            <fieldset>
                <legend><?= __('Edit Franchise :').$frenchy->id ?></legend>
                <div class="row">
                <div class="col-4 input text" >COMPANY / FIRM NAME</div>
                <div class="col-8"><?= $this->Form->control('name',['label'=>false,'size'=>50]) ?></div>
            </div>
            <div class="row">
                <div class="col-4 input text" >OWNER NAME</div>
                <div class="col-8"><?= $this->Form->control('ownername',['label'=>false,'size'=>50]) ?></div>
            </div>
            <div class="row">
                <div class="col-4 input text" >Address</div>
                <div class="col-8"><?= $this->Form->control('address',['label'=>false,'size'=>50]) ?></div>
            </div>
            <div class="row mt-2">
                <div class="col-4 mr-2"><?=$this->Form->control('state_id', ['label'=>false,'options' => $states])?></div>
            
                <div class="col-4 ml-2"><?= $this->Form->control('district_id', ['label'=>false,'options' => null,'empty'=>'--DISTRICT--']) ?></div>
            </div>
            <div class="row">
                <div class="col-2 input text" >PIN Code</div>
                <div class="col-4"><?= $this->Form->control('pincode',['label'=>false,'size'=>12]) ?></div>
                <div class="col-2 input text" >Mobile</div>
                <div class="col-4"><?= $this->Form->control('mobile',['label'=>false,'size'=>12]) ?></div>
         
            </div>
            <div class="row mt-2">
                
                <div class="col-6"><?= $this->Form->control('registered',['label'=>'Is Regsitered','options'=>$reg,'selected'=>'Y']) ?></div>
                <div class="col-2 input text" >GST No</div>
                <div class="col-4"><?= $this->Form->control('gst',['label'=>false,'size'=>12]) ?></div>
         
            </div>
            <div class="row mt-5">
                <div class="col-2 input text" >Bank</div>
                <div class="col-4"><?= $this->Form->control('bank',['label'=>false,'size'=>20]) ?></div>
                <div class="col-2 input text" >Branch</div>
                <div class="col-4"><?= $this->Form->control('branch',['label'=>false,'size'=>20]) ?></div>
            </div>
            <div class="row">
                <div class="col-2 input text" >IFSC</div>
                <div class="col-4"><?= $this->Form->control('ifsc',['label'=>false,'size'=>20]) ?></div>
                <div class="col-2 input text" >A/c No</div>
                <div class="col-4"><?= $this->Form->control('accountno',['label'=>false,'size'=>20]) ?></div>
            </div>
            <div class="row">
                <div class="col-2 input text" >PAN No</div>
                <div class="col-4"><?= $this->Form->control('pan',['label'=>false,'size'=>20]) ?></div>
                <div class="col-2 input text" >Email</div>
                <div class="col-4 mt-3"><?= $this->Form->control('email',['type'=>'email','label'=>false,'size'=>20]) ?></div>
          
            </div>
            </fieldset>
            <?= $this->Form->button(__('Update'),['id'=>'btn_update']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
<script>
function check(f){

var txtPANCard = document.getElementById("pan");
     var regex = /([A-Z]){5}([0-9]){4}([A-Z]){1}$/;
var ret=false;
    
     if (txtPANCard.value.toUpperCase()=='AF'){
        ret= true;

     }else
     if (regex.test(txtPANCard.value.toUpperCase()) ) {
         ret= true;
     } else {
         message('error','PAN is not valid');

      ret= false;
     }
return ret;
}

$(function(){

    $("#sponsor").on('blur',function(){
        $("#btn_update").prop('disabled',true);
        var id = $(this).val();
        var targeturl='/findfrenchie';
        $("#sponsorname").html('Searching Id');
                  
        $.ajax({
              type:'get',
              url: targeturl+"/"+id,                  
			  //data:'id='+id+'&type=state',
			  dataType: 'json',
			  success:function(data){
                  if(data.status=='ok' && data.result.length==1){
                     // alert(data.result[0].name);
                    $("#btn_update").prop('disabled',false);
                    $("#sponsorname").html(data.result[0].name);
                  }
				   else{
                    $("#sponsorname").html('Not Found');
                   }

			  }
		  });

    });
    $('#registered').on('change', function() {
        var id = $(this).val();
        if(id=='Y'){
            $("#gst").show();
            $("label[for='gst']").html('GST No.');

        }
        else{
            $("#gst").hide();
            $("label[for='gst']").html('GST No : N/A');

        }
    });   
    $('#registered').trigger("change");
    $("#sponsor").trigger('blur');
  
  $('#state-id').on('change', function() {

    var id = $(this).val();
    var targeturl = '/districts';
    if(id == '0'){
      $('#district-id').html(`<option value="-1">Select State</option>`);
    }else{
      
	    $('#district-id').html(`<option value="-1">Select State</option>`); 	
		  $.ajax({
              type:'get',
              url: targeturl+"/"+id,                  
			  //data:'id='+id+'&type=state',
			  dataType: 'json',
			  success:function(result){
				  // $("#divLoading").removeClass('show');
				  $.each(result.result, function (key, data) {
                    $('#district-id').append('<option value="'+ key +'">'+ data+'</option>');
                  });
                   

			  }
		  });	
	  }
	});


});
</script>