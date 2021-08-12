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
?>