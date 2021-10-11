<?php
	include_once('controller/validate/validate.php');
	include_once('model/verifyEmail.php');

	$error = false;
	$message_error = 'O Sistema não está disponível';
	if($_POST['name'] == ""){
		$error = false;
		$message_error = 'Insira um nome...';
	}else{
		if(!validateName($_POST['name'])){
			$error = false;
			$message_error = 'Use somente letras, números e espaço...';
		}else{
			$name = validate($_POST['name']);
			$error = true;
			$message_error = '';
		}
	}
	$json['name'] = array('error'=>$error, 'message'=>$message_error, 'name'=>$name);

	if($_POST['cpf'] == ""){
		$error = false;
		$message_error = 'Insira um CPF...';
	}else{
		if(!validateCPF($_POST['cpf'])){
			$error = false;
			$message_error = 'CPF inválido...';
		}else{
			$cpf = $_POST['cpf'];
			$cpf = preg_replace( '/[^0-9]/is', '', $cpf );
			$error = true;
			$message_error = '';
		}
	}
	$json['cpf'] = array('error'=>$error, 'message'=>$message_error, 'cpf'=>$cpf);

	if($_POST['phone'] == ""){
		$error = false;
		$message_error = 'Insira um telefone...';
	}else{
		$phone = $_POST['phone'];
		$phone = brazilianPhoneParser($phone, true);
		$error = true;
		$message_error = '';
	}
	$json['phone'] = array('error'=>$error, 'message'=>$message_error, 'phone'=>$phone);

	if($_POST['address'] == ""){
		$error = false;
		$message_error = 'Insira um endereço...';
	}else{
		$address = validate($_POST['address']);
		$error = true;
		$message_error = '';
	}
	$json['address'] = array('error'=>$error, 'message'=>$message_error, 'address'=>$address);
	
	if($_POST['email'] == ""){
		$error = false;
		$message_error = 'Insira um email...';
	}else{
		if(!validateEmail($_POST['email'])){
			$error = false;
			$message_error = 'Email inválido...';
		}else{
			$email = validate($_POST['email']);
			$res = verifyEmail($email, $conn);
			if(pg_num_rows($res)>0){
				$error=false;
				$message_error='Email já cadastrado...';
			}else{
				$error = true;
				$message_error = '';
			}
		}
	}
	$json['email'] = array('error'=>$error, 'message'=>$message_error, 'email'=>$email);

	if($_POST['password'] == ""){
		$error = false;
		$message_error = 'Insira uma senha...';
	}else{
		if(!validatePassword($_POST['password'])){
			$error = false;
			$message_error = 'A senha deve ter pelo menos 6 caracteres...';
		}else{
			$password = validate($_POST['password']);
			$error = true;
			$message_error = '';
		}
	}
	$json['password'] = array('error'=>$error, 'message'=>$message_error, 'password'=>$password);

	if($_POST['password'] == ""){
		$error = false;
		$message_error = 'Insira uma senha...';
	}else{
		if($_POST['password'] != $_POST['confirmPassword']){
			$error = false;
			$message_error = 'As senhas não são iguais...';
		}else{
			$confirmPassword = validate($_POST['confirmPassword']);
			$error = true;
			$message_error = '';
		}
	}
	$json['confirmPassword'] = array('error'=>$error, 'message'=>$message_error, 'confirmPassword'=>$confirmPassword);
	
	if($json['password']['error'] == true && $json['confirmPassword']['error'] == true){
		$hash_password = password_hash($_POST['password'], PASSWORD_BCRYPT);
		$json['hash_password'] = array('error'=>true, 'message'=>'', 'hash_password'=>$hash_password);
	}

	echo json_encode($json);
?>
