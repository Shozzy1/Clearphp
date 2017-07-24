<?php
	session_start();
	 require('modules/includes/connect.php');
	$id = $_GET['mod'];
    $id = explode("=", $get_mod);

$ifisset = "SELECT * FROM tasks WHERE project_id = '$id[1]' AND status = 3";

$counts = mysqli_query($conn, $ifisset);

foreach ($counts as $key ) {
	$count = count($key['id']);
}
	
	
if($count > 0){
exit ("Проект содержит не законченные задачи!");
}else{
	$sql_done = "DELETE FROM projects WHERE id='$id[1]'";
	$ok = mysqli_query($conn, $sql_done);
}

	if ($ok == 'TRUE') {
		
		echo '<script type="text/javascript">';
		echo 'window.location.href="'.$url.'";';
		echo '</script>';
	}

	?>
