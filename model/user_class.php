<?php

require_once('db_class.php');

class UserQuery
{

    public $role = "";
    public $department = [];
    public $firstname = "";
    public $lastname = "";
    public $email = "";
    public $hashpass = "";




    function __construct()
    {
        $this->db = new db;
    }

    public function checkuser()
    {
        $query = "SELECT * FROM `users` WHERE `email` = '$this->email'";
        $list = $this->db->select($query);
        return $list;
    }

    public function checklogin($user_id)
    {
        $query = "SELECT * FROM `users` WHERE `user_id` = '$user_id'";
        $list = $this->db->select($query);
        return $list;
    }


    public function selectUsers($splitpage, $numpage)
    {
        $query = "SELECT * FROM `users` LIMIT $splitpage, $numpage";
        $list = $this->db->select($query);
        return $list;
    }
    public function selectAllUsers()
    {
        $query = "SELECT * FROM `users`";
        $list = $this->db->select($query);
        return $list;
    }

    public function selectUsersGroups()
    {
        $query = "SELECT * FROM `users_groups`";
        $list = $this->db->select($query);
        return $list;
    }

    public function showUsersGroups($user_id)
    {
        $query = "SELECT * FROM `users_groups` WHERE `user_id` = '$user_id'";
        $list = $this->db->select($query);
        return $list;
    }


    public function admin_create_user()
    {
        $data = [$this->firstname, $this->lastname, $this->email, $this->hashpass, $this->role];
        $query = "INSERT INTO `users`(`first_name`, `last_name`, `email`, `password`, `role_id`) VALUES (?,?,?,?,?)";
        $new_id = $this->db->insert($query, $data);
        // return $new_id;
        for ($i = 0; $i < count($this->department); $i++) {
            $data = [$new_id, $this->department[$i]];
            $query = "INSERT INTO `users_groups`(`user_id`, `group_id`) VALUES (?,?)";
            $this->db->insert($query, $data);
        }
        $queryset = "INSERT INTO `settings`(`user_id`) VALUES (?)";
        $this->db->insert($queryset, [$new_id]);
    }

    public function create_user()
    {
        $data = [$this->firstname, $this->lastname, $this->email, $this->hashpass];
        $query = "INSERT INTO `users`(`first_name`, `last_name`, `email`, `password`) VALUES (?,?,?,?)";
        $new_id = $this->db->insert($query, $data);
        
        $queryset = "INSERT INTO `settings`(`user_id`) VALUES (?)";
        $this->db->insert($queryset, [$new_id]);
        return $new_id;
    }
    public function update_userpass($user_id)
    {
        $query = "UPDATE `users` SET `role_id`= '$this->role', `first_name`= '$this->firstname',`last_name`='$this->lastname',`email`='$this->email',`password`= '$this->hashpass' WHERE `user_id` = '$user_id'";
        $new_id = $this->db->update($query);
        return $new_id;
    }
    public function update_user($user_id)
    {
        $query = "UPDATE `users` SET `role_id`= '$this->role',`first_name`= '$this->firstname',`last_name`='$this->lastname',`email`='$this->email'  WHERE `user_id` = '$user_id '";
        $new_id = $this->db->update($query);
        return $new_id;
    }
    public function delete_usergroup($user_id)
    {
        $deletequery = "DELETE FROM `users_groups` WHERE `user_id` = '$user_id'";
        $this->db->delete($deletequery);
        for ($i = 0; $i < count($this->department); $i++) {
            $data = [$user_id, $this->department[$i]];
            $query = "INSERT INTO `users_groups`(`user_id`, `group_id`) VALUES (?,?)";
            $this->db->insert($query, $data);
        }
    }
}
