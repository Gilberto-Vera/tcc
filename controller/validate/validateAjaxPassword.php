<?php
	include_once('controller/validate/validate.php');

	$message_ok = false;
	$message_error = 'O Sistema não está disponível';
	$field = 'password';
	if($_POST['password'] == ""){
		$message_ok = false;
		$message_error = 'Insira uma senha...';
		$field = 'password';
	}else{
		if(!validatePassword($_POST['password'])){
			$message_ok = false;
			$message_error = 'A senha deve ter pelo menos 6 caracteres...';
			$field = 'password';
		}else{
			$message_ok = true;
			$message_error = '';
			$field = 'password';
		}
		
	}
	$json = array('data'=>$message_ok, 'message'=>$message_error, 'field'=>$field);
	echo json_encode($json);
	
?>
