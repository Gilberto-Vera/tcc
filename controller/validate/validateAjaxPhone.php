<?php
	include_once('controller/validate/validate.php');

	$message_ok = false;
	$message_error = 'O Sistema não está disponível';
	$field = 'phone';
	if($_POST['phone'] == ""){
		$message_ok = false;
		$message_error = 'Insira um telefone...';
		$field = 'phone';
	}else{
		$phone = $_POST['phone'];
		$phone = brazilianPhoneParser($phone, true);
		$message_ok = true;
		$message_error = '';
		$field = 'phone';
	}
	
	$json = array('data'=>$message_ok, 'message'=>$message_error, 'field'=>$field,
	'phone'=>$phone['number']);
	echo json_encode($json);
	
?>
