<?php
	session_start();
	require('/modules/includes/connect.php');
	$date = date("Y-m-d");
	$seven_days = date("Y-m-d",mktime(0, 0, 0, date("m")  , date("d")+6, date("Y")));  
	
	///////////////////////////////////
	$sql_show = "SELECT c.id, c.title, c.color, COUNT(*) AS taskCount  FROM projects AS c INNER JOIN tasks AS b ON b.project_id = c.id GROUP BY c.id";
    $res = mysqli_query($conn, $sql_show);
    ///////////////////////////////////
   
	?>
