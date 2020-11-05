<?php
function img($member){
    $ret=null;
    if($member==null || empty($member) ){
        $ret="empty";
    }
    else
    if($member->active=='Y')
    {
        $ret="active";
    }
    else
    {
       $ret="deactive"; 
    }
    return $ret;
}
function getDetails($m){
    
    return '<img src="/img/fni_'.img($m).'.png"/><br/> '. (empty($m) ? 'N/A' : $m['id'].' <br/> '. $m['name'] ."<br/>Self BV :".$m['self_week_points']." / ".$m['self_total_points']."<br/>LEFT :". (is_null($m['left']) ? '0 / 0' : ($m['left']['self_week_points']+$m['left']['week_points']) .' / '. ($m['left']['self_total_points']+$m['left']['total_points'])  ). '</br> RIGHT : ' .(is_null($m['right']) ? '0 / 0' : ($m['right']['self_week_points']+$m['right']['week_points']) .' / '. ($m['right']['self_total_points']+$m['right']['total_points'])  ) );
}
function generate_genealogy($ms)
{
    $out = "<ul>";
    $out .= "<li>";
    $out .= '<a href="#">'.getDetails($ms). '</a>';
    $out .= "<ul>";
    $out .= "<li>";

    if($ms['leftid']!=null)
        {
            $out .= "<ul>";
            $out .= "<li>";
            $out .= '<a href="#">'. getDetails($ms['left']) . '</a>';
            $out .= "<ul>";
            $out .= "<li>";
            $out .= '<a href="#">'.getDetails($ms['left']['left']) .'</a>';
            $out .= "</li>";
            $out .= "<li>";
            $out .= '<a href="#">'.getDetails($ms['left']['right'] ) .'</a>';
            $out .= "</li>";
            $out .= "</ul>";

        }
    else
        $out .= '<a href="#"> <img src="/img/fni_'.img($ms['left']).'.png"/><br/>' . ( $ms['leftid']==null ? "N/A" : $ms['leftid']) . '</a>';

    $out .= "</li>";
    
    $out .= "<li>";
    
    if($ms['rightid']!=null)
        {
//            $out .= "<ul>";
 //           $out .= "<li>";
            $out .= '<a href="#">'.getDetails($ms['right']) . '</a>';
            $out .= "<ul>";
            $out .= "<li>";
            $out .= '<a href="#">'.getDetails($ms['right']['left']) . '</a>';
            $out .= "</li>";
            $out .= "<li>";
            $out .= '<a href="#">'.getDetails($ms['right']['right']  ) . '</a>';
   //         $out .= "</li>";
    //        $out .= "</ul>";

        }
    else
    $out .= '<a href="#"> <img src="/img/fni_'.img($ms['right']).'.png"/><br/>' . ($ms['rightid']==null ? "N/A" : $ms['rightid']) . '</a>';

    $out .= "</li>";
    $out .= "</ul>";

    $out .= "</li>";
    $out .= "</ul>";


    return $out;
}
//debug($members);
//debug(generate_genealogy($members) );
//die();
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
                            Genealogy 
                 
<form class="form-inline">

<div class="input-group mb-3">
<?php if( !is_null($members)  && $members['parent']!='NA') { ?> 
                            <a href="/members/genealogy/<?=  $members['parent'] ?>" class="fa fa-arrow-up btn btn-dark" aria-hidden="true"></i>
Move UP </a>
<?php } ?>
  <div class="input-group-prepend">
    <span class="form-control" id="basic-addon1">FNI</span>
  </div>
  <input type="text" id="txt_find" class="form-control" placeholder="XXXXXXXX" maxlength="8">
  <a href="#" class="btn btn-dark" id="btn_find"><i class="fa fa-search"></i></a>                             
</div>

                            </form>
                            <div class="light-font">
            <nav aria-label="breadcrub">
                <ol class="breadcrumb">

                <?php if(false && ! is_null($paths))  foreach ($paths as $path): ?>

                    <li class="breadcrumb-item <?= $members->id==$path ? 'active' :'' ?> ">
                    <a href="#"> <?= $path ?> </a>
                    </li>
                    <?php endforeach; ?>
  
                  
                </ol>
            </nav>
            </div>
            
                        </div>
                        <div class="card-body overflow-auto">
                            <!--
                            We will create a family tree using just CSS(3)
                            The markup will be simple nested lists
                            -->
                            <?php if(is_null($members)) {?>
                                <h3>No Found</h3>
                            <?php } else {?>
                            <div class="tree">
                                <?= generate_genealogy($members) ?>
    
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>

            </div>

        </section>
    </div>
</main>
<script>
    $(function() {

       $("#btn_find").click(function(){
           var url="/members/genealogy/FNI"+$.trim($("#txt_find").val());
           
           //alert(url);
        document.location=url;
        //alert(document.location);
       }); 

        $(".tree a").click(function() {
            var v= (this.text).split("  ");
           if($.trim(v[0])!='N/A'){
            //alert("/members/genealogy/"+$.trim(v[0]));
 
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