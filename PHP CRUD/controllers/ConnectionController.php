<?php


class ConnectionController
{
    public $conn;

    public function __construct()
    {
        $dbhost = "localhost";
        $dbuser = 'root';
        $dbpass = "";
        $dbname = "employee_management";

        $this->conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

        if (!$this->conn) {
            die("Connection Error: " . mysqli_connect_error());
        }
    }
}
