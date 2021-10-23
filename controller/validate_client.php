<?php
    include_once('model/client.php');

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

    function validate_name($name){
        $error = false;
        $message_error = 'O Sistema não está disponível';
        if($name == ""){
            $message_error = 'Insira um nome...';
        }else{
            if(!validateName($name)){
                $message_error = 'Use somente letras, números e espaço...';
            }else{
                $name = validate($_POST['name']);
                $error = true;
                $message_error = '';
            }
        }
        return array('error'=>$error, 'message'=>$message_error, 'name'=>$name);
    }

    function validate_cpf($cpf){
        $error = false;
        if($cpf == ""){
            $message_error = 'Insira um CPF...';
        }else{
            if(!validateCPF($cpf)){
                $message_error = 'CPF inválido...';
            }else{
                $cpf = preg_replace( '/[^0-9]/is', '', $cpf );
                $error = true;
                $message_error = '';
            }
        }
        return array('error'=>$error, 'message'=>$message_error, 'cpf'=>$cpf);
    }

    function validate_phone($phone){
        $error = false;
        if($phone == ""){
            $message_error = 'Insira um telefone...';
        }else{
            $phone = brazilianPhoneParser($phone, true);
            $error = true;
            $message_error = '';
        }
        return array('error'=>$error, 'message'=>$message_error, 'phone'=>$phone);
    }

    function validate_address($address){
        $error = false;
        if($address == ""){
            $message_error = 'Insira um endereço...';
        }else{
            $address = validate($address);
            $error = true;
            $message_error = '';
        }
        return array('error'=>$error, 'message'=>$message_error, 'address'=>$address);
    }

    function validate_email($email){
        $error = false;
        if($email == ""){
            $message_error = 'Insira um email...';
        }else{
            if(!validateEmail($email)){
                $message_error = 'Email inválido...';
            }else{
                $email = validate($email);
                $res = verify_email($conn, $email);
                if(pg_num_rows($res)>0){
                    $message_error='Email já cadastrado...';
                }else{
                    $error = true;
                    $message_error = '';
                }
            }
        }
        return array('error'=>$error, 'message'=>$message_error, 'email'=>$email);
    }

    function validate_password($password){
        $error = false;
        if($password == ""){
            $message_error = 'Insira uma senha...';
        }else{
            if(!validatePassword($password)){
                $message_error = 'A senha deve ter pelo menos 6 caracteres...';
            }else{
                $password = validate($password);
                $error = true;
                $message_error = '';
            }
        }
        return array('error'=>$error, 'message'=>$message_error, 'password'=>$password);
    }

    function validate_confirm_password($confirm_password, $password){
        $error = false;
        if($confirm_password == ""){
            $message_error = 'Insira uma senha...';
        }else{
            if($password != $confirm_password){
                $message_error = 'As senhas não são iguais...';
            }else{
                $confirm_password = validate($confirm_password);
                $error = true;
                $message_error = '';
            }
        }
        return array('error'=>$error, 'message'=>$message_error, 'confirmPassword'=>$confirmPassword);
    }

?>