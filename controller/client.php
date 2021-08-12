<?php
    include_once('model/client.php');
    
    if(isset($_GET['add'])){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // unset($_POST['cpf']);
            // unset($_POST['telefone']);
            // unset($_POST['endereco']);
            // unset($_POST['confirmasenha']);
            $data[] = $_POST;
			print_r($data);
            exit;
            $is_inserted = insert_client($conn, $data);
        }
    }else{
        include('view/content/addClient.php');
    }
    
?>