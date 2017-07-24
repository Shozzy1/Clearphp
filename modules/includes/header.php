<?php
session_start();
require 'connect.php';
require('modules/tasks/view.php');
require('modules/projects/view.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
	<link rel="stylesheet" href="assets/css/main.css" />
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
	<link href="assets/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
	<title>LightIT</title>


</head>
<body>
	
<div id="header-wrapper">
					<div class="container-fluid">
								<div class="row">
									<div class="col-md-6 logo">
										<p><a href="index.php">TODO</a></p>
									</div>
								<div class="col-md-6 menu">										
<ul>
	<li>
         <?php
                                    if (empty($_SESSION['login'])) {
                                    ?>
                                    <a href="index.php?mod=auth">Авторизация</a>
                                    <?php } ?>
                                </li>
                                <li>
                                    <?php
                                    if (empty($_SESSION['login'])) {
                                    ?>
                                    <a href="index.php?mod=reg">Регистрация</a>
                                    <?php 
                                        } else {
                                    ?>
                                    <a href="#"><?php echo "Вы вошли как ".$_SESSION['login']; ?></a>
                                    <?php } ?>
                                </li>
                                <li>
                                    <?php
                                    if (!empty($_SESSION['login'])) {
                                    ?>
                                    <a href="modules/includes/close.php">Выйти</a>
                                    <?php } ?>
                                </li>
								
											</ul>
											
									
</div>
								
							

						</div>
					</div>
				</div>

<ul class="sidebar">
  <li><a href="index.php?mod=today">Сегодня <?php echo $main_counter['1'];?></a></li>
  <li><a href="index.php?mod=seven">На 7 дней <?php echo $seven_counter['1'];?></a></li>
  <li><a href="index.php?mod=arhive">Архив</a></li>
  <h4>Проекты:</h4>
  <?php 

 if(!empty($res)):
  foreach($res as $result):
  ?>
<div id="parent">
<div class="col-md-6 proj">
<p class="circle" style="background: <?=$result['color']?>;"></p>
<a href="index.php?mod=sort_project?id=<?=$result['id'];?>"><?php echo $result['title'];?></a>

</div>
<?php if (!isset($_SESSION['login']) && empty($_SESSION['login'])) {
 } else {?>
<div id = "hover-content" class="col-md-6">
<a href="index.php?mod=update_project?id=<?=$result['id'];?>"><i class="fa fa-pencil" aria-hidden="true" ></i></a>
<a href="index.php?mod=delete_project?id=<?=$result['id'];?>"><i class="fa fa-trash-o" aria-hidden="true" ></i></a>

</div>
<?php }?>
</div>
<br>
<?php endforeach; ?>
<?php endif; ?> 
<?php if (!isset($_SESSION['login']) && empty($_SESSION['login'])) {
  echo '<h4>Необходима авторизация!</h4>';
 } else {?>
  <li>
  	<label class="collapse" for="_1">+Добавить проект</label>
	<input id="_1" type="checkbox">
	<div class="project">
		<form action="modules/projects/create.php" method="post">

						
						
						<input class="color" type="color" name="color" value="#ff0000" width="20px" required>
						<input class="text" type="text" name="title" maxlength="20" required pattern="[A-Za-zА-Яа-яЁё0-9]+" title="Только буквы и цифры"><br>
						<button class="btn btn-primary" type="submit">Добавить</button>
						<input type="button" value="Отмена" class="btn" onClick='location.href="http://clearphp/index.php?mod=today"'>
						
						
			
		
</form>
	</div>
</li>
<?php }?>
</ul>

				</body>
				<script type="text/javascript" src="assets/js/jquery.min.js" charset="UTF-8"></script>
				<script type="text/javascript" src="assets/js/main.js" charset="UTF-8"></script>
				<script type="text/javascript" src="assets/js/bootstrap-datetimepicker.min.js" charset="UTF-8"></script>

</html>
