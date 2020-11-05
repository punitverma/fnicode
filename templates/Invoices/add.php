  <?php
  //debug($invoice);
 
  $v = array('P' => 'Purchase', 'S' => 'Sale', 'O' => 'Order','I'=>'Invoice');
  ?>

  <div class="card">
    <div class="card-header info">
      <?= $v[$invoice->type] ?>
    </div>
    <div class="card-body">
      <?= $this->Form->create($invoice, ['id' => 'mainfrm']) ?>

      <div class="row">
        <div class="col-6">
          <div class="col-12 input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroup-sizing-default">Invoice#</span>
            </div>
            <?php if($type=='P'){ ?>
              <?= $this->Form->control('receipt',['label'=>false,'class'=>'form-control' ,'aria-label'=>'Sizing example input' ,'aria-describedby'=>'inputGroup-sizing-default']) ?>
            <?php } else {?> 
            
            
            <label class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"> <?= $invoice->receipt ?> </label>
            <?php } ?>
          </div>
          <div class="col-12 input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroup-sizing-default">Date</span>
            </div>
            <?php if ($invoice->type=='P' ){?>
            <input type="date" name="date" id="date" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required >
             <?php } else {?>
              <label class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" >
              <?= $invoice->date==null ? "N/A" : $invoice->date->i18nFormat('dd-MMM-yyyy')  ?> 
              </label>
               
              <?php } ?>  
  
          </div>
          <div class="col-12 input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroup-sizing-default">State</span>
            </div>
            <label class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
              <?= $invoice->fromstate . " : " . $states[$invoice->fromstate] ?>
            </label>

          </div>
          <?php if($invoice->type=='S' || $invoice->type=='P' || $invoice->type=='I') { ?>
          <div class="col-12 input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroup-sizing-default">Reference No#</span>
            </div>
            <?php if($invoice->type=='I') {?>
              <label  class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" > 
                <?= $invoice->ref?>
              </label>
            <?php } else { ?>
              <input type='text' name='ref' class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" /> 
            <?php } ?>
          </div>
          <?php } ?>

          <div class="col-8 col-sm-8 input-group mb-3 <?php $type=='P' ? 'invisible' :'' ?>">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroup-sizing-default">Total BV</span>
            </div>
            <input type="text" readonly="readonly" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" id="bv" name="bv">

            </label>

          </div>
          <div class="row">
          <div class="col-12 col-sm-12 input-group d-none" id="offer_div" >
           <select id="select_offer" name="offer_id"  class="col-8" >
            <option>--SELECT OFFER--</option> 
            <?php
            if(  $invoice->has('offer')){
              echo '<option value='. $invoice->offer->id.' selected >'. $invoice->offer->name.'</option>';
            } 
            ?>
            </select>
           <button id='btn_offer' type='button'  class="btn  btn-success btn-sm" <?= $invoice->trtype=='D' ? '' :'disabled' ?>>
           <snap class="h6">GET OFFERS</span>
          </button>
          
          </div>
          </div>  
        </div>

        <div class="col-6">
          <?php if ($invoice->type == 'P' || $invoice->type == 'S') { ?>
            <div class="col-12 input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-default"><?=$invoice->type == 'S' ? 'Bill To' :  'Billed From' ?></span>
              </div>
              <?= $this->Form->control('toid', ['options' => $tolist, "empty" => "select", 'label' => false, 'class' => 'form-control', 'aria-label' => 'Sizing example input', 'aria-describedby' => 'inputGroup-sizing-default']) ?>
              <input type="hidden" name="toname" id="toname" />
              <input type="hidden" name="tostate" id="tostate" value="<?=$invoice->tostate ?>"/>
              <?php //echo $this->Form->hidden('id');  
              ?>
             
            </div>
            <div class="col-4 col-sm-4 hide" id="load">
            <img src="/img/load.gif" width='50px' height='50px' />
            </div>
            <div class="col-8 col-sm-8 hide"  id="addl">
            
            <span class="badge badge-pill badge-success" id='dis'></span>
            <span class="badge badge-pill badge-info" id='spo'></span>

            </div>
            <div class="col-8 col-sm-8  input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-default">State</span>
              </div>
              <label class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" id="txt_tostate">
              <?=  $invoice->tostate==0 ? '' : $invoice->tostate.':'. $states[$invoice->tostate] ?>
              </label>



            </div>
          <?php } ?>
          <?php if ($invoice->type == 'I') { ?>
            <div class="col-12 input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-default">Billed From</span>
              </div>
              
              <label class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" id="txt_tostate">
                <?= $invoice->toid ." : ".$invoice->toname ?>
              </label>

            </div>

            <div class="col-8 col-sm-8  input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-default">State</span>
              </div>
              <label class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" id="txt_tostate">
              <?= $invoice->tostate . " : " . $invoice->tostate==0 ? '' : $states[$invoice->tostate] ?>
              </label>

            </div>
          <?php } ?>
          <div class="col-8 col-sm-8 input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroup-sizing-default">Total Amount</span>
            </div>
            <input type="text" readonly="readonly" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" id="amount" name="amount">

            </label>

          </div>
          <?php if($type!='O'){?>
           
          <div class="col-12 col-sm-12 input-group mb-1">
            <div class="input-group-prepend">
            
            <?= $this->Form->control('payment_mode',['empty'=>'-Payment-','options'=>$paymentmodes,'label'=>false,'class'=>'form-control' ,'aria-label'=>'Sizing example input' ,'aria-describedby'=>'inputGroup-sizing-default']) ?>
            </div>
            <?= $this->Form->control('payment_reference',['placeholder'=>'Payment Reference No','label'=>false,'class'=>'form-control' ,'aria-label'=>'Sizing example input' ,'aria-describedby'=>'inputGroup-sizing-default']) ?>
          
            </label>

          </div>
          <?php } ?> 
          
          <div class="col-2 col-sm-12  input-group mb-2">
          
         
          <button id='btn_save' type="submit" class="m-1 col-10" <?= $invoice->trtype=='D' ? '' :'disabled' ?>>
          <span class="fas fa-2x fa-save">Save</span>
          </button>
        
          </div> 

          </div>

      </div>
      
      
      

      <?= $this->Form->end() ?>
      <div class="row">
        <div class="col-12">
          <table class="table small border table-striped table-responsive" width="100%" id="details">
            <thead>
              <tr>
               <th>Item Name</th>
     
                <th>CATEGORY</th>
                <th>Price</th>
                <th>Discount</th>
                <th>Qty___/AVL. QTY</th>
                <?php if($type=='P'){?>
                <th> Batch No.</th>
                <th> Manf. Date</th>
                <th> Exp. Date</th>  
                <?php } ?>
          
                <th>SGST %</th>
                <th>SGST AMT</th>
                <th>CGST %</th>
                <th>CGST AMT</th>
                <th>IGST %</th>
                <th>IGST AMT</th>
                <th>Amount</th>
                
                <th>Action</th>
              </tr>
            </thead>

            <tbody>
              <?= $this->Form->create($invoicedetail, ['id' => 'frm']) ?>
              <tr>
                <td><?= $this->Form->control('item_id', ['options' => $items, "empty" => "select", 'label' => false, 'class' => 'form-control']) ?></td>
                <td id='cat'></td>
                <td id='price'></td>
                <td id='discount'></td>

                <td colspan="1"><?= $this->Form->control('qty', ['label' => false, 'size'=>'6' ,'maxlength'=>'6' ,'min'=>'1','max'=>'0', 'class' => 'form-control']) ?>
                <input type='hidden' id='max_qty' />
                
                </td>
                <?php if($type=='P'){?>
                  <td colspan="1"><?= $this->Form->control('batch_no', ['label' => false,'required'=>true, 'size'=>'6' ,'maxlength'=>'12' , 'class' => 'form-control', 'aria-label' => 'Sizing example input', 'aria-describedby' => 'inputGroup-sizing-default']) ?></td>
                  <td colspan="1"><?= $this->Form->control('dt_manf', ['label' => false,'required'=>true, 'size'=>'6' ,'maxlength'=>'6' , 'class' => 'form-control', 'aria-label' => 'Sizing example input', 'aria-describedby' => 'inputGroup-sizing-default']) ?></td>
                  <td colspan="1"><?= $this->Form->control('dt_exp', ['label' => false,'required'=>true, 'size'=>'6' ,'maxlength'=>'6' , 'class' => 'form-control', 'aria-label' => 'Sizing example input', 'aria-describedby' => 'inputGroup-sizing-default']) ?></td>
                  
                <?php } ?>
                <td id='sgst_p'> /<spna class="small <?= $type=='P' ? 'hidden' :''?>" id='in_stock'></span> </td>
                <td id='sgst_a'></td>
                <td id='cgst_p'></td>
                <td id='cgst_a'></td>
                <td id='igst_p'></td>
                <td id='igst_a'></td>
             
                <td id='iamount'></td>
                

                <td>
                  <button type="submit" class="" id="btn_add">
                    <span class="fas fa-2x fa-plus-circle"></span>
                  </button>
                </td>

              </tr>
            
              <input type="hidden" name="invoice_id" id="invoice-id" value="<?= $invoice_id ?>" />
              <?= $this->Form->end() ?>
              <?php
              $amount = 0;
              $bv=0;
              if (!empty($invoice->invoicedetails))
                foreach ($invoice->invoicedetails as $rec) {
                  $amount += $rec->amount;
                  $bv+= $rec->points;

              ?>

                <tr <?= $rec->offer=='Y' ? 'id="offer_tr"' :'' ?>>
                  <td><?= $rec->itemname ?></td>
                  <td><?= $rec->itemcat ?></td>
                  <td><?= $rec->price ?></td>

                  <td><?= $rec->discount ?>%</td>
                  <td><?= $rec->qty ?></td>
                  <?php if($type=='P'){?>
                    <td><?= $rec->batch_no ?></td>
                    <td><?= $rec->dt_manf->format('d-m-Y') ?></td>
                    <td><?= $rec->dt_exp->format('d-m-Y') ?></td>
                    
                  <?php } ?>
                  <td><?= $rec->sgst_p ?>%</td>
                  <td><?= $rec->sgst_a ?></td>
                  <td><?= $rec->cgst_p ?>%</td>
                  <td><?= $rec->cgst_a ?></td>
                  <td><?= $rec->igst_p ?>%</td>
                  <td><?= $rec->igst_a ?></td>
                  <td><?= $rec->amount ?></td>
                  <td>
                  <?php if($rec->offer!='Y'){ ?>
                  <button type="button" class="btn_del" id="btn_del" onClick="del(this,<?= $rec->id ?>)"> <span class="fas fa-2x fa-minus-circle"></span></button>
                  <?php } ?>
                  </td>
                </tr>
              <?php } ?>

            </tbody>

          </table>
        </div>

      </div>

    </div>
  </div>
  <script>

    var amount = <?= $amount ?>;
    var bv= <?= $bv ?>;                
    function apply_offer(){
        $('#btn_offer').text('REMOVE OFFER');
        $('#select_offer').prop('disabled',true);
        $('.btn_del').prop('disabled',true);
        $('#btn_add').prop('disabled',true);
        
      }
      function remove_offer(){
        $('#btn_offer').text('GET OFFERS');

        $('#select_offer').prop('disabled',false);
        $('#select_offer').html(`<option value="-1">-Select Offer-</option>`); 

        $('.btn_del').prop('disabled',false);
        $('#btn_add').prop('disabled',false);
   
      }

    function del(f, id) {
      var row = $(f).closest("TR");
      del_table_row(row,id)
    }

    function del_table_row(row,id){
      var name = $("TD", row).eq(0).html();
      var targeturl = '/invoicedetails/delete/' + id + "/<?= $invoice_id ?>";
      var msg="Do you want to delete: " + name;
      if(id==0){
        msg="Do you want to Remove the Offer";
      }
      if (confirm(msg)) {
        $.ajax({
          type: 'get',
          url: targeturl,
          dataType: 'json',
          data: $(this).serializeArray(),
          success: function(result) {
            if (result.result == 'ok') {

              amount -= result.amount;
              bv -= result.points;

              if(amount<=0)
              {
                $("#toid").prop("disabled",false);
                $("#btn_save").prop('disabled',true);
                amount=0;
                bv=0;
              }
              $("#amount").val(amount);
              $("#bv").val(bv);
              //Get the reference of the Table.
              var table = $("#details")[0];

              //Delete the Table row using it's Index.
              table.deleteRow(row[0].rowIndex);

              if(id==0){
                message('success','Offer Removed Successfully');
                remove_offer();

              }else
              message('success','Item deleted Successfully');


            }
          }

        });
      }

    }

    $(function() {

      
           
      $('#apply_offer').click(function(){
      /*if($("#select_offer").length){
          var offer=$("#select_offer").val();
          if(offer!=-1){

            var targeturl = '/invoicedetails/add/'+offer+"/<?= $invoice->id ?>";
          $.ajax({
          type: 'post',
          url: targeturl,
          dataType: 'json',
          data: $("#frm").serializeArray(),
          success: function(result) {
            if
          }});

          }


        }*/
      //  $("#frm").trigger('submit');
        });

        
      $('#btn_offer').click(function(){
        var txt=$('#btn_offer').text();
        txt=$.trim(txt) ;
        if(txt=='GET OFFERS'){
        var targeturl='/offers/find/<?= $invoice->id?>';
        $('#select_offer').html(`<option value="-1">-Select Offer-</option>`); 

        $.ajax({
          type: 'get',
          url: targeturl,
          dataType: 'json',
          //data: $(this).serializeArray(),
          success: function(result) {
            
            $.each(result.result, function (key, data) {
                $('#select_offer').append('<option value="'+ data.id +'" '+ (data.active ? '' :'disabled') +'>'+ data.name+'</option>');
              if(data.active)
              $('#btn_offer').text('APPLY OFFER');
              });
            
          }
        });

        }
        else
        if(txt=='APPLY OFFER')
        {
          $("#frm").trigger('submit');
          
        }
        else
        if(txt=='REMOVE OFFER')
        {
          del_table_row($("#offer_tr"),0);
        }
      });

    

      var pref=$("#payment-reference");
      $('#payment-mode').on('change', function() {
        var id = $(this).val();
        if(id=='Cash')
          { 
             pref.val('N/A');
             pref.prop('readonly',true);
          }
        else
          {  
            
            pref.val('');
            pref.prop('readonly',false);
           }

    }); 

//      $("#addl").hide();

      $("#amount").val(amount);
      $("#bv").val(bv);
      if(amount>0){
      $("#toid").prop("disabled",true); 
      $("#btn_save").prop('disabled',false);
      }
      else{
        $("#btn_save").prop('disabled',true);
      }
      $('#toid').bind('change blur', function(e) {
      
        $('#toid').val($(this).val().toUpperCase());

        $("#addl").hide();
        $("#txt_tostate").html('0:State');
        $("#tostate").val(0);
        $("#load").show();
   
        
        var id = $(this).val();
        
        if("<?= $type ?>"=="S" && e.type=='change')
            return;
        if("<?= $type ?>"!="P" && !id.startsWith('FNI'))
          return;
       // alert(id);
        
    
       $("#offer_div").addClass('d-none');
         
        var targeturl = '/getstate';
      
        
        $.ajax({
          type: 'get',
          url: targeturl + "/" + id + "/<?= $type ?>/<?= $invoice->id ?>/<?= $invoice->fromid ?>",
          dataType: 'json',
          error : function (result){
            $("#addl").hide();
            $("#load").hide();
          },
          success: function(result) {
           
            if(result.result==null){
              $("#addl").hide();
            $("#load").hide();
            }
            else
           if(result.status=='ok'){
            $("#load").hide();
            var v = result.result.state;
            var addl=result.addl;
            $("#txt_tostate").html(v['id'] + ":" + v['name']);
            $("#tostate").val(v['id']);
            
          if("<?= $type ?>"=="S"){
            if(id.indexOf('FNIF')==0){
            
            $("#dis").html('Frenchie Name :'+ result.result['name']);
            $("#spo").html("Address : " + result.result['address'] );
            $("#addl").show();
           
            $("#toname").val(result.result['name']);
   
            
            }
            else
            if(id.indexOf('FNI')==0){
            $("#dis").html( 'Distributor Name :'+ addl['name']);
            $("#spo").html("Sponsor : " + addl['sponsor_id']+':'+ addl['sponsor_name'] );
            $("#addl").show();
            $("#load").hide();
            $("#toname").val(addl['name']);
            
            $("#offer_div").removeClass('d-none');
           
          }

            }else{
              var item = $("#toid option:selected");
              $("#toname").val(item.text());
        
            }
           }else{
            $("#addl").hide();
            $("#txt_tostate").html('0:State');
            $("#tostate").val(0);
           
           }


          }
        });

      });
      
      <?php if($invoice->toid <> '') {?>
        $('#toid').trigger("blur");
      <?php } ?>
      $("#item-id").on('change', function() {

        
        var item = $("#item-id option:selected");
        var price = $("#price");
       // price.prop('readonly', false);
        $("#itemname").val(item.text());
        var targeturl = "items/get/" + item.val();
        $.ajax({
          type: 'get',
          url: targeturl,
          dataType: 'json',
          //data: $(this).serializeArray(),
          success: function(result) {
            if (result.result == 'ok') {
                           
              $("#price").html(result.item['<?= $type=='P' ? "purchaseprice": "saleprice" ?>']);
              $("#cat").html(result.item['itemcat']["name"]);
              <?php if($type=='S' || $type=='I') { ?>
              $("#qty").prop('max',result.item['qty']);
              <?php } else {?>
                $("#qty").prop('max',null);
              <?php } ?>
              $("#in_stock").html(result.item['qty']);
              

            }
          }
        });




      });

      $("#mainfrm").submit(function(event) {
        //console.log($(this).serializeArray());
        $("#btn_save").prop('disabled',true);

        event.preventDefault();
            
        var targeturl = '/invoices/save/<?= $invoice_id ?>';
        $.ajax({
          type: 'post',
          url: targeturl,
          dataType: 'json',
          data: $(this).serializeArray(),
          success: function(result) {
            if (result.result == 'ok') {
              $("#btn_save").prop('disabled',true);
              message('success','<?= $v[$invoice->type] ?> have been saved Successfully');
              window.location.replace("<?= $this->Url->build([
    "controller" => "invoices",
    "action" => "view",
    $invoice->id,
]); ?>");

            }else
            {
              message('error','<?= $v[$invoice->type] ?> could not be saved ');
              $("#btn_save").prop('disabled',false);

            }


          }
        });

      });


      $("#frm").submit(function(event) {
        event.preventDefault();
        if($("#tostate").val()==0)
        {
          message('warning','PLease Select/Choose Biller');
          return;

        }
        //console.log($(this).serializeArray());
        var offer=$('#select_offer').val();
        if(offer=='--SELECT OFFER--')
          offer=-1;
          
        var targeturl = '/invoicedetails/add'+(offer!=-1 ? '/'+offer :'');
        $.ajax({
          type: 'post',
          url: targeturl,
          dataType: 'json',
          data: $(this).serializeArray(),
          success: function(result) {

            if (result.result == '-Select-') {
              message('warning','PLease Select/Choose Biller');

            }
            else
            if (result.result == 'ok') {
             $("#item-id").val(0);
             $("#cat").html('');
             $("#price").html('');
             $("#qty").val(0);

             $("#qty").val(0);

              AddRow(result['data']);
              amount += result['data']['amount'];
              bv += result['data']['points'];
              
              
              if(amount>0){
                $("#toid").prop("disabled",true);
                $("#btn_save").prop('disabled',false);
              }
              $("#amount").val(amount);
              $("#bv").val(bv);
              
              message('success','Item added Successfully');

            }


          }
        });

      });
      function addData(row,val,post){
      cell = $(row.insertCell(-1));
      cell.html( (! val ? 0 : val) + post );

      }
 
      function AddRow(data) {

      
        //Get the reference of the Table's TBODY element.
        var tBody = $("#details > TBODY")[0];

        

        //Add Row.
        row = tBody.insertRow(-1);
        if(data.offer=='Y'){
          row.id='offer_tr';
        
          $('#offer_tr').css({'border': '1px solid green', 'border-left': 'none', 'border-right': 'none'});
        

        }
        addData(row,data.itemname,'');
        addData(row,data.itemcat,'');
        addData(row,data.price,'');
        addData(row,data.discount,'%');
        addData(row,data.qty,'');
        <?php if($type=='P') {?>
          addData(row,data.batch_no,'');
          addData(row,data.dt_manf,'');
          addData(row,data.dt_exp,'');

        <?php }?>
        
        addData(row,data.sgst_p,'%');
        addData(row,data.sgst_a,'');

        addData(row,data.cgst_p,'%');
        addData(row,data.cgst_a,'');
        
        addData(row,data.igst_p,'%');
        addData(row,data.igst_a,'');
        
        addData(row,data.amount,'');

        

        //Add Button cell.
        cell = $(row.insertCell(-1));

        var btnRemove = '<button type="button" class="btn_del" id="btn_del" onClick="del(this,' + data.id + ')"> <span class="fas fa-2x fa-minus-circle"></span></button>';
        //btnRemove+='<input type="hidden" name="item_id" value="'+ item_id +'" />';
        //btnRemove+='<input type="hidden" name="item_name" value="'+ item_name +'" />';
        //btnRemove+='<input type="hidden" name="price" value="'+ price +'" />';
        //btnRemove+='<input type="hidden" name="qty" value="'+ qty +'" />';
        if(data.offer!='Y')
          cell.append(btnRemove);
        else
        apply_offer();
      }

      <?php if(  $invoice->has('offer')) { ?>
      apply_offer();
      <?php } ?>
   
      
    });

  </script>