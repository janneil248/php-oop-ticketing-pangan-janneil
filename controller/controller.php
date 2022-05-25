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
}


if (isset($_POST["submit_ticket"]) == "submit_ticket") {
    $ticketController->submit_ticket();
}

if (isset($_POST["update"]) == "update") {
    $ticketController->update_ticket();
}

if (isset($_POST["page_settings"]) == "page_settings") {
    $settingController->submit_pagesetting();
}
