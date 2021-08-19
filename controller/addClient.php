<?php
    include_once('model/client.php');
    include_once('controller/validate.php');
    
    if(isset($_GET['add'])){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $cpf = validate($_POST['cpf']);
            unset($_POST['telefone']);
            unset($_POST['endereco']);
            unset($_POST['confirmaSenha']);
            $data[] = $_POST;
            $is_inserted = insert_client($conn, $data);
        }
        include('view/content/addClient.php');
    }else{
        include('view/content/addClient.php');
    }
    
?>