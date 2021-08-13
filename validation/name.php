<?php
    function valdidateName($name){
        if (!preg_match('/^[a-zA-Z0-9\s]+$/', $name)) {
            return false;
        }
        return true;
    }
?>