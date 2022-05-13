<?php
require_once("../model/query_class.php");


class UserController
{

    public function create_user()
    {   
        $query = new Query;
        $ok = true;
        if (!isset($_POST["role"]) || $_POST["role"] === '') {
            $ok = false;
        } else {
            $query->role = htmlspecialchars($_POST["role"] ?? "", ENT_QUOTES);
        };

        if (!isset($_POST["department"]) || $_POST["department"] === '') {
            $ok = false;
        } else {
            $query->department = implode(" ", $_POST["department"]);
        }

        if (!isset($_POST["firstname"]) || $_POST["firstname"] === '') {
            $ok = false;
        } else {
            $query->firstname = htmlspecialchars($_POST["firstname"] ?? "", ENT_QUOTES);
        };

        if (!isset($_POST["lastname"]) || $_POST["lastname"] === '') {
            $ok = false;
        } else {
            $query->lastname = htmlspecialchars($_POST["lastname"] ?? "", ENT_QUOTES);
        };

        if (!isset($_POST["email"]) || $_POST["email"] === '') {
            $ok = false;
        } else {
            $email = $_POST["email"];
        };

        if (!isset($_POST["emailvalidation"]) || $_POST["emailvalidation"] === '') {
            $ok = false;
        } else {
            $emailvalidation = $_POST["emailvalidation"];
        };

        if (!isset($_POST["password"]) || $_POST["password"] === '') {
            $ok = false;
        } else {
            $password = $_POST["password"];
        };

        if (!isset($_POST["passwordvalidation"]) || $_POST["passwordvalidation"] === '') {
            $ok = false;
        } else {
            $passwordvalidation = $_POST["passwordvalidation"];
        };

        if ($password == $passwordvalidation) {
            $query->hashpass = password_hash($password, PASSWORD_DEFAULT);
        } else {
            echo "pass not match";
            $ok = false;
        }

        if ($email == $emailvalidation) {
            $query->email = htmlspecialchars($_POST["email"] ?? "", ENT_QUOTES);
        }else{
            echo "email not match";
            $ok = false;
        }

        if ($ok) {
            $query->create_user();
        }
    }


    public function create_user2()
    {   
        $query = new Query;
        $ok = true;

        if (!isset($_POST["firstname"]) || $_POST["firstname"] === '') {
            $ok = false;
        } else {
            $query->firstname = htmlspecialchars($_POST["firstname"] ?? "", ENT_QUOTES);
        };

        if (!isset($_POST["lastname"]) || $_POST["lastname"] === '') {
            $ok = false;
        } else {
            $query->lastname = htmlspecialchars($_POST["lastname"] ?? "", ENT_QUOTES);
        };

        if (!isset($_POST["email"]) || $_POST["email"] === '') {
            $ok = false;
        } else {
            $query->email = htmlspecialchars($_POST["email"] ?? "", ENT_QUOTES);
        };

    
        if (!isset($_POST["password"]) || $_POST["password"] === '') {
            $ok = false;
        } else {
            $password = $_POST["password"];
        };

        if (!isset($_POST["passwordvalidation"]) || $_POST["passwordvalidation"] === '') {
            $ok = false;
        } else {
            $passwordvalidation = $_POST["passwordvalidation"];
        };

        if ($password == $passwordvalidation) {
            $query->hashpass = password_hash($password, PASSWORD_DEFAULT);
        } else {
            echo "pass not match";
            $ok = false;
        }

     


        if ($ok) {

            $query->create_user2();
        }
    }
}
