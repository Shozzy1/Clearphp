<?php
	session_start();

	require('/modules/includes/connect.php');
	$date = date("Y-m-d");
	$seven_days = date("Y-m-d",mktime(0, 0, 0, date("m")  , date("d")+6, date("Y")));  
	
	///////////////////////////////////
	$sql_red = "SELECT tasks.*, projects.color, projects.title AS projectName FROM tasks LEFT JOIN projects ON projects.id = tasks.project_id WHERE end_date<'$date' OR status = 1 ORDER BY priority DESC";
	$red = mysqli_query($conn, $sql_red);
	$sql_today = "SELECT tasks.*, projects.color, projects.title AS projectName FROM tasks LEFT JOIN projects ON projects.id = tasks.project_id WHERE DATE(end_date) = '$date' AND status !=1 AND status !=2  ORDER BY priority DESC";
	$main = mysqli_query($conn, $sql_today);
	$sql_seven = "SELECT tasks.*, projects.color, projects.title AS projectName FROM tasks LEFT JOIN projects ON projects.id = tasks.project_id WHERE DATE(end_date) >= '$date' AND DATE(end_date) <= '$seven_days' AND status !=1 AND status !=2 ORDER BY priority DESC";
	$seven = mysqli_query($conn, $sql_seven);
	$sql_arhive = "SELECT tasks.*, projects.color, projects.title AS projectName FROM tasks LEFT JOIN projects ON projects.id = tasks.project_id WHERE  status =2  ORDER BY priority DESC";
	$arhive = mysqli_query($conn, $sql_arhive);
	////////////////////////////////////////
	$sql_todays = "SELECT id, COUNT(*) FROM tasks WHERE DATE(end_date) = '$date' AND status !=1 AND status !=2";
	$r = mysqli_query($conn, $sql_todays);
	$main_counter = mysqli_fetch_array($r);
	////////////////////////////////////////
	$sql_sevens = "SELECT id, COUNT(*) FROM tasks WHERE DATE(end_date) >= '$date' AND DATE(end_date) <= '$seven_days' AND status !=1 AND status !=2 ORDER BY priority DESC";
	$rr = mysqli_query($conn, $sql_sevens);
	$seven_counter = mysqli_fetch_array($rr);
	
	

	?>
