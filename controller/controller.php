<?php
require_once("users_create_controller.php");
require_once("login_controller.php");
$userController = new UserController;
$loginController = new LoginController;



if (isset($_POST["create_user"]) == "create_user") {
    $userController->create_user();
    header("location: ../view/users.php");
}

if (isset($_POST["create_user2"]) == "create_user2") {
    $userController->create_user2();
    header("location: ../view/index.php");
}


if (isset($_POST["login"]) == "login") {
    echo $loginController->login();
  
}

