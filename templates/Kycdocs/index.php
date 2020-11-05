<?php
//    debug($kyc);
?>
<!--Main layout-->
<main>
    <div class="container">

        <!--Section: Main info-->
        <section class="mt-1 pt-1 wow">
            <div class="row">
                <div class="col-md-12 col-xl-10 col-sm-12 mb-1 mt-1">

                    <div class="card">
                        <div class="card-header info">
                            Document for KYC (Know Your Customer)
                        </div>
                        <div class="card-body">
                        <?php foreach ($kycdocs as $kycdoc): ?>
                           
                            <?= $this->Form->create($kycdoc,['url'=>'/kycdocs/savefile/'.$kycdoc->id,'type' => 'file','method'=>'post']) ?>
                            
                            <div class="row mt-4">
                            <div class="col-md-3 col-sm-12"><?=$kycdoc->display ?></div>
                            <?php if($kyc->member->kyc!='Y') { ?>
                            <div class="col-md-4 col-sm-12">
                                <?php echo $this->Form->input('file', ['type' => 'file', 'class' => 'form-control','required'=>true]); ?>
                            </div>
                            <?php } ?>
                            <div class="col-md-3 col-sm-12">
                            <img src="/kycdocs/sendFile/<?= $kycdoc->id  ?>"  height='100px' width='100px' alt='Nothing to Display' />
                            </div>
                             <div class="col-md-2 col-sm-12">
                                 <?php if($kyc->approveby==null && $kyc->approveon==null){ ?>
                                    <?= $this->Form->button(__('Upload'),['id'=>'btnSave','class' => 'form-control primary','disabled'=>false]) ?>
                                  <?php } ?>
                            </div>
                            </div>

                        <?= $this->Form->end() ?>
                        <?php endforeach; ?>

                        
                    </div>
                </div>

            </div>

        </section>
    </div>
</main>
