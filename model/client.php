<?php
  function insert_client($conn, $datas){
    foreach ($datas as $key => $data) {
        $res = pg_insert($conn, 'pessoa' , $data);
        if ($res) {
          $is_inserted = true;

        } else {
          $is_inserted = false;	
        }
    }
    return $is_inserted;
  }
  function getClients($conn) {
    $sql = "SELECT * from pessoa";
    
    $result = pg_query($conn,$sql);
    if (!$result) {
        echo "Ocorreu um erro.\n";
        exit;
    }
    $clients = pg_fetch_all($result);
    
    return $clients;
  }
?>