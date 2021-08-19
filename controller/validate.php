<?php
    function validate($str) {
		return trim(htmlspecialchars($str));
	}

	function validateCNPJ($cnpj){
		$cnpj = validate($cnpj);
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
		$cpf = validate($cpf);
		$cpf = preg_replace( '/[^0-9]/is', '', $cpf );		
		if (strlen($cpf) != 11) {
			return 'Somente números';
		}
		if (preg_match('/(\d)\1{10}/', $cpf)) {
			return 'Não pode números iguais';
		}
		for ($t = 9; $t < 11; $t++) {
			for ($d = 0, $c = 0; $c < $t; $c++) {
				$d += $cpf[$c] * (($t + 1) - $c);
			}
			$d = ((10 * $d) % 11) % 10;
			if ($cpf[$c] != $d) {
				return 'Codigo verificador errado';
			}
		}
		return $cpf;
	}

	function valdidateEmail($email){
		$email = validate($email);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return false;
        }
        return true;
    }

	function valdidateName($name){
		$name = validate($name);
        if (!preg_match('/^[a-zA-Z0-9\s]+$/', $name)) {
            return false;
        }
        return true;
    }

	function valdidatePassword($password){
		$password = validate($password);
        if (strlen($password) < 6) {
            return false;
        }
        return true;
    }
?>