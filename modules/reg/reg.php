<?php
    session_start();
    require_once('modules/includes/header.php');
?>

<div style="margin-left:25%;padding:1px 16px;height:1000px;">
<form action="modules/includes/register.php" method="post">
		

						<h3>РЕГИСТРАЦИЯ</h3>
					
					
						<p>Логин: </p><br>
						<input style = "width:350px; height:30px;" type="text" name="login" maxlength="20" required pattern="[A-Za-zА-Яа-яЁё0-9]+" title="Только буквы и цифры"><br>
						<p>Пароль: </p><br>
						<input style = "width:350px; height:30px;" type="password" name="password" maxlength="30" required><br>
					
						<button class="btn btn-success" type="submit">Регистрация</button>
						<input type="button" value="Отмена" class="btn btn-primary" onClick='location.href="http://clearphp/index.php?mod=today"'>
						
					
			
		
</form>
</div>
