<?php
	include_once('controller/validate.php');

	if($_POST['name'] == ""):
		$message_ok = false;
		$message_error = 'Insira um nome...';
	else:
		if(!validateName($_POST['name'])):
			$message_ok = false;
			$message_error = 'Use somente letras, números e espaço...';
		else:
			$message_ok = true;
			$message_error = '';
		endif;
	endif;
	$json = array('data'=>$message_ok, 'message'=>$message_error);
	echo json_encode($json);
?>
