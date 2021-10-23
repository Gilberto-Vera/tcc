<?php
	include_once('controller/validate_util.php');
	include_once('model/login.php');

	$username = $_POST['username'];

	$error = true;
	$message_error='O Sistema não está disponível';
	if($_POST['username'] == "" and $_POST['password'] != ""){
		$message_error = 'O login é necessário...';
		$json['username'] = array('error'=>$error, 'message'=>$message_error);
		$message_error = '';
		$json['password'] = array('error'=>$error, 'message'=>$message_error);
	}elseif($_POST['password'] == "" and $_POST['username'] != ""){
		$message_error = 'A senha é necessária...';
		$json['password'] = array('error'=>$error, 'message'=>$message_error);
		$message_error = '';
		$json['username'] = array('error'=>$error, 'message'=>$message_error);
	}elseif($_POST['username'] == "" and $_POST['password'] == ""){
		$message_error = 'O login é necessário...';
		$json['username'] = array('error'=>$error, 'message'=>$message_error);
		$message_error = 'A senha é necessária...';
		$json['password'] = array('error'=>$error, 'message'=>$message_error);
	}else{
		$username = validate($_POST['username']);
		$password = validate($_POST['password']);
		$res = validationLogin($conn, $username, $password);
		if(pg_num_rows($res)>0){
			$error = false;
			$user_list=pg_fetch_row($res);
			$_SESSION['id']=$user_list[0];
			$_SESSION['username']=$user_list[1];
			$message_error='';
			$json['username'] = array('error'=>$error, 'message'=>$message_error);
			$json['password'] = array('error'=>$error, 'message'=>$message_error);
		}else{
			$message_error='';
			$json['username'] = array('error'=>$error, 'message'=>$message_error);
			$message_error = 'Falha no acesso, por favor, tente novamente...';
			$json['password'] = array('error'=>$error, 'message'=>$message_error);
		}
	}
	echo json_encode($json);
?>
