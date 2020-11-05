<?php
?>
<!--Main layout-->
<main>
    <div class="container">

        <!--Section: Main info-->
        <section class="mt-1 pt-1 wow">
            <div class="row">
                <div class="col-md-12 col-xl-12 col-sm-12 mb-1 mt-1">

                    <div class="card">
                        <div class="card-header info">
                            My Direct : <?= $sponsor_id ?> 
            
                        </div>
                        <div class="card-body">
                        <div class="table-responsive">
        <table border='1' class="table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Placement</th>
                    <th>Status</th>
                    <th>Total Selft BV</th>
                    <th>Rank</th>
                    <th>Activated On</th>
                    <th>Kys Status</th>
                    
                    
                    
                </tr>
            </thead>
            <tbody>
            <?php foreach ($results as $rec): ?>
               
                <tr>
                    <td>
                    <a href="/members/mydirect/<?= h($rec['id']) ?>" > <?= h($rec['id']) ?> </a>
                    </td> 
                   <td><?= h($rec['name']) ?></td>
                   <td><?= h($rec['placement']=='L' ? 'Left' : 'Right') ?></td>
                   <td><?= h($rec['active']=='Y' ? 'Active' : 'Not Active') ?></td>
                   <td><?= $rec['self_total_points']==null ? '0.00' : $rec['self_total_points'] ?></td>
                   <td><?= $rec['self_total_points']==null ? '0.00' : ( $rec['self_total_points']+ $rec['total_points'])/1000 ?></td>
                   
                   <td><?= $rec['dt_activate']==null ? '-' : $rec['dt_activate'] ?></td>
                   <td><?= h($rec['kyc']) ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
                           
                        </div>
                    </div>
                </div>

            </div>

        </section>
    </div>
</main>
<script>
    $(function() {

        

        $(".tree a").click(function() {
            
           if(this.text !='N/A'){
            var v= (this.text).split(":");
            document.location="/members/genealogy/"+$.trim(v[0]);
           } 
           
        });
        $(".breadcrumb-item a").click(function() {
           if(this.text !='N/A'){
            var v= (this.text).split(":");
            document.location="/members/genealogy/"+$.trim(v[0]);
           } 
           
        });


    });
</script>