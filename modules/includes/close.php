<?php
	session_start();
	session_unset();
	session_destroy();
	header("Location: http://clearphp/index.php?mod=today");
?>