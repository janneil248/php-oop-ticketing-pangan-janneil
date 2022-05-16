<?php

require_once('db_class.php');

class TicketQuery
{
    public $user_id;
    public $group_id;
    public $title;
    public $content;
    

    function __construct()
    {
        $this->db = new db;
    }



    public function selectTickets($user_id)
    {
        $query = "SELECT * FROM `tickets` WHERE `user_id` = $user_id";
        $list = $this->db->select($query);
        return $list;
    }

    public function selectAllTickets()
    {
        $query = "SELECT * FROM `tickets`";
        $list = $this->db->select($query);
        return $list;
    }



    public function submit_ticket()
   {
        $data = [$this->user_id,$this->group_id,$this->title,$this->content];
        $query = "INSERT INTO `tickets`(`user_id`, `group_id`, `title`, `content`) VALUES (?,?,?,?)";
        $new_id = $this->db->insert($query,$data);
        return $new_id;
    }

    // public function update_ticket($ticket_id)
    // {
    //     $query = "UPDATE `tickets` SET `status`='Pendin' WHERE ticket_id = $ticket_id";
    //     $ticketupdate = $this->db->update($query);
    //     return $ticketupdate;
    // }
   
}
