<?php
class Session 
{

    public static function init(){
        session_start();
   
    }

    public static function set($key,$val){
        $_SESSION[$key]=$val;
    }


    public static function get($key){
       if (isset($_SESSION[$key])) {
           return $_SESSION[$key];
       }else{
           return false;
       }
    }


    public static function checksession(){
        self::init();
        if (self::get("login")==false) {
            self::distroy();
            header("Location:login.php");
            # code...
        }

    }

    public static function checkLogin(){
        self::init();
        if (self::get("login")==true) {
            self::distroy();
            header("Location:index.php");
            # code...
        }

    }

    public static function distroy(){
        session_destroy();
        header("Location:login.php");
    }
    

}

?>