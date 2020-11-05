<div class="col-10">
    <div class="card">
    <div class="card-header info">
   Edit : Product Master 
  </div>
  <div class="card-body">
  <?= $this->Form->create($item) ?>
            <fieldset>
                
                <?php
                    echo $this->Form->control('id',['type'=>'hidden']);
                    echo $this->Form->control('code',['label'=>'Item Code']);
                    echo $this->Form->control('name');
                    echo $this->Form->control('hsn',['label'=>'HSN Code']);
                    echo $this->Form->control('itemcat_id',['label'=>'CATEGORY','options'=>$itemcats]);
                    
                    echo $this->Form->control('purchaseprice',['label'=>'PURCHASE PRICE']);
                    echo $this->Form->control('saleprice',['label'=>'SALE PRICE']);
                    
                    echo $this->Form->control('points',['label'=>'Point (BV)']);
                    echo $this->Form->control('tax',['label'=>'GST Tax %']);
                    echo $this->Form->control('dp',['label'=>'DP']);
                    echo $this->Form->control('mrp',['label'=>'MRP']);
                    echo $this->Form->control('description');
                    echo $this->Form->control('active');
          
                ?>
            </fieldset>
            <?= $this->Form->button(__('Save')) ?>
            <?= $this->Form->end() ?>

  </div>
    </div>
    </div>