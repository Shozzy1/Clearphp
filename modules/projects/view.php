<?php
	session_start();
	require('/modules/includes/connect.php');
	$date = date("Y-m-d");
	$seven_days = date("Y-m-d",mktime(0, 0, 0, date("m")  , date("d")+6, date("Y")));  
	
	///////////////////////////////////
	$sql_show = "SELECT * FROM projects";
    $res = mysqli_query($conn, $sql_show);
    ///////////////////////////////////
   
	?>
