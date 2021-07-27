<?php
if (isset($_GET['control']) ) {
	include_once('model/conn.php');
	session_start();
	require_once('controller/'.$_GET['control'].".php");
	pg_close($conn);
	
}else{
	require_once('controller/login.php');
}
?>