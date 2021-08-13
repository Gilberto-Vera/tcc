<?php
    function validationLogin($username, $conn, $password){
        $res = pg_query($conn,("Select * from pessoa where nome='$username' and senha='$password'"));
        return $res;
    }
?>