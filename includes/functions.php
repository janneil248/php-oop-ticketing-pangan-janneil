<?php
require_once("../model/query_class.php");
require_once("../model/ticket_class.php");
require_once("../controller/login_controller.php");

class Opera
{

    public static function sessionStart(){
        if(!isset($_SESSION)){
            session_start();
        }
    }

    public static function sessionContinue(){
        if(isset($_SESSION["email"])){
            session_start();
            header("location: ../view/index.php");
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

    public static function showTickets($user_id){
        $ticketquery = new TicketQuery;
        if($_SESSION["role"] == "Admin"){
            return $ticketquery->selectAllTickets();
        } else {
            return $ticketquery->selectTickets($user_id);
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

    public static function getTicketStatus($status)
    {
        if ($status == "Pending") {
            return '<span class="badge bg-light text-dark">Pending</span>';
        } elseif ($status == "In-Progress") {
            return '<span class="badge bg-primary text-white">In-Progress</span>';
        } elseif ($status == "Done") {
            return '<span class="badge bg-success text-white">Done</span>';
        } elseif ($status == "Closed") {
            return '<span class="badge bg-info text-white">Closed</span>';
        } elseif ($status == "Cancelled") {
            return '<span class="badge bg-secondary text-light">Cancelled</span>';
        } else {
            return "N/A";
        }
    }
}
