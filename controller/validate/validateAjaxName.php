<?php
	include_once('controller/validate/validate.php');

	$message_ok = false;
	$message_error = 'O Sistema não está disponível';
	$field = 'name';
	if($_POST['name'] == ""){
		$message_ok = false;
		$message_error = 'Insira um nome...';
		$field = 'name';
	}else{
		if(!validateName($_POST['name'])){
			$message_ok = false;
			$message_error = 'Use somente letras, números e espaço...';
			$field = 'name';
		}else{
			$message_ok = true;
			$message_error = '';
			$field = 'name';
		}
		
	}
	$json = array('data'=>$message_ok, 'message'=>$message_error, 'field'=>$field);
	echo json_encode($json);
	
?>
