<?php
	include_once('controller/validate/validate.php');

	$message_ok = false;
	$message_error = 'O Sistema não está disponível';
	$field = 'cpf';
	if($_POST['cpf'] == ""){
		$message_ok = false;
		$message_error = 'Insira um CPF...';
		$field = 'cpf';
	}else{
		if(!validateCPF($_POST['cpf'])){
			$message_ok = false;
			$message_error = 'CPF inválido...';
			$field = 'cpf';
		}else{
			$cpf = $_POST['cpf'];
			$cpf = preg_replace( '/[^0-9]/is', '', $cpf );
			$message_ok = true;
			$message_error = '';
			$field = 'cpf';
		}
	}
	
	$json = array('data'=>$message_ok, 'message'=>$message_error, 'field'=>$field,
	'cpf'=>$cpf);
	echo json_encode($json);
	
?>
