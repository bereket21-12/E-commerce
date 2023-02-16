<?php

class DBConnection {
    
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "E-commerce3";
    private $conn;

    public function __construct() {
        $this->conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);
        if (!$this->conn) {
            die("Connection failed: " . mysqli_connect_error());
        // echo "not connected";

        }
        // echo "connected";
    }

    public function getConnection() {
        return $this->conn;
    }
}

