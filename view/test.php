<?php
require_once("../model/user_class.php");
require_once("../model/ticket_class.php");
require_once("../model/setting_class.php");
require_once("../controller/login_controller.php");
// require_once("../includes/functions.php");
// require_once("../model/ticket_class.php");
// $user_id = $_SESSION["user_id"];
// $tickets = Opera::showTickets($user_id);
// var_dump(Opera::previousNext($user_id));
// // session_start();
       echo $_SESSION['email'];
       echo $_SESSION['role'];
    //    unset($_SESSION['errors'])
    // if (isset($_SESSION['errors'])) {
    //     unset($_SESSION['errors']);
    // } 
    unset($_SESSION["errors"]);
       var_dump($_SESSION['errors']);
//        echo "<br>";
//        $user_id = $_SESSION["user_id"];
//         // var_dump(Opera::pagination($user_id));

// $query = new UserQuery;
// $query->email = "janneil@gmail.com";
// $result = $query->checkuser()->rowcount();
// var_dump($result);
