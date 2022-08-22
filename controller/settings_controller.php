<?php
require_once("../includes/functions.php");
require_once("../model/setting_class.php");

Opera::sessionStart();

class SettingController
{

    public function submit_pagesetting()
    {

        $settingQuery = new SettingQuery;
        $ok = true;

        if (!isset($_SESSION["user_id"])) {
            $ok = false;
        } else {
            $settingQuery->user_id = $_SESSION["user_id"];
        };

        if (!isset($_POST["web_name"]) || $_POST["web_name"] === '') {
            $ok = false;
        } else {
            $settingQuery->web_name = $_POST["web_name"];
        };

        if (!isset($_POST["page"]) || $_POST["page"] === '') {
            $ok = false;
        } else {
            $settingQuery->page = $_POST["page"];
        };

        if (!isset($_POST["language"]) || $_POST["language"] === '') {
            $ok = false;
        } else {
            $settingQuery->language = $_POST["language"];
        };

      

        if ($ok) {
            $settingQuery->update_pagesetting();
            header("location: ../view/pagesettings.php?success=Update Successful!");

           
        }
    }
}
