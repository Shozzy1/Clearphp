<?php
	session_start();
	require('../includes/connect.php');
	
	if (isset($_POST['id'])) {
		$id = $_POST['id'];
		if ($id == '') {
			unset($id);
		}
	}
	

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

	if (isset($_POST['status'])) {
		$status = $_POST['status'];
		if ($status == '') {
			unset($status);
		}
	}

	if (isset($_POST['project_id'])) {
		$project_id = $_POST['project_id'];
		if ($project_id == '') {
			unset($project_id);
		}
	}

	if (empty($title) or empty($end_date) or empty($priority) or empty($status) or empty($project_id)) {
		exit("Введите данные!");
	}
////////////////////////////////////////////
	
	$sql_done = "UPDATE tasks SET title='$title', end_date='$end_date', priority='$priority', status='$status', project_id='$project_id' WHERE id='$id'";

	

	$ok = mysqli_query($conn, $sql_done);

	if ($ok == 'TRUE') {
		
		echo '<script type="text/javascript">';
		echo 'window.location.href="'.$url.'";';
		echo '</script>';
	}

	?>
