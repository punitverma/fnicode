<!--Main layout-->
<main>
    <div class="container">

      <!--Section: Main info-->
      <section class="mt-1 pt-1 wow">
      <div class="row">
  <div class="col-md-12 col-xl-10 col-sm-12 mb-1 mt-1">
    
    <div class="card">
    <div class="card-header info">
   Quick Distributor Registration 
  </div>
  <div class="card-body">
        <!-- Form -->
        <?= $this->Form->create() ?>

            <div class="form-row">
                <div class="col-md-4 col-sm-12">
                    <!-- First name -->
                    <div class="md-form" id="sponsor_id">
                        <?= $this->Form->control('sponsor',['class'=>'form-control','label'=>'Sponsor ID']); ?>
                        
                    </div>
                </div>
                
                <div class="col-md-4 col-sm-12">
                    <!-- First name -->
                    <div class="md-form">
                        <?= $this->Form->control('placement',['label'=>'','class'=>'form-control','options'=>$place]); ?>
                    </div>
                </div>
                
            </div>

            <div class="form-row">
                <div class="col-md-4 col-sm-12">
                    <!-- First name -->
                    <div class="md-form">
                        <?= $this->Form->control('name',['label'=>'Full Name','class'=>'form-control','style'=>"text-transform:uppercase"]); ?>
                    </div>
                </div>
                
                <div class="col-md-4 col-sm-12">
                    <!-- First name -->
                    <div class="md-form">
                        <?= $this->Form->control('membertype_id',['label'=>'','class'=>'form-control','options'=>$membertypes]); ?>
                    </div>
                </div>
                
            </div>

            <div class="form-row">
                <div class="col-md-4 col-sm-12">
                    <!-- First name -->
                    <div class="md-form">
                        <?= $this->Form->control('gender',['required'=>'true','empty'=>'Sex : Select','label'=>false,'class'=>'form-control','options'=>$genders]); ?>
                    </div>
                </div>
                
                <div class="col-md-4 col-sm-12">
                    <!-- First name -->
                    <div class="md-form">
                        <?= $this->Form->control('state_id',['label'=>false,'class'=>'form-control','options'=>$states]); ?>
                    </div>
                </div>
                
            </div>

            <div class="form-row">
                <div class="col-md-4 col-sm-12">
                    <!-- First name -->
                    <div class="md-form">
                        <?= $this->Form->control('mobile',['label'=>'Mobile No','class'=>'form-control','maxlength'=>'10']); ?>
                        <small id="materialRegisterFormPhoneHelpBlock" class="form-text text-muted mb-4">
                        Only 10 Digits (+91 XXXXXXXXXX)
                        </small>
                    </div>
                </div>
                
                <div class="col-md-4 col-sm-12">
                    <!-- First name -->
                    <div class="md-form">
                        <?= $this->Form->control('email',['type'=>'email','class'=>'form-control']); ?>
                        
                    </div>
                </div>
                
            </div>


            <!-- Newsletter -->
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="materialRegisterFormNewsletter">
                <label class="form-check-label" for="materialRegisterFormNewsletter">Yes I am 18 years and above</label>
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="materialRegisterFormNewsletter">
                <label class="form-check-label" for="materialRegisterFormNewsletter">By clicking & submitting the link I conrm that have read the Terms and Conditions  of
this Direct Seller Agreement above and agree to the terms and conditions which will be binding upon
me and also conrm that purchase of products of the company signies my agreement to the same
as well.</label>
            </div>
            


            <!-- Sign up button -->
            <button id="btn_reg" class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" disabled=true type="submit">Register Now</button>

                <a href="/term" target="">terms of service</a>

                <?= $this->Form->end() ?>
        <!-- Default form login -->
</div>
</div>
</div>

</div>

      </section>
    </div>
</main>  
<script>
$(function() {

$("#membertype-id").change(function(){
    var m=$("#membertype-id");
    if(m.val()==1){
        $("#gender").prop('disabled',false);
    }else{
        $("#gender").val('N');
        $("#gender").prop('disabled',true);
    }
});
    
var lb= $("#sponsor_id").find('label');
$("#sponsor").blur(function(){
    $("#btn_reg").prop('disabled',true);
    if($("#sponsor").val().length>=10){
            $.ajax('/findmember/'+$("#sponsor").val(), {
        type: 'GET',  // http method
        //data: { myData: 'This is my data.' },  // data to submit
        success: function (data, status, xhr) {
            if(data['result'][0]==null)
                lb.html("Sponser Id : "+"<span color='blue'>"+ "Not Match" +"</span>")
            else{
                lb.html("Sponser Id : "+"<span color='blue'>"+ data['result'][0]['name'] +"</span>")
                $("#btn_reg").prop('disabled',false);
            }
        },
        error: function (jqXhr, textStatus, errorMessage) {
            lb.html("Sponser Id : "+"<span color='red'>"+ "Error" +"</span>")
        }
        });
    }
});

});
</script>