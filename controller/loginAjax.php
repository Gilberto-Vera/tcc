<?php
	include_once('controller/validate/validate.php');
	include_once('model/login.php');

	$error = true;
	$message_error='O Sistema não está disponível';
	if($_POST['username'] == ""){
		$message_error = 'O login é necessário...';
		$json['username'] = array('error'=>$error, 'message'=>$message_error);
	}else{
		$error = false;
		$message_error = '';
		$json['username'] = array('error'=>$error, 'message'=>$message_error);
	}

	if($_POST['password'] == ""){
		$error = true;
		$message_error='A senha é necessária...';
		$json['password'] = array('error'=>$error, 'message'=>$message_error);
	}else{
		$error = false;
		$message_error = '';
		$json['password'] = array('error'=>$error, 'message'=>$message_error);
	}

	if($_POST['username'] != "" and $_POST['password'] != ""){
		$username = validate($_POST['username']);
		$password = validate($_POST['password']);
		$res = validationLogin($conn, $username, $password);
		if(pg_num_rows($res)>0){
			$error = false;
			$user_list=pg_fetch_array($res);
			$_SESSION['id']=$user_list[0];
			$_SESSION['username']=$user_list[1];
			$message_error='';
			$json['username'] = array('error'=>$error, 'message'=>$message_error);
			$json['password'] = array('error'=>$error, 'message'=>$message_error);
		}else{
			$error = true;
			$message_error = 'Falha no acesso, por favor, tente novamente.';
			$json['username'] = array('error'=>$error, 'message'=>$message_error);
			$json['password'] = array('error'=>$error, 'message'=>$message_error);
		}
	}
	echo json_encode($json);
?>
