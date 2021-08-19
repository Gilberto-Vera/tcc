<?php

    include_once('model/client.php');
    
    $clients = getClients($conn);
    
    include('view/content/listClient.php');
    
?>