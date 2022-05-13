<?php

require_once('db_class.php');

class Query
{

    public $role = "";
    public $department = "";
    public $firstname = "";
    public $lastname = "";
    public $email = "";
    public $hashpass = "";
    

    function __construct()
    {
        $this->db = new db;
    }

    public function checklogin()
    {
        $query = "SELECT * FROM `users` WHERE `email` = '$this->email'";
        $list = $this->db->select($query);
        return $list;
    }

    public function selectUsers()
    {
        $query = "SELECT * FROM `users`";
        $list = $this->db->select($query);
        return $list;
    }
 

    public function create_user()
    {
        $data = [$this->firstname,$this->lastname,$this->email,$this->hashpass,$this->role,$this->department];
        $query = "INSERT INTO `users`(`first_name`, `last_name`, `email`, `password`, `role`, `department`) VALUES (?,?,?,?,?,?)";
        $new_id = $this->db->insert($query,$data);
        return $new_id;
    }

    public function create_user2()
    {
        $data = [$this->firstname,$this->lastname,$this->email,$this->hashpass];
        $query = "INSERT INTO `users`(`first_name`, `last_name`, `email`, `password`) VALUES (?,?,?,?)";
        $new_id = $this->db->insert($query,$data);
        return $new_id;
    }

    public function complete($id)
    {
        $query = "UPDATE `todo` SET `status`='1' WHERE id = $id";
        $taskComplete = $this->db->update($query);
        return $taskComplete;
    }

   
}
