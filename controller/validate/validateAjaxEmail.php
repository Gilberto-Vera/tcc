<?php
	include_once('controller/validate/validate.php');

	$message_ok = false;
	$message_error = 'O Sistema não está disponível';
	$field = 'email';
	if($_POST['email'] == ""){
		$message_ok = false;
		$message_error = 'Insira um email...';
		$field = 'email';
	}else{
		if(!validateEmail($_POST['email'])){
			$message_ok = false;
			$message_error = 'Email inválido...';
			$field = 'email';
		}else{
			$message_ok = true;
			$message_error = '';
			$field = 'email';
		}
		
	}
	$json = array('data'=>$message_ok, 'message'=>$message_error, 'field'=>$field);
	echo json_encode($json);
	
?>
