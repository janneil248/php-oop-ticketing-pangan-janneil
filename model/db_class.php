<?php

require_once('../includes/config.php');

class db
{

    private $host;
    private $dbName;
    private $user;
    private $pass;
    private $con;

    function __construct()
    {
        $this->host = DB_HOST;
        $this->dbName = DB_NAME;
        $this->user = DB_USER;
        $this->pass = DB_PASS;
    }

    public function connect()
    {
        try {
            $con = new PDO("mysql:host=$this->host;dbname=$this->dbName", $this->user, $this->pass);
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "Connected Successfully";
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        $this->con = $con;
    }

    public function select($query)
    {
        $this->connect();
        $result = $this->con->query($query);
        return $result;
    }

    public function insert($query,$data)
    {
        $this->connect();
        $sql = $this->con->prepare($query);
        $result = $sql->execute($data);

        $newId = null;
        if ($result) {
            $newId = $this->con->lastInsertId();
        }

        return $newId;
    }

 
}
