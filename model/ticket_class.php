<?php

require_once('db_class.php');

class TicketQuery
{
    public $ticket_id;
    public $user_id;
    public $group_id;
    public $title;
    public $content;
    public $status;


    function __construct()
    {
        $this->db = new db;
    }


    public function selectTickets($user_id,$splitpage, $numpage)
    {
        if ($_SESSION["role"] == "Admin") {
            $list = [];
            $user_id = $_SESSION["user_id"];
            $result = self::selectUserGroup($user_id);
    
            foreach ($result as $row) {
                array_push($list, $row["group_id"]);
            }
    
            $group = "(".implode(",", $list).")";
            $query = "SELECT * FROM `tickets` WHERE `group_id` IN $group LIMIT $splitpage, $numpage";
            $list = $this->db->select($query);
            return $list;
        
        } else {
            $query = "SELECT * FROM `tickets` WHERE `user_id` = $user_id LIMIT $splitpage, $numpage";
            $list = $this->db->select($query);
            return $list;
        }
     
    }

    public function selectAllTickets($user_id)
    {
        if ($_SESSION["role"] == "Admin") {
            $list = [];
            $user_id = $_SESSION["user_id"];
            $result = self::selectUserGroup($user_id);
    
            foreach ($result as $row) {
                array_push($list, $row["group_id"]);
            }
    
            $group = "(".implode(",", $list).")";
            $query = "SELECT * FROM `tickets` WHERE `group_id` IN $group";
            $list = $this->db->select($query);
            return $list;
        
        } else {
            $query = "SELECT * FROM `tickets` WHERE `user_id` = $user_id";
            $list = $this->db->select($query);
            return $list;
        }
     
    }

 


    public function selectUserGroup($user_id)
    {
        if ($_SESSION["role"] == "Admin") {
            $query = "SELECT * FROM `users_groups`  WHERE `user_id` = $user_id";
            $list = $this->db->select($query);
            return $list;
        }
    }



    public function getSetTickets($ticket_id)
    {
        $query = "SELECT * FROM `tickets` WHERE `ticket_id` = $ticket_id";
        $list = $this->db->select($query);
        return $list;
    }



    public function selectTicketsStatus($user_id)
    {

        $status = ["Pending", "In-Progress", "Done", "Closed", "Cancelled"];
        $result = [];
        for ($i = 0; $i < count($status); $i++) {
            $stat = $status[$i];
            if ($_SESSION["role"] == "Admin") {
                $query = "SELECT * FROM `tickets` WHERE `status` = '$stat'";
            } else {
                $query = "SELECT * FROM `tickets` WHERE `status` = '$stat' AND `user_id` = $user_id";
            }
            $count = $this->db->select($query)->rowcount();
            array_push($result, $count);
        }
        return $result;
    }

    public function selectTicketsGroup($user_id)
    {
        $result = [];
        for ($i = 1; $i <= 5; $i++) {
            if ($_SESSION["role"] == "Admin") {
                $query = "SELECT * FROM `tickets` WHERE `group_id` = $i";
            } else {
                $query = "SELECT * FROM `tickets` WHERE `group_id` = $i AND `user_id` = $user_id";
            }
            $count = $this->db->select($query)->rowcount();
            array_push($result, $count);
        }
        return $result;
    }

    public function statistic($user_id)
    {
        $result = [];
        for ($i = 1; $i <= 5; $i++) {
            if ($_SESSION["role"] == "Admin") {
                $query = "SELECT * FROM `tickets` WHERE `group_id` = $i AND `status` = 'Done'";
            } else {
                $query = "SELECT * FROM `tickets` WHERE `group_id` = $i AND `status` = 'Done' AND `user_id` = $user_id";
            }
            $count = $this->db->select($query)->rowcount();
            array_push($result, $count);
        }
        return $result;
    }

    public function submit_ticket()
    {
        $data = [$this->user_id, $this->group_id, $this->title, $this->content];
        $query = "INSERT INTO `tickets`(`user_id`, `group_id`, `title`, `content`) VALUES (?,?,?,?)";
        $new_id = $this->db->insert($query, $data);
        return $new_id;
    }

    public function update_ticket()
    {
        $query = "UPDATE `tickets` SET `status`='$this->status' WHERE ticket_id = $this->ticket_id";
        $ticketupdate = $this->db->update($query);
        return $ticketupdate;
    }


}
