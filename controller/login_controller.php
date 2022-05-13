<?php
require_once("../model/query_class.php");

class LoginController
{



    public function login()
    {
        $query = new Query;
        

    $query->email = trim($_POST["email"]);
    $result = $query->checklogin();
    $row = $result->fetch(PDO::FETCH_OBJ);

    if($result != null){
        $hash = $row->password;
        if(password_verify($_POST["password"], $hash)){
            $_SESSION['email'] = $row->email;
            $_SESSION['role'] = $row->role;
            header("location: ../view/index.php");
          
        } else {
            header("location: ../view/login.php");
        }
    }else{      
        echo "login";
    }

    }


}
