<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	
</head>
<body>
	<?php
	require('connect.php');

	

	if (isset($_POST['login'])) {
		$login = $_POST['login'];
		if ($login == '') {
			unset($login);
		}
	}

	if (isset($_POST['password'])) {
		$password = $_POST['password'];
		if ($password == '') {
			unset($password);
		}
	}

	if (empty($login) or empty($password)) {
		exit("Введите данные!");
	}
////////////////////////////////////////////
	$sql_p = "SELECT id FROM users WHERE login='$login'";
	$sql_done = "INSERT INTO users (login,password) VALUES ('$login', '$password')";

	$res = mysqli_query($conn, $sql_p);
	$myrow = mysqli_fetch_array($res);

	if (isset($myrow)) {
		exit ("Такой пользователь уже существует.");
	}

	$ok = mysqli_query($conn, $sql_done);

	if ($ok == 'TRUE') {
		
		echo '<script type="text/javascript">';
		echo 'window.location.href="'.$url.'";';
		echo '</script>';
	}

	?>
</body>
</html>