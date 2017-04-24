<?php

/**
 * Created by PhpStorm.
 * User: bchaca
 * Date: 20.04.2017
 * Time: 13:54
 */
class Account
{

    public static function getUsername() {
        return (!empty($_SESSION['user'])) ? $_SESSION['user']->username : "";
    }
    public static function getUserid(){
        return(!empty($_SESSION['user'])) ? $_SESSION['user']->id:"";
    }

    public static function isLoggedIn() {
        return (!empty($_SESSION['user'])) ? true : false;
    }


}