<?php

class ConnectionFactory {
    
    public function __construct() {
    }
     
    public static function connect() {

        $dbname = "gamesite";
        $dbhost = "localhost";
        $dbuser = "root";
        $dbpassword = "mysql2022";
        try {
            $connection = new PDO("mysql:host=$dbhost;dbname=$dbname;charset=utf8", $dbuser, $dbpassword);
        }
        catch(PDOException $e) {
            die($e->getMessage());
        }
        return $connection;
    }
     
    public static function disconnect($conn) {
        $this->connection = $conn;
    }

}
