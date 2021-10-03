<?php
	include_once('controller/validate/validate.php');

	$message_ok = false;
	$message_error = 'O Sistema não está disponível';
	$field = 'address';
	if($_POST['address'] == ""){
		$message_ok = false;
		$message_error = 'Insira um endereço...';
		$field = 'address';
	}else{
		if(!validate($_POST['address'])){
			$message_ok = false;
			$message_error = 'Use somente letras, números e espaço...';
			$field = 'address';
		}else{
			$message_ok = true;
			$message_error = '';
			$field = 'address';
		}
		
	}
	$json = array('data'=>$message_ok, 'message'=>$message_error, 'field'=>$field);
	echo json_encode($json);
	
?>
