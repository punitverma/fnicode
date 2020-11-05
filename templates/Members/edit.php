<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Member $member
 */
$genders = ['M' => 'Sex :Male', 'F' => 'Sex :Female', 'X' => 'Sex :Transgender', 'N' => 'Sex :N/A'];
$ans = ['Y' => 'Yes', 'N' => 'No'];
$place=['C'=>'NA','L'=>'Left','R'=>'Right'];
?>

<div class="row">
<?= $this->Form->create(null,['url'=>'/members/edit/'.$member->id]) ?>
<input type='hidden' name='refurl' value='<?= $refurl ?>'/>
    <div class="members form  content w-100">
    <h3>DISTRIBUTOR PROFILE ( MY PROFILE)</h3>
    <div class='border'>
    <div class="row">
                <div class="col-3">ID </div>
                <div class="col-3"><?= $member['id'] ?></div>
                <div class="col-3">NAME </div>
                <div class="col-3">
                <?php if($u->role_id==2) { ?>
                    <input type='text' name='name' value="<?= h( $member['name']) ?>" />
                <?php } else {?>
                <?= h( $member['name']) ?>
                <?php } ?>
                 </div>
            </div>
            <div class="row">
                <div class="col-3">SPONSOR ID</div>
                <div class="col-3"><?= $member['sponsor'] ?> </div>
                <div class="col-3">SPONSOR NAME </div>
                <div class="col-3"><?= is_null($smember) ? 'NA' :  $smember['name'] ?> </div>
            </div>
            <div class="row">
                <div class="col-3"> MEMBER TYPE</div>
                <div class="col-3"><?= $member['membertype']['name'] ?> </div>
                <div class="col-3">PLACESMENT AREA </div>
                <div class="col-3"> <?= $place[ $member['placement']] ?> </div>
            </div>
            <div class="row">
                <div class="col-3"> REGISTRATION DATE</div>
                <div class="col-3"> <?= $member['cr_tm']==null ? 'N/A' : $member->cr_tm->format('d-m-Y') ?></div>
                <div class="col-3"> ACTIVATION DATE</div>
                <div class="col-3"><?= $member['dt_activate']==null ? 'N/A' : $member->dt_activate->format('d-m-Y') ?> </div>
            </div>
</div>
<div class='border mt-2'>
<div class="row">
    <div class="col-12">
    <h5> PERSONAL INFORMATION:-</h5>
    </div>
 </div>
<div class="row">
    <div class="col-3">Father/Spouse (S/O, D/O, W/O)</div>
    <div class="col-4"><input type='text' class='w-100' value="<?= h($member->father_name) ?>"  name='father_name' <?= $u->role_id==2 ? '' : 'required="required"'?>' <?= $disable ? 'disabled="true"' : ''?>></div>
    <div class="col-2">Date of Birth</div>
    <div class="col-2"><input type='date' <?= $disable ? 'disabled="true"' : ''?> value="<?= $member->dob==null ? '' : h(date_format($member->dob,'Y-m-d')) ?>"   name='dob' <?= $u->role_id==2 ? '' : 'required="required"'?>'></div>
    
</div>
<div class="row mt-1">
<div class="col-3">SEX</div>
    <div class="col-3">
    <select <?= $u->role_id==2 ? '' : 'required="required"'?>' name='gender' id='gender' <?= $disable ? 'disabled="true"' : ''?>>
    <option disabled selected value> SELECT</option>

    <option value='M'>Male</option>
    <option value='F'>Female</option>
    <option value='X'>Transgender</option>
    <option value='N'>N/A</option>
    </select>
    </div>
    
    <div class="col-3">MARITAL STATUS</div>
    <div class="col-3">
    <select <?= $u->role_id==2 ? '' : 'required="required"'?>' name='marital_status' id='marital_status' <?= $disable ? 'disabled="true"' : ''?>>
    <option disabled selected value> SELECT</option>
    <option value='Married'>Married</option>
    <option value='Single'>Single</option>
    <option value='Divorced'>Divorced</option>
    <option value='Widowed'>Widowed</option>
    <option value='N/A'>N/A</option>
    </select>
    </div>
    
