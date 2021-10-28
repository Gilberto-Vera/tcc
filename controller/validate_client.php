<?php

    include_once('controller/validate_util.php');

	$name = $_POST['name'];
	$json['name'] = validate_name($name);

	$cpf = $_POST['cpf'];
	$json['cpf'] = validate_cpf($cpf);
	
	$phone = $_POST['phone'];
	$json['phone'] = validate_phone($phone);
	
	$address = $_POST['address'];
	$json['address'] = validate_address($address);

	$email = $_POST['email'];
	$json['email'] = validate_email($email);

	$password = $_POST['password'];
	$json['password'] = validate_password($password);

	$confirm_password = $_POST['confirmPassword'];
	$json['confirmPassword'] = validate_confirm_password($confirm_password, $password);
	
	if($json['password']['error'] == true && $json['confirmPassword']['error'] == true){
		$hash_password = password_hash($_POST['password'], PASSWORD_BCRYPT);
		$json['hash_password'] = array('error'=>true, 'message'=>'', 'hash_password'=>$hash_password);
	}

	echo json_encode($json);

?>