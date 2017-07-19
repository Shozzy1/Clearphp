<?php
	session_start();
	require('../includes/connect.php');
	
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	
</head>
<body>
	<?php
	
	
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

	if (isset($_POST['color'])) {
		$color = $_POST['color'];
		if ($color == '') {
			unset($color);
		}
	}

	if (empty($title) or empty($color)) {
		exit("Введите данные!");
	}
////////////////////////////////////////////
	$sql_p = "SELECT id FROM projects WHERE title='$title'";
	$sql_done = "UPDATE projects SET title='$title', color='$color' WHERE id='$id'";

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
</body>
</html>