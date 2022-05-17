<?php
require_once("../includes/functions.php");
require_once("../model/query_class.php");
require_once("login_controller.php");

Opera::sessionStart();

class UserController
{

    public function create_user()
    {
        $query = new Query;
        $ok = true;
        $errors = [];


        if (!isset($_POST["firstname"]) || $_POST["firstname"] === '') {
            $ok = false;
            array_push($errors, "First Name is Missing");
        } else {
            $query->firstname = htmlspecialchars($_POST["firstname"] ?? "", ENT_QUOTES);
        };

        if (!isset($_POST["lastname"]) || $_POST["lastname"] === '') {
            $ok = false;
            array_push($errors, "Last Name is Missing");
        } else {
            $query->lastname = htmlspecialchars($_POST["lastname"] ?? "", ENT_QUOTES);
        };



        if (!isset($_POST["password"]) || $_POST["password"] === '') {
            $ok = false;
            array_push($errors, "Invalid Password");
        } else {
            $password = $_POST["password"];
        };

        if (!isset($_POST["passwordvalidation"]) || $_POST["passwordvalidation"] === '') {
            $ok = false;
            array_push($errors, "Invalid Password");
        } else {
            $passwordvalidation = $_POST["passwordvalidation"];
        };

        if ($password == $passwordvalidation) {
            $query->hashpass = password_hash($password, PASSWORD_DEFAULT);
        } else {
            array_push($errors, "Password doesn't Match");
            $ok = false;
        }

        if (!isset($_POST["email"]) || $_POST["email"] === '') {
            $ok = false;
            array_push($errors, "Invalid Email Address");
        } else {
            $query->email = $_POST["email"];
        };


        if (isset($_POST["admin_create_user"]) == "admin_create_user") {

            if (!isset($_POST["emailvalidation"]) || $_POST["emailvalidation"] === '') {
                $ok = false;
                array_push($errors, "Invalid Email Address");
            } else {
                $emailvalidation = $_POST["emailvalidation"];
            };

            if (!isset($_POST["role"]) || $_POST["role"] === '') {
                $ok = false;
                array_push($errors, "Please Choose a Role");
            } else {
                $query->role = htmlspecialchars($_POST["role"] ?? "", ENT_QUOTES);
            };

            if (!isset($_POST["department"]) || $_POST["department"] === '') {
                $ok = false;
                array_push($errors, "Please Choose a Department");
            } else {
                $query->department = $_POST["department"];
            }

            if ($query->email == $emailvalidation) {
                $query->email = htmlspecialchars($_POST["email"] ?? "", ENT_QUOTES);
            } else {
                array_push($errors, "Email address doesn't Match");
                $ok = false;
            }
        }


        if ($ok) {
            if (isset($_POST["admin_create_user"]) == "admin_create_user") {
                $query->admin_create_user();
                header("location: ../view/users.php");
            } else {
                $new_id = $query->create_user();
                $logincon = new LoginController;
                $logincon->Autologin($new_id);
            }
        } else {
            $_SESSION["errors"] = $errors;
            if (isset($_POST["admin_create_user"]) == "admin_create_user") {
                header("location: ../view/users_create.php");
            } else {
              
                header("location: ../view/register.php");
            }
        }
    }
}