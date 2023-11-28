<?php

namespace App;

class Authentication {
     public function isUserLoggedIn() : bool
    {
        session_start();
        if(!isset($_SESSION["session_user"])){
            session_write_close();
            return false;
        } else {
            session_write_close();
            return true;
        }
        
    }

    public function logOutUser()
    {
        session_start();
        $_SESSION = array();
        session_destroy();
        header("location:index.php");
    }
}