<?php
    include_once('model/client.php');

    function validate($str) {
		return trim(htmlspecialchars($str));
	}

	function validateCNPJ($cnpj){
		$cnpj = preg_replace('/[^0-9]/', '', (string) $cnpj);

		if (strlen($cnpj) != 14)
			return false;
		if (preg_match('/(\d)\1{13}/', $cnpj))
			return false;	

		// Valida primeiro dígito verificador
		for ($i = 0, $j = 5, $soma = 0; $i < 12; $i++){
			$soma += $cnpj[$i] * $j;
			$j = ($j == 2) ? 9 : $j - 1;
		}
		$resto = $soma % 11;
		if ($cnpj[12] != ($resto < 2 ? 0 : 11 - $resto))
			return false;

		// Valida segundo dígito verificador
		for ($i = 0, $j = 6, $soma = 0; $i < 13; $i++){
			$soma += $cnpj[$i] * $j;
			$j = ($j == 2) ? 9 : $j - 1;
		}
		$resto = $soma % 11;
		return $cnpj[13] == ($resto < 2 ? 0 : 11 - $resto);
	}

	function validateCPF($cpf) {
		$cpf = preg_replace( '/[^0-9]/is', '', $cpf );

		if (strlen($cpf) != 11) {
			return false;
		}

		if (preg_match('/(\d)\1{10}/', $cpf)) {
			return false;
		}
		
		for ($t = 9; $t < 11; $t++) {
			for ($d = 0, $c = 0; $c < $t; $c++) {
				$d += $cpf[$c] * (($t + 1) - $c);
			}
			$d = ((10 * $d) % 11) % 10;
			if ($cpf[$c] != $d) {
				return false;
			}
		}
		return true;
	}

	function validateEmail($email){
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return false;
        }
        return true;
    }

	function validateName($name){
        if (!preg_match('/^[a-zA-Z0-9\s]+$/', $name)) {
            return false;
        }
        return true;
    }

	function validatePassword($password){
        if (strlen($password) < 6) {
            return false;
        }
        return true;
    }

	/**
	 * A função abaixo demonstra o uso de uma expressão regular que identifica, de forma simples, telefones válidos no Brasil.
	 * Exemplos válidos: +55 (21) 98888-8888 / 9999-9999 / 21 98888-8888 / 5511988888888 / +55 (021) 98888-8888 / 021 99995-3333
	 *
	 * @param string $phoneString 
	 * @param bool $forceOnlyNumber Passar false caso não queira remover o traço "-"
	 * @return array|null ['ddi' => 'string', 'ddd' => string , 'number' => 'string']
	 */
	function brazilianPhoneParser(string $phoneString, bool $forceOnlyNumber = true) : ?array{
		$phoneString = validate($phoneString);

		$phoneString = preg_replace('/[()]/', '', $phoneString);

		if (preg_match('/^(?:(?:\+|00)?(55)\s?)?(?:\(?([0-0]?[0-9]{1}[0-9]{1})\)?\s?)??(?:((?:9\d|[2-9])\d{3}\-?\d{4}))$/', $phoneString, $matches) == false){
			return null;
		}

		$ddi = $matches[1] ?? '';
		$ddd = preg_replace('/^0/', '', $matches[2] ?? '');
		$number = $matches[3] ?? '';
		if ($forceOnlyNumber == true){
			$number = preg_replace('/-/', '', $number);
		}

		return ['ddi' => $ddi, 'ddd' => $ddd , 'number' => $number];
	}

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
                $res = verifyEmail($email);
				
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
        return array('error'=>$error, 'message'=>$message_error, 'confirmPassword'=>$confirm_password);
    }
?>