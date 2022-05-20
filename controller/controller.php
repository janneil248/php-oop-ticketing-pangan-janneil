<?php
require_once("users_create_controller.php");
require_once("ticket_controller.php");
require_once("login_controller.php");
require_once("settings_controller.php");


Opera::sessionStart();

$userController = new UserController;
$ticketController = new TicketController;
$loginController = new LoginController;
$settingController = new SettingController;


if (isset($_POST["login"]) == "login") {
    $loginController->login();
}


if (isset($_POST["logout"]) == "logout") {
    $loginController->logout();
}


if (isset($_POST["admin_create_user"]) == "admin_create_user") {
    $userController->create_user();
}


if (isset($_POST["create_user"]) == "create_user") {
    $userController->create_user();
}

if (isset($_POST["update_user"]) == "update_user") {
    $userController->update_user(); 
    

    // $query = new UserQuery;
    // $ok = true;
    // $errors = [];
    // $user_id = $_SESSION["user_id"];
    // $email = "";
    // $emailvalidation = "";
    // $group = [];
    // $groupinfo = $query->showUsersGroups($user_id);
    // foreach ($groupinfo as $info) {
    //     array_push($group, $info["group_id"]);
    // }


    // if (!isset($_POST["role"]) || $_POST["role"] === '') {
    //     $ok = false;
    //     array_push($errors, "Please Choose a Role");
    // } else {
    //     $query->role = htmlspecialchars($_POST["role"] ?? "", ENT_QUOTES);
    // };

    // if (!isset($_POST["department"]) || $_POST["department"] === '') {
    //     $ok = false;
    // } else {
    //     $query->department = $_POST["department"];
    // }

    // if (!isset($_POST["firstname"]) || $_POST["firstname"] === '') {
    //     $ok = false;
    //     array_push($errors, "First Name is Missing");
    // } else {
    //     $query->firstname = htmlspecialchars($_POST["firstname"] ?? "", ENT_QUOTES);
    // };

    // if (!isset($_POST["lastname"]) || $_POST["lastname"] === '') {
    //     $ok = false;
    //     array_push($errors, "Last Name is Missing");
    // } else {
    //     $query->lastname = htmlspecialchars($_POST["lastname"] ?? "", ENT_QUOTES);
    // };

    // if (!isset($_POST["email"]) || $_POST["email"] === '') {
    //     $ok = false;
    //     array_push($errors, "Invalid Email Address");
    // } else {
    //     $email = $_POST["email"];
    // };

    // if (!isset($_POST["emailvalidation"]) || $_POST["emailvalidation"] === '') {
    //     $ok = false;
    //     array_push($errors, "Invalid Email Address");
    // } else {
    //     $emailvalidation = $_POST["emailvalidation"];
    // };

    
    // if ($email == $emailvalidation) {
    //     $query->email = htmlspecialchars($_POST["email"] ?? "", ENT_QUOTES);
    // } else {
    //     array_push($errors, "Email address doesn't Match");
    //     $ok = false;
    // }

    // echo $email;
    // echo $emailvalidation;
    // if ($email == $emailvalidation) {
    //     $query->email = $_POST["email"];
    //     echo " ".$query->email;
    // }else{
    //     echo "test";
    // }
   




}


if (isset($_POST["submit_ticket"]) == "submit_ticket") {
    $ticketController->submit_ticket();
}

if (isset($_POST["update"]) == "update") {
    $ticketController->update_ticket();
}

if (isset($_POST["page_settings"]) == "page_settings") {
    echo $settingController->submit_pagesetting();
}
