<?php
	session_start();
?>

<html lang="en">
<head>
	<meta charset="UTF-8">
	
</head>
<body>
	<?php
	 require('connect.php');
	

	if (isset($_POST['logon'])) {
		$logon = $_POST['logon'];
		if ($logon == '') {
			unset($logon);
		}
	}

	if (isset($_POST['passwords'])) {
		$passwords = $_POST['passwords'];
		if ($passwords == '') {
			unset($passwords);
		}
	}



//////////////////////////////////////
	$sql_login = "SELECT * FROM users WHERE login='$logon'";

	$result_login = mysqli_query($conn, $sql_login);
	$myrow_login = mysqli_fetch_array($result_login);

	if (empty($myrow_login['password'])) {
		exit ("Неверный пароль");
	} else {
		if ($myrow_login['password'] == $passwords) {
			$_SESSION['login']=$myrow_login['login'];
			
			echo "Done!";
		} else {
			exit ("Error!");
		}
	}

	////////////////////////////////////////
	////////////////////////////////////////
	echo '<script type="text/javascript">';
	echo 'window.location.href="'.$url.'";';
	echo '</script>';

	?>
</body>
</html>