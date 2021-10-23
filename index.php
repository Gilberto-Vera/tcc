<?php
include_once('model/conn.php');

if (isset($_REQUEST['control']) ) {
	
	session_start();
	require_once('controller/'.$_REQUEST['control'].".php");
	pg_close($conn);
	
}else{
	require_once('controller/login.php');
}
?>