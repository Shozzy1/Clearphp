<?php
	session_start();
	 require('modules/includes/connect.php');
	$id = $_GET['mod'];
    $id = explode("=", $get_mod);

	$sql_done = "DELETE FROM tasks WHERE id='$id[1]'";

	

	$ok = mysqli_query($conn, $sql_done);

	if ($ok == 'TRUE') {
		
		echo '<script type="text/javascript">';
		echo 'window.location.href="'.$url.'";';
		echo '</script>';
	}

	?>
