<?php
require_once("../includes/functions.php");
require_once("../model/ticket_class.php");

Opera::sessionStart();

class TicketController
{

    public function submit_ticket()
    {

        $ticketQuery = new TicketQuery;
        $ok = true;

        if (!isset($_SESSION["user_id"])) {
            $ok = false;
        } else {
            $ticketQuery->user_id = $_SESSION["user_id"];
        };

        if (!isset($_POST["group_id"]) || $_POST["group_id"] === '') {
            $ok = false;
        } else {
            $ticketQuery->group_id = $_POST["group_id"];
        };

        if (!isset($_POST["title"]) || $_POST["title"] === '') {
            $ok = false;
        } else {
            $ticketQuery->title = $_POST["title"];
        };

        if (!isset($_POST["content"]) || $_POST["content"] === '') {
            $ok = false;
        } else {
            $ticketQuery->content = $_POST["content"];
        };

      

        if ($ok) {
            $ticketQuery->submit_ticket();
        }
    }
}
