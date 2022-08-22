<?php

require_once('db_class.php');

class SettingQuery
{
    public $user_id;
    public $web_name;
    public $page;
    public $language;


    function __construct()
    {
        $this->db = new db;
    }


    public function selectSetting($user_id)
    {
        $query = "SELECT * FROM `settings` WHERE `user_id` =$user_id";
        $list = $this->db->select($query);
        return $list;
    }

    public function submit_pagesetting()
    {
        $data = [$this->user_id, $this->web_name, $this->page, $this->language];
        $query = "INSERT INTO `settings`(`user_id`, `web_name`, `page`, `language`) VALUES (?,?,?,?)";
        $new_id = $this->db->insert($query, $data);
        return $new_id;
    }

    public function update_pagesetting()
    {
        $query = "UPDATE `settings` SET `web_name`='$this->web_name',`page`= '$this->page',`language`='$this->language' WHERE `user_id` = '$this->user_id'";
        $ticketupdate = $this->db->update($query);
        return $ticketupdate;
    }
}
