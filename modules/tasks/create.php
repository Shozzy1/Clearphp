<?php
	require('../includes/connect.php');

	

	if (isset($_POST['title'])) {
		$title = $_POST['title'];
		if ($title == '') {
			unset($title);
		}
	}

	if (isset($_POST['end_date'])) {
		$end_date = $_POST['end_date'];
		if ($end_date == '') {
			unset($end_date);
		}
	}

	if (isset($_POST['priority'])) {
		$priority = $_POST['priority'];
		if ($priority == '') {
			unset($priority);
		}
	}

	if (isset($_POST['project_id'])) {
		$project_id = $_POST['project_id'];
		if ($project_id == '') {
			unset($project_id);
		}
	}

	if (!isset($_POST['status'])) {
		$status = 3;
		if ($status == '') {
			unset($status);
		}
	}


	if (empty($title) or empty($end_date) or empty($priority)or empty($project_id)) {
		exit("Введите данные!");
	}
////////////////////////////////////////////
	$sql_p = "SELECT id FROM tasks WHERE title='$title'";
	$sql_done = "INSERT INTO tasks (title,end_date,status,priority,project_id) VALUES ('$title', '$end_date', '$status', '$priority', '$project_id' )";

	$res = mysqli_query($conn, $sql_p);
	$myrow = mysqli_fetch_array($res);

	if (isset($myrow)) {
		exit ("Такое задание уже существует.");
	}

	$ok = mysqli_query($conn, $sql_done);

	if ($ok == 'TRUE') {
		
		echo '<script type="text/javascript">';
		echo 'window.location.href="'.$url.'";';
		echo '</script>';
	}

	?>
