<?php
	include_once('controller/validate/validate.php');

	$message_ok = false;
	$message_error = 'O Sistema não está disponível';
	$field = 'confirmPassword';
	if($_POST['password'] == ""){
		$message_ok = false;
		$message_error = 'Insira uma senha...';
		$field = 'confirmPassword';
	}else{
		if($_POST['password'] != $_POST['confirmPassword']){
			$message_ok = false;
			$message_error = 'As senhas não são iguais...';
			$field = 'confirmPassword';
		}else{
			$message_ok = true;
			$message_error = '';
			$field = 'confirmPassword';
		}
		
	}
	$json = array('data'=>$message_ok, 'message'=>$message_error, 'field'=>$field);
	echo json_encode($json);
	
?>
