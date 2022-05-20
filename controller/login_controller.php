<?php
require_once("../includes/functions.php");
require_once("../model/user_class.php");
Opera::sessionStart();

class LoginController
{

    public function login()
    {
        Opera::sessionStart();
        if (isset($_SESSION['error'])) {
            unset($_SESSION['error']);
        }
        $query = new UserQuery;

        $query->email = trim($_POST["email"]);
        $result = $query->checkuser();
        $row = $result->fetch(PDO::FETCH_OBJ);

        if ($result != null) {
            $hash = $row->password;
            if (password_verify($_POST["password"], $hash)) {
                $_SESSION['user_id'] = $row->user_id;
                $_SESSION['email'] = $row->email;
                $_SESSION['role'] = Opera::roleAssign($row->role_id);
                header("location: ../view/index.php");
            } else {
                header("location: ../view/login.php?error=Invalid Credentials");
            }
        } else {
        }
    }

    public function Autologin($new_id)
    {
        Opera::sessionStart();
        $query = new UserQuery;

        if (isset($_SESSION['error'])) {
            unset($_SESSION['error']);
        }

        $result = $query->checklogin($new_id);
        $row = $result->fetch(PDO::FETCH_OBJ);

        if ($result != null) {
            $_SESSION['user_id'] = $row->user_id;
            $_SESSION['email'] = $row->email;
            $_SESSION['role'] = Opera::roleAssign($row->role_id);
            header("location: ../view/index.php");
        } else {
            header("location: ../view/login.php");
        }
    }


    public function logout()
    {
        session_unset();
        session_destroy();
        header("location: ../view/login.php");
    }
}
