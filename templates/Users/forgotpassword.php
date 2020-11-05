<!--Main layout-->
<?php
$types=array('M'=>'Distributor','F'=>'Frenchie');
?>
<main>
    <div class="container">

        <!--Section: Main info-->
        <section class="mt-1 pt-1 wow">
            <div class="row">
                <div class="col-md-12 col-xl-10 col-sm-12 mb-4 mt-5">

                    <div class="card">
                        <div class="card-header info">
                           Forgot Password
                        </div>
                        <div class="card-body">
                        <?= $this->Form->create() ?>
                        <input name='name' id='name' type='hidden' />
                        <div class="col-md-6 col-sm-12">
                                <div class="md-form">
                                    <?= $this->Form->control('type', ['label' => false, 'class' => 'form-control','options'=>$types]); ?>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="md-form">
                                    <?= $this->Form->control('username', ['label' => 'Login ID', 'class' => 'form-control']); ?>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="md-form">
                                   <span id="lblusername"></span>
                                </div>
                            </div>
                            
                        <div class="col-md-6 col-sm-10">
                        
                        <?= $this->Form->button(__('Get OTP'),['id'=>'btnNext','disabled'=>true,'class' => 'form-control primary']) ?>
                        
                        </div>
                        
                        <?= $this->Form->end() ?>
                        <div>
            <!-- Forgot password -->
            <a href="/forgotusername">Forgot Login Id?</a>
        </div>
                    </div>
                </div>
                    
            </div>

        </section>
    </div>
</main>
<script>
$(function() {
    var lb= $("#lblusername");

$("#username").blur(function(){

    $("#btnNext").prop('disabled',true);
    lb.html('Please Wait...');
    if($("#username").val().length>=10){
        var url='';
        if($("#type").val()=='M'){
            url='/findmember/'+$("#username").val();
        }else{
            url='/findfrenchie/'+$("#username").val();
        }
            $.ajax(url, {
        type: 'GET',  // http method
        //data: { myData: 'This is my data.' },  // data to submit
        success: function (data, status, xhr) {
            if(data['result'][0]==null)
                lb.html("<span color='blue'>"+ "Not Match" +"</span>")

            else{
                lb.html("<span color='blue'>"+ data['result'][0]['name'] +"</span>")
                $("#name").val(data['result'][0]['name']);
                $("#btnNext").prop('disabled',false);
            }
        },
        error: function (jqXhr, textStatus, errorMessage) {
            lb.html("<span color='red'>"+ "Error" +"</span>")
        }
        });
    }
});
});
</script>