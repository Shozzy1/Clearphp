<?php
    session_start();
    require('/modules/includes/header.php');
	require('/modules/tasks/view.php');
?>

<div class="side">
 <h2>Архив задач <span style=" font-size: 14px; color:#696969; font-weight: bold;"><?php echo date("l d M");?></span></h2>
 <ul>
<?php  
 if(!empty($arhive)):

  foreach($arhive as $res):?>

 <li id="parent">

<div class="col-md-6">
                    <?php 
                    if($res['priority'] == 3){
                        ?><p class ="kvadr" style="background: red;"></p><?
                    }elseif($res['priority'] == 2){
                        ?><p class ="kvadr" style="background: orange;"></p><?
                    }else{
                        ?><p class ="kvadr" style="background: white;"></p><?
                    }?>
                    <?php echo $res['title'];?>
                    
</div>
<div class="col-md-3">
  <span style="float: left;"><span class="circle" style="background-color: <?=$res['color'];?>"></span><?php echo $res['projectName'];?> </span>

</div>
 <div class="col-md-3">
                      <?php  
                    if (!isset($_SESSION['login']) && empty($_SESSION['login'])) {
                    } else {?>
                     <div class="dropdown one">
	<div id="hover-content" class="span2" tabindex="0"><i class="fa fa-ellipsis-v fa-lg"></i></div>
	<div class="dropdown-content">
		
	  <p><a href="index.php?mod=update_task?id=<?=$res['id'];?>"><i class="fa fa-pencil" aria-hidden="true" ></i></a></p>
      <p><a href="index.php?mod=delete_task?id=<?=$res['id'];?>"><i class="fa fa-trash-o" aria-hidden="true" ></i></a></p>
     

	</div>
	</div>

                    <?php
                    }?>

                    
 </div>

</li>
<br>
<br>
<?php endforeach; ?>
<?php endif; ?> 
</ul>

</div>
