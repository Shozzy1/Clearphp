<?php
    session_start();
    $id = $_GET['mod'];
    $id = explode("=", $get_mod);
    
?>
		<div id="page-wrapper">

			<!-- Header -->
					<?php
					    require('modules/includes/header.php');
					    require('modules/includes/connect.php');
					    $res = "SELECT * FROM projects WHERE id='$id[1]'";
 						$res = mysqli_query($conn, $res);

					?>
				</div>

<div style="margin-left:25%;padding:1px 16px;height:1000px;">
 <h2>Редактировать проект</h2>
 <form action="modules/projects/upd.php" method="post">

						<?php if(!empty($res)):
  foreach($res as $result):?>
						
						<input class="hidden" type="number" name="id" value="<?=$result['id'];?>">
						<input class="color" type="color" name="color" value="<?=$result['color'];?>" width="20px">
						<input style = "width:350px; height:30px;" class="text" type="text" name="title" maxlength="20" pattern="[A-Za-zА-Яа-яЁё0-9]+" title="Только буквы и цифры" placeholder="<?=$result['title'];?>"><br>
<?php endforeach; ?>
<?php endif; ?> 

						<button class="btn btn-primary" type="submit">Обновить</button>
						<input type="button" value="Отмена" class="btn" onClick='location.href="http://clearphp.hol.es/index.php?mod=today"'>
						
						
			
		
</form>


</div>

