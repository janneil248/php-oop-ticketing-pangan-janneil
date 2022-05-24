<?php
require_once("../includes/functions.php");
require_once("../model/user_class.php");
require_once("login_controller.php");

Opera::sessionStart();

class UserController
{

    public function create_user()
    {
        Opera::sessionStart();
        $query = new UserQuery;
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

        $result = $query->checkuser();
        $row = $result->fetch(PDO::FETCH_OBJ);

        if ($row->email == $query->email) {
            $ok = false;
            array_push($errors, "Email Already Exist");
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
            unset($_SESSION['errors']);

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


    public function update_user()
    {

        $query = new UserQuery;

        $ok = true;
        $errors = [];
        $user_id = $_SESSION["user_id"];
        $group = [];
        $groupinfo = $query->showUsersGroups($user_id);
        foreach ($groupinfo as $info) {
            array_push($group, $info["group_id"]);
        }


        if (!isset($_POST["role"]) || $_POST["role"] === '') {
            $ok = false;
            array_push($errors, "Please Choose a Role");
        } else {
            $query->role = htmlspecialchars($_POST["role"] ?? "", ENT_QUOTES);
        };

        if (!isset($_POST["department"]) || $_POST["department"] === '') {
            if ($_SESSION["role"] == "Admin") {
                $ok = false;
                array_push($errors, " No Department");
            } else {
                $query->department = null;
            }
        } else {
            $query->department = $_POST["department"];
        }

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


        if (!isset($_POST["email"]) || $_POST["email"] === '') {
            $ok = false;
            array_push($errors, "Invalid Email Address");
        } else {
            $email = $_POST["email"];
        };


        if (!isset($_POST["emailvalidation"]) || $_POST["emailvalidation"] === '') {
            $ok = false;
            array_push($errors, "Invalid Email Address");
        } else {
            $emailvalidation = $_POST["emailvalidation"];
        };

        if ($email == $emailvalidation) {
            $query->email = htmlspecialchars($_POST["email"] ?? "", ENT_QUOTES);
        } else {
            array_push($errors, "Email doesn't Match");
            $ok = false;
        }
  
        if (isset($_POST["password"]) || $_POST["password"] === '') {
            $password = $_POST["password"];
            $passwordvalidation = $_POST["passwordvalidation"];
            if ($password != $passwordvalidation) {
                array_push($errors, "Password doesn't Match");
                $ok = false;
            }}

        if ($ok) {
            if (!isset($_POST["password"]) || $_POST["password"] === '') {
                $query->update_user($user_id);

                if ($query->department != $group || $query->department != null) {
                    $query->delete_usergroup($user_id);
                }
                unset($_SESSION["errors"]);
                header("location: ../view/accountsettings.php?success=Update Successfully");
            } else {
                $password = $_POST["password"];
                $passwordvalidation = $_POST["passwordvalidation"];
                if ($password == $passwordvalidation) {
                    $query->hashpass = password_hash($password, PASSWORD_DEFAULT);
                    $query->update_userpass($user_id);

                    if ($query->department != $group || $query->department != null) {
                        $query->delete_usergroup($user_id);
                    }
                    unset($_SESSION["errors"]);
                    header("location: ../view/accountsettings.php?success=Update Successfully");
                } else {
                }
            }
        } else {
            $_SESSION["errors"] = $errors;
            header("location: ../view/accountsettings.php");
        }
    }
}
