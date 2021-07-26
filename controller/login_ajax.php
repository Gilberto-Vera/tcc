<?php
	$message_ok=false;
	$message_error='O Sistema não está disponível';
	if($_POST['username'] == "" and $_POST['password'] == ""):
		$message_error='Todos os campos são obrigatórios.';
	else:
		if($_POST['username']!="" and $_POST['password'] == ""):
			$message_error='O campo senha é obrigatório.';
		else:
			if($_POST['username']=="" and $_POST['password']!=""):
				$message_error='O campo de login é obrigatório.';
			else:
				$username=$_POST['username'];
				// $password=md5($_POST['password']);
				$password=$_POST['password'];
				$res=pg_query($conn,("Select * from pessoa where nome='$username' and senha='$password'"));
				if(pg_num_rows($res)>0):
					$message_ok=true;
					$user_list=pg_fetch_array($res);
					$_SESSION['id']=$user_list[0];
					$_SESSION['username']=$user_list[1];
					$message_error='login efetuado com sucesso.';
				else:
					$message_error='Falha no acesso, por favor, tente novamente.';
				endif;
			endif;
		endif;
	endif;
	$json=array('data'=>$message_ok, 'message'=>$message_error);
	echo json_encode($json);
?>
