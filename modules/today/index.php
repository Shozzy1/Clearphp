<?php
    session_start();
    require('/modules/includes/header.php');
	require('/modules/tasks/view.php');

?>

<div class="side">
 <h2>Сегодня <span style=" font-size: 14px; color:#696969; font-weight: bold;"><?php echo date("l d M");?></span></h2>
 <ul>


<?php  
 if(!empty($red)):
 	echo '<h4>Не выполненные</h4>';
  foreach($red as $res):?>

 <li id="parent" style="color: red;">

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
<?php echo '<hr>';?>
<br>
<?php endforeach; ?>
<?php endif; ?> 

<?php  
 if(!empty($main)):
 	echo '<h4>Текущие</h4>';
  foreach($main as $res):?>

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
	<div id="hover-content"><i class="fa fa-ellipsis-v fa-lg"></i></div>
	<div class="dropdown-content">
		
		  <p><a href="index.php?mod=update_task?id=<?=$res['id'];?>"><i class="fa fa-pencil" aria-hidden="true" ></i></a></p>
          <p><a href="index.php?mod=delete_task?id=<?=$res['id'];?>"><i class="fa fa-trash-o" aria-hidden="true" ></i></a></p>
          <p><a href="index.php?mod=complete_task?id=<?=$res['id'];?>"><i class="fa fa-thumbs-o-up" aria-hidden="true" ></i></a></p>

	</div>
	</div>

                    <?php
                    }?>
                  

                    
 </div>

</li>
<?php echo '<hr>';?>
<br>
<?php endforeach; ?>
<?php endif; ?> 
</ul>
 <?php if (!isset($_SESSION['login']) && empty($_SESSION['login'])) {
  echo '<h4>Необходима авторизация!</h4>';
 } else {?>
<label class="collapse_task" for="_2">+Добавить задание</label>
	<input id="_2" type="checkbox">
	<div class="task">
		<form action="modules/tasks/create.php" method="post">

<table>
           <tr><th>
           	<center>
           		<input style = "width:350px; height:30px;" type="text" name="title" maxlength="20" required pattern="[A-Za-zА-Яа-яЁё0-9]+" title="Только буквы и цифры">
           	</th><th>
           	<div>
           		<div class="input-append date form_datetime" data-date="<?php date('Y-m-d');?>">
    <input style = "width:150px; height:30px;" size="16" type="text" name = "end_date" value="" readonly>
    <span class="add-on"><i class="icon-remove"></i></span>
    <span class="add-on"><i class="icon-th"></i></span>
	</div>
           	</div>
           </th></tr>
          
</table>	
<input type="checkbox" id="fbChecks" />
    <label for="fbChecks">
        <div class="sidebar-follow-icon">
           <i class="fa fa-smile-o fa-2x" aria-hidden="true" ></i>
        </div>
     </label>
     <div class="sidebar-follow-buttons">
     	<select style = "width:350px; height:30px;" name="project_id">
     		<?php 
     		$sql_show = "SELECT * FROM projects";
  			$res = mysqli_query($conn, $sql_show);
     		foreach($res as $result):?>
		  <option value="<?php echo $result['id']?>"><?php echo $result['title']?></option>
			<?php endforeach;?>
		
		</select>
     </div>
<input type="checkbox" id="fbCheck" />
    <label for="fbCheck">
        <div class="sidebar-follow-icon">
           <i class="fa fa-bolt fa-2x" aria-hidden="true" ></i>
        </div>
     </label>
     <div class="sidebar-follow-button">
     	<select style = "width:350px; height:30px;" name="priority">

		  	<option value="3">Высокий приоритет</option>
			<option value="2">Средний приоритет</option>
			<option value="1">Низкий приоритет</option>
		</select>
     </div>
     <br>

<button class="btn btn-primary" type="submit">Добавить</button>
<input type="button" value="Отмена" class="btn" onClick='location.href="http://clearphp/index.php?mod=today"'>



</form>
<?php }?>
</div>
<script type="text/javascript">
    $(".form_datetime").datetimepicker({
        format: "yyyy-mm-dd hh:ii:ss"
    });
</script> 
