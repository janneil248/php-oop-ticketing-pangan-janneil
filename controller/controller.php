<?php
require_once("users_create_controller.php");
require_once("ticket_controller.php");
require_once("login_controller.php");

Opera::sessionStart();

$userController = new UserController;
$ticketController = new TicketController;
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


if (isset($_POST["submit_ticket"]) == "submit_ticket") {
    $ticketController->submit_ticket();
    header("location: ../view/tickets.php");
}



