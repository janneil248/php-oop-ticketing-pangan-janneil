<?php
require_once("users_create_controller.php");
require_once("login_controller.php");

Opera::sessionStart();

$userController = new UserController;
$loginController = new LoginController;


if (isset($_POST["login"]) == "login") {
    $loginController->login();
}


if (isset($_POST["logout"]) == "logout") {
    $loginController->logout();  
}


if (isset($_POST["admin_create_user"]) == "admin_create_user") {
    $userController->admin_create_user();
    // var_dump($test);
    header("location: ../view/users.php");
}


if (isset($_POST["create_user"]) == "create_user") {
    $userController->create_user();
    header("location: ../view/index.php");
}



