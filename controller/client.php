<?php
    include_once('model/client.php');
    
    if(isset($_GET['add'])){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $data = $_POST;
            $is_inserted = insert_client($conn, $data);
        }
        include('view/content/add_client.php');
    }
    
    elseif(isset($_GET['list'])){
        $clients = list_clients($conn);
        include('view/content/list_client.php');
    }
    
    elseif(isset($_GET['del'])){
        $id = $_GET['del'];
        $del_client = del_client($conn, $id);

        $clients = list_clients($conn);
        include('view/content/list_client.php');
    }

    elseif(isset($_GET['edit'])){
        $client = edit_clients($conn, $_GET['edit']);
        include('view/content/edit_client.php');
    }

    ?>