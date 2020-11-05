<!--Main layout-->
<main>
    <div class="container">

      <!--Section: Main info-->
      <section class="mt-5 pt-5 wow">
      <div class="row">
  <div class="col-md-12 col-xl-10 col-sm-12 mb-4 mt-5">
    
    <div class="card">
    <div class="card-header info">
    Distributor  Registration 
  </div>
  <div class="card-body">
    Thanks Mr/Mrs <?= $name ?> ,Your's Distributor  Registration done successfully , with user id <?=$username?> and password : <?= $password ?> will be send in sms on registered mobile number (<?=$mobile?>).

</div>
</div>
</div>

</div>

      </section>
    </div>
</main>  
<script>
$(function() {


var lb= $("#sponsor_id").find('label');
$("#sponsor").blur(function(){
    if($("#sponsor").val().length>=10){
            $.ajax('/findmember/'+$("#sponsor").val(), {
        type: 'GET',  // http method
        //data: { myData: 'This is my data.' },  // data to submit
        success: function (data, status, xhr) {
            if(data['result'][0]==null)
                lb.html("Sponser Id : "+"<span color='blue'>"+ "Not Match" +"</span>")
            else
                lb.html("Sponser Id : "+"<span color='blue'>"+ data['result'][0]['name'] +"</span>")
        },
        error: function (jqXhr, textStatus, errorMessage) {
            lb.html("Sponser Id : "+"<span color='red'>"+ "Error" +"</span>")
        }
        });
    }
});

});
</script>