<?php

session_start();

class SM{

    static function isLoggedIn():bool
    {
        if(array_key_exists('ili',$_SESSION) && $_SESSION['ili'] === true)
            return true;

        return false;
    }

    static function setLoggedIn($id){
        $_SESSION['ili'] = true;
        $_SESSION['id'] = $id;
    }
}

?>