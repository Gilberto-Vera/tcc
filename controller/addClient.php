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
    }
    include('view/content/addClient.php');
    
?>