</div>
    <div class="row mt-1">
        <div class="col-3">Professional</div>
        <div class="col-3"><input type='text' class='w-100' value="<?= h($member->professional)?>"  name='professional' <?= $u->role_id==2 ? '' : 'required="required"'?>'></div>
        <div class="col-3">Email ID</div>
        <div class="col-3"><input type='email' class='w-100' value="<?= h($member->email)?>"  name='email' <?= $u->role_id==2 ? '' : ''?>'></div>
        
    </div>
    <div class="row mt-1">
        <div class="col-3">ADDRESS</div>
        <div class="col-5"><input type='text' class='w-100' value="<?= h($member->address->address)?>"  name='address' <?= $u->role_id==2 ? '' : 'required="required"'?>'></div>
        <div class="col-2">PINCODE</div>
        <div class="col-2"><input type='text' class='w-100' value="<?= h($member->address->pincode)?>"  name='pincode' maxlength='6' <?= $u->role_id==2 ? '' : 'required="required"'?>'></div>
        
    </div>
    <div class="row mt-1">
        <div class="col-3">State</div>
        <div class="col-3"><?=  $this->Form->control('state_id', ['div'=>false,'label'=>false,'options' => $states,'class'=>'w-100']); ?></div>
        <div class="col-2"><label>District</label></div>
        <div class="col-3"><?=  $this->Form->control('district_id', ['div'=>false,'label'=>false,'options' => $districts]); ?></div>
        
    </div>
    <?php if($u->role_id==2) { ?>
    <div class="row mt-1">
        <div class="col-3">Mobile</div>
        <div class="col-3"><input name='mobile' class='w-100' size='12' maxlength=10 value="<?= $member->mobile ?>" ></div>
        
    </div>
    <?php } ?>
    
 </div>
 <div class='border mt-2'>
 <div class="row">
 <div class="col-12">
    <h5> NOMINEE INFORMATION:-</h5>
    </div>
  </div>    
  <div class="row">
    <div class="col-2">NOMINEE NAME</div>
    <div class="col-3"><input type='text' class='w-100'  value='<?= h($member->nominee_name) ?>'  name='nominee_name' <?= $u->role_id==2 ? '' : 'required="required"'?>' <?= $disable ? 'disabled="true"' : ''?>></div>
    <div class="col-1">Age</div>
    <div class="col-1">
    <input type='number' class='w-100'  name='nominee_age' value='<?= h($member->nominee_age) ?>' <?= $u->role_id==2 ? '' : 'required="required"'?>' <?= $disable ? 'disabled="true"' : ''?>></div>
    <div class="col-1">Relation</div>
    <div class="col-2">
    <input type='text' <?= $u->role_id==2 ? '' : 'required="required"'?>' name='nominee_relation' id='nominee_relation' <?= $disable ? 'disabled="true"' : ''?> value="<?= h($member->nominee_relation)?>"/>
    </div>
    
 </div>   
 </div>

<?php
if(!empty($member->kycs[0])){
$kyc=$member->kycs[0];
?>
<div class="border mt-2">
        <div class="row">
                <div class="col-3">BANK NAME </div>
                <div class="col-3"><?= is_null( $kyc ) ? '' :  $kyc['bank'] ?></div>
                <div class="col-3">BRANCH </div>
                <div class="col-3"><?= is_null( $kyc ) ? '' :  $kyc['branch'] ?></div>
              
        </div>
        <div class="row">
                <div class="col-3">IFSC </div>
                <div class="col-3"><?= is_null( $kyc ) ? '' :  $kyc['ifsc'] ?></div>
                <div class="col-3">ACCOUNT NO.</div>
                <div class="col-3"><?= is_null( $kyc ) ? '' :  $kyc['accno'] ?></div>
              
        </div>
        <div class="row">
                <div class="col-3">PAN NO.</div>
                <div class="col-3"><?= is_null( $kyc ) ? '' :  $kyc['pan'] ?></div>
        </div>    
</div>
<?php } ?>

    </div>
    <?= $this->Form->button(__('Save')) ?>
            <?= $this->Form->end() ?>

</div>
<script>
    $(function() {
        $("#gender").val('<?= $member->gender?>');
        $("#marital_status").val('<?= $member->marital_status?>');
      //  $("#nominee_relation").val('');
        $("#state-id").val('<?= $member->address->state_id?>');
        $("#district-id").val('<?= $member->address->district_id ?>');
        
        $('#state-id').on('change', function() {

var id = $(this).val();

var targeturl = '/districts';
if(id == '0'){
  $('#district-id').html(`<option value="-1">Select District</option>`);
}else{
  
    $('#district-id').html(`<option value="-1">Select District</option>`); 	
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