<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Member[]|\Cake\Collection\CollectionInterface $members
 */
$status=['Y'=>'Active','N'=>'Not Active'];
$pl=['C'=>'N/A','R'=>'Right','L'=>'Left'];
$toggle=['Y'=>'N','N'=>'Y'];
?>
<div class="members index content">
    <div class="row">
    <div class="col-6">  <h3><?= __('Distributor List') ?></h3></div>   
    
    <div class="col-6 input-group-prepend">
    <span class="form-control" id="basic-addon1">FNI</span>
  
  <input type="text" id="txt_find" class="form-control" value="<?= h($txt)?>" placeholder="XXXXXXXX" maxlength="8">
 
  <a href="#" class="btn btn-dark" id="btn_find"><i class="fa fa-search"></i></a></form>
  </div>
</div>
    <div class="table-responsive">
        <table class="table-striped border small">

            <thead>
                <tr>
                <th class="actions"><?= __('Actions') ?></th>
        
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('membertype_id') ?></th>
                    <th><?= $this->Paginator->sort('sponsor') ?></th>
                    <th><?= $this->Paginator->sort('parent') ?></th>
                    <th><?= $this->Paginator->sort('placement') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('gender') ?></th>
                    <th><?= $this->Paginator->sort('Address') ?></th>
                    <th><?= $this->Paginator->sort('mobile') ?></th>
                    <th><?= $this->Paginator->sort('email') ?></th>
                    <th><?= $this->Paginator->sort('address_id') ?></th>
                    <th><?= $this->Paginator->sort('kyc') ?></th>
                    <th><?= $this->Paginator->sort('block') ?></th>

                    <th><?= $this->Paginator->sort('active') ?></th>
                    <th><?= $this->Paginator->sort('date_of_activate') ?></th>

                    <th><?= $this->Paginator->sort('leftid') ?></th>
                    <th><?= $this->Paginator->sort('L :Activate') ?></th>
                    <th><?= $this->Paginator->sort('rightid') ?></th>
                    <th><?= $this->Paginator->sort('R :Activate') ?></th>

                    <th><?= $this->Paginator->sort('self_week_points',['label'=>'Weekly BV']) ?></th>
                    <th><?= $this->Paginator->sort('self_total_points',['label'=>'Total BV']) ?></th>
                   <!-- <th><?= $this->Paginator->sort('week_points') ?></th>
                    <th><?= $this->Paginator->sort('total_points') ?></th>-->
                    <th><?= $this->Paginator->sort('Registered On') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($members as $member): ?>
                <tr>
                <td class="actions">
                        <div class="btn-group">
                            <button class="btn btn-secondary btn-sm dropdown-toggle" type="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Action
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="/members/genealogy/<?= h($member->id) ?>"><i class="fa fa-sitemap" aria-hidden="true"></i>Genealogy</a>
                                <a class="dropdown-item"  href="/kycs/index/<?= h($member->id) ?>"><i class="fas fa fa-id-badge" aria-hidden="true"></i>Edit Kyc</a>

                                <a class="dropdown-item"  href="/members/edit/<?= h($member->id) ?>"><i class="fa fa-user" aria-hidden="true"></i>Edit Profile</a>
                                <a class="dropdown-item" href="/members/sendpassword/<?= h($member->id) ?>"><i class="fa fa-key" aria-hidden="true"></i>Send New Password</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="/members/block/<?= h($member->id).'/'. $toggle[$member->block] ?>"><i class="fa fa-<?=$member->block=='Y' ? 'un' : '' ?>lock" aria-hidden="true"></i><?=$member->block=='Y' ? 'UnBlock' : 'Block' ?></a>
                                <?php if($member->active!='Y') {?>
                                <a class="dropdown-item" href="/members/active/<?= h($member->id) ?>"><i class="fa fa-star" aria-hidden="true"></i>Activate</a>
                                <?php }?>
                            </div>
                        </div>
                    </td>
        
                    <td><?= l($member->id) ?></td>
                    <td><?= $member->membertype->name  ?></td>
                    <td><?= l($member->sponsor) ?></td>

                    <td><?= l($member->parent) ?></td>
                    <td><?= h($pl[ $member->placement]) ?></td>
                    <td><?= h($member->name) ?></td>
                    <td><?= h($member->gender) ?></td>
                    <td><?= h($member->adddetails) ?></td>
                    <td><?= h($member->mobile) ?></td>
                    <td><?= h($member->email) ?></td>
                    <td><?= $member->address->address ?></td>

                    <td NOWRAP><?= $member->kyc=='Y' ? '<i class="fa fa-check-square btn btn-success" aria-hidden="true"></i>
' :'<i class="fa fa-window-close btn btn-danger" aria-hidden="true"></i>
' ?></td>
                    <td NOWRAP><?= $member->block=='Y' ? "<span class='btn btn-danger'>Block</span>" : "" ?></td>

                    <td NOWRAP> <span class='btn btn-<?= $member->active=='Y' ? 'success' :'warning'  ?>'>
                            <?= $status[ $member->active ] ?> </span> </td>
                    <td><?= h($member->dt_activate) ?></td>

                    <td><?= l($member->leftid) ?></td>
                    <td NOWRAP> <span class='btn btn-<?= $member->left_activate=='Y' ? 'success' :'warning'  ?>'>
                            <?= $status[ $member->left_activate ] ?> </span> </td>

                    <td><?= l($member->rightid) ?></td>

                    <td NOWRAP> <span class='btn btn-<?= $member->right_activate=='Y' ? 'success' :'warning'  ?>'>
                            <?= $status[ $member->right_activate ] ?> </span> </td>



                    <td><?= $this->Number->format($member->self_week_points) ?></td>
                    <td><?= $this->Number->format($member->self_total_points) ?></td>
                    <!--<td><?= $this->Number->format($member->week_points) ?></td>
                    <td><?= $this->Number->format($member->total_points) ?></td>-->
                    <td><?= h($member->cr_tm) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?>
        </p>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="profile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary small" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary small">Save changes</button>
      </div>
    </div>
  </div>
</div>
<?php
function l($id){
    return $id==null || $id=='NA' ? "--" : "<a href='/members/view/". $id."'>".$id."</a>" ;
}
?>
<script>
 $(function() {

$("#btn_find").click(function(){
    var url="/members/index/"+$.trim($("#txt_find").val());
    
    //alert(url);
 document.location=url;
 //alert(document.location);
}); 
 });

</script>