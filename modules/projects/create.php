<?php
	require('../includes/connect.php');

	

	if (isset($_POST['title'])) {
		$title = $_POST['title'];
		if ($title == '') {
			unset($title);
		}
	}

	if (isset($_POST['color'])) {
		$color = $_POST['color'];
		if ($color == '') {
			unset($color);
		}
	}

	if (empty($color) or empty($color)) {
		exit("Введите данные!");
	}
////////////////////////////////////////////
	$sql_p = "SELECT id FROM projects WHERE title='$title'";
	$sql_done = "INSERT INTO projects (title,color) VALUES ('$title', '$color')";

	$res = mysqli_query($conn, $sql_p);
	$myrow = mysqli_fetch_array($res);

	if (isset($myrow)) {
		exit ("Такой проект уже существует.");
	}

	$ok = mysqli_query($conn, $sql_done);

	if ($ok == 'TRUE') {
		
		echo '<script type="text/javascript">';
		echo 'window.location.href="'.$url.'";';
		echo '</script>';
	}

	?>
