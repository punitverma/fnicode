<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Kyc $kyc
 */
?>
<div class="row">
    <div class="column-responsive col-6">

        <div class="kycs view content">
            <h3><?= h($kyc->member->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Distributor Name') ?></th>
                    <td><?= $kyc->member->name ?></td>
                </tr>
                <tr>
                    <th><?= __('Pan') ?></th>
                    <td><?= h($kyc->pan) ?></td>
                </tr>
                <tr>
                    <th><?= __('Ifsc') ?></th>
                    <td><?= h($kyc->ifsc) ?></td>
                </tr>
                <th><?= __('Bank') ?></th>
                    <td><?= h($kyc->bank.'  , '.$kyc->branch) ?></td>
                
                <tr>
                </tr>
                <tr>
                    <th><?= __('Accno') ?></th>
                    <td><?= h($kyc->accno) ?></td>
                </tr>
              

              </table>
              </div>
              </div>
              <div class="col-6">
              
                        <?php foreach ($kyc->kycdocs as $kycdoc): ?>
                            <div class="row mt-2">              
                        
                            <div class="col-6"><?=$kycdoc->display ?></div>
                            <div class="col-6">
                            <a href="/kycdocs/sendFile/<?= $kycdoc->id  ?>/<?=$kyc->member_id ?>" target="_blank">
                            <img src="/kycdocs/sendFile/<?= $kycdoc->id  ?>/<?=$kyc->member_id ?>"  height='100px' width='100px' alt='Nothing to Display' />
                            </a>
                            </div>
                            </div>               

                        <?php endforeach; ?>
                           
              </div>

              </div>
              <div class="row">
    <div class="col-12">
    <textarea name="remarks" id="remarks" cols="50"></textarea>
    <br/>
    <a href="/kycs/action/Y/<?= h($kyc->member->id) ?>" class="btn btn-success m-2"> Approve </a>
    <a href="/kycs/action/R/<?= h($kyc->member->id) ?>" class="btn btn-danger m-2"> Reject </a>
    </div>
</div>
            </div>

</div>
</div>
<script>
$("a").on("click", function (e) {
   e.preventDefault(); // --> if this handle didn't run first, this wouldn't work
  // alert();
   window.location.href = $(this).prop('href')+"/"+$("#remarks").val();

});

</script>