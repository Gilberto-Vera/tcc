<?php
    include_once('model/client.php');
    
    if(isset($_GET['add'])){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // array([nome]=>'nome', [cpf]'cpf',
            // [telefone]=>'telefone', [endereco]=>'endereco', [email]=>'email', 
            // [senha]=>'senha')
            $data = $_POST; 
            $is_inserted = insert_client($conn, $data);
        }
        include('view/content/addClient.php');
    }
    
    if(isset($_GET['list'])){
        $clients = getClients($conn);
        include('view/content/listClient.php');
    }

    if(isset($_GET['del'])){
        $id = $_GET['del'];
        $del_client = del($conn, $id);

        $clients = getClients($conn);
        include('view/content/listClient.php');
    }
?>