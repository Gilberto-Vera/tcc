<?php
    function valdidatePassword($password){
        if (strlen($password) < 6) {
            return false;
        }
        return true;
    }
?>