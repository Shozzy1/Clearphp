<?php
    session_start();
    $id = $_GET['mod'];
    $id = explode("=", $get_mod);

					    require('/modules/includes/header.php');
					    require('/modules/includes/connect.php');
					    $res = "SELECT * FROM tasks WHERE id='$id[1]'";
 						$res = mysqli_query($conn, $res);

					?>
			

<div style="margin-left:25%;padding:1px 16px;height:1000px;">
 <h2>Редактировать задачу</h2>
 <form action="modules/tasks/upd.php" method="post">

						<?php if(!empty($res)):
  						foreach($res as $result):?>
						
						<input class="hidden" type="number" name="id" value="<?=$result['id'];?>">
						<p>Название</p>
						<input style = "width:350px; height:30px;" type="text" name="title" maxlength="20" pattern="[A-Za-zА-Яа-яЁё0-9]+" title="Только буквы и цифры" placeholder="<?=$result['title'];?>" value="<?=$result['title'];?>"><br>
						<p>Дата окончания</p>
						<div class="input-append date form_datetime" data-date="<?php date('Y-m-d');?>">
					    <input style = "width:350px; height:30px;" size="16" type="text" name = "end_date" value="<?=$result['end_date'];?>" readonly>
					    <span class="add-on"><i class="icon-remove"></i></span>
					    <span class="add-on"><i class="icon-th"></i></span>
						</div>
						<p>Проект</p>
						<select style = "width:350px; height:30px;" name="project_id">
			     		<?php 
			     		$sql_show = "SELECT * FROM projects";
			  			$resp = mysqli_query($conn, $sql_show);
			     		foreach($resp as $resultp):?>
					  <option value="<?php echo $resultp['id']?>"><?php echo $resultp['title']?></option>
						<?php endforeach;?>
						</select><br>
						<p>Приоритет</p>
						<select style = "width:350px; height:30px;" name="priority">
					  	<option value="3">Высокий приоритет</option>
						<option value="2">Средний приоритет</option>
						<option value="1">Низкий приоритет</option>
						</select><br>
						<p>Статус задачи</p>
						<select style = "width:350px; height:30px;" name="status">
					  	<option value="3">В процессе</option>
						<option value="2">Выполнено</option>
						<option value="1">Не выполнено</option>
						</select><br><br>	


						<?php endforeach; ?>
						<?php endif; ?> 

						<button class="btn btn-primary" type="submit">Обновить</button>
						<input type="button" value="Отмена" class="btn" onClick='location.href="http://clearphp/index.php?mod=today"'>
						
						
			
		
</form>


</div>

	</body>
	<script type="text/javascript">
    $(".form_datetime").datetimepicker({
        format: "yyyy-mm-dd hh:ii:ss"
    });
