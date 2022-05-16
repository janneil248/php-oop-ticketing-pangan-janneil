<?php
require_once("../model/query_class.php");

class Opera
{

    public static function sessionStart(){
        if(!isset($_SESSION)){
            session_start();
        }
    }

    public static function roleAccess(){
        if(!isset($_SESSION["role"])){
            header("location: ../view/login.php");
        } 
    }

    public static function roleAdmin(){
        if($_SESSION["role"] != "Admin"){
            header("location: ../view/index.php");
        } 
    }


    public static function roleAssign($role_id)
    {
        if ($role_id == 1) {
            return "Admin";
        } elseif ($role_id == 2) {
            return "User";
        } else {
            return "No Role";
        }
    }

    public static function getUsersGroups($group_id)
    {
        if ($group_id == 1) {
            return '<span class="badge badge-primary">HR</span>';
        } elseif ($group_id == 2) {
            return '<span class="badge badge-secondary">IT</span>';
        } elseif ($group_id == 3) {
            return '<span class="badge badge-success">Marketing</span>';
        } elseif ($group_id == 4) {
            return '<span class="badge badge-danger">Maintenance</span>';
        } elseif ($group_id == 5) {
            return '<span class="badge badge-warning">Housekeeping</span>';
        } else {
            return "N/A";
        }
    }
}
