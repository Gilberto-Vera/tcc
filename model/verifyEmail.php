<?php
    function verifyEmail($email, $conn){
        $res = pg_query($conn,("Select * from pessoa where email='$email'"));
        return $res;
    }
?>