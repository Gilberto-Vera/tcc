<?php
    function validationLogin($conn, $username, $password){
        $res = pg_query($conn,("SELECT id, nome FROM pessoa WHERE nome='$username' AND senha='$password'"));
        return $res;
    }
?>