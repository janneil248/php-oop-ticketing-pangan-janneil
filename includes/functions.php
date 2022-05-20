<?php
require_once("../model/user_class.php");
require_once("../model/ticket_class.php");
require_once("../model/setting_class.php");
require_once("../controller/login_controller.php");


class Opera
{

    public static function sessionStart()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
    }

    public static function sessionContinue()
    {
        if (isset($_SESSION["email"])) {
            session_start();
            header("location: ../view/index.php");
        }
    }

    public static function roleAccess()
    {
        if (!isset($_SESSION["role"])) {
            header("location: ../view/login.php");
        }
    }

    public static function roleAdmin()
    {
        if ($_SESSION["role"] != "Admin") {
            header("location: ../view/index.php");
        }
    }


    public static function showTickets($user_id)
    {
        $ticketquery = new TicketQuery;
        $numpage = self::showSettings($user_id)->page;
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $splitpage = ($page - 1) * $numpage;
        return $ticketquery->selectTickets($user_id, $splitpage, $numpage);
    }
    public static function showAllTickets($user_id)
    {
        $ticketquery = new TicketQuery;
        return $ticketquery->selectAllTickets($user_id);
    }

    public static function selectTicketsStatus($user_id)
    {
        $ticketquery = new TicketQuery;
        return $ticketquery->selectTicketsStatus($user_id);
    }

    public static function getSetTickets($ticket_id)
    {
        $ticketQuery = new TicketQuery;
        $result = $ticketQuery->getSetTickets($ticket_id);
        return $result->fetch(PDO::FETCH_OBJ);
    }

    public static function showUsers($user_id)
    {
        $userQuery = new UserQuery;
        $numpage = self::showSettings($user_id)->page;
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $splitpage = ($page - 1) * $numpage;
        return  $userQuery->selectUsers($splitpage, $numpage);
    }
    public static function showAllUsers($user_id)
    {
        $userQuery = new UserQuery;
        return  $userQuery->selectAllUsers();
    }

    public static function selectUsersGroups()
    {
        $userQuery = new UserQuery;
        return $userQuery->selectUsersGroups();
    }

    public static function showSettings($user_id)
    {
        $settingQuery = new SettingQuery;
        $list = $settingQuery->selectSetting($user_id);
        return $list->fetch(PDO::FETCH_OBJ);
    }

    public static function showAccountInfo($user_id)
    {
        $userQuery = new UserQuery;
        $list = $userQuery->checklogin($user_id);
        return $list->fetch(PDO::FETCH_OBJ);
    }

    public static function showUsersGroups($user_id)
    {
        $userQuery = new UserQuery;
        return $userQuery->showUsersGroups($user_id);
    }

    public static function checkGroup($user_id)
    {
        $groupinfo = self::showUsersGroups($user_id);
        $group = [];
        foreach ($groupinfo as $info) {
            array_push($group, $info["group_id"]);
        }
        return $group;
    }

    public static function checkexistingGroup($user_id){
        $new_group = self::checkGroup($user_id);
    }

    static function pagination($user_id, $count)
    {
        $numpage = self::showSettings($user_id)->page;
        $limit = ceil($count / $numpage);
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $previous = ($page <= 1) ? $page : $page - 1;
        $next = ($page >= $limit) ? $limit : $page + 1;
        return [$previous, $next, $limit];
    }


    public static function roleAssign($role_id)
    {
        if ($role_id == 1) {
            return "Admin";
        } elseif ($role_id == 2) {
            return "User";
        } else {
            return "No Role";
        }
    }

    public static function getUsersGroups($group_id)
    {
        if ($group_id == 1) {
            return '<span class="badge badge-primary">HR</span>';
        } elseif ($group_id == 2) {
            return '<span class="badge badge-secondary">IT</span>';
        } elseif ($group_id == 3) {
            return '<span class="badge badge-success">Marketing</span>';
        } elseif ($group_id == 4) {
            return '<span class="badge badge-danger">Maintenance</span>';
        } elseif ($group_id == 5) {
            return '<span class="badge badge-warning">Housekeeping</span>';
        } else {
            return "N/A";
        }
    }

    public static function getTicketStatus($status)
    {
        if ($status == "Pending") {
            return '<span class="badge bg-light text-dark">Pending</span>';
        } elseif ($status == "In-Progress") {
            return '<span class="badge bg-primary text-white">In-Progress</span>';
        } elseif ($status == "Done") {
            return '<span class="badge bg-success text-white">Done</span>';
        } elseif ($status == "Closed") {
            return '<span class="badge bg-info text-white">Closed</span>';
        } elseif ($status == "Cancelled") {
            return '<span class="badge bg-secondary text-light">Cancelled</span>';
        } else {
            return "N/A";
        }
    }

    public static function getGroupPercentage()
    {
        $result = [];
        $user_id = $_SESSION["user_id"];
        $ticketquery = new TicketQuery;
        $stats = $ticketquery->statistic($user_id);
        $ticketGroup = $ticketquery->selectTicketsGroup($user_id);

        for ($i = 0; $i < 5; $i++) {
            if ($ticketGroup[$i] == 0) {
                array_push($result, 0);
            } else {
                $res = 100 * ($stats[$i] / $ticketGroup[$i]);
                array_push($result, $res);
            }
        }
        return $result;
    }
}
