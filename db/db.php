<?php

class Connection{

    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $base = "dbform";
    private $conn = "";

    public function __construct()
    {
        $this->conn = mysqli_connect($this->host , $this->user , $this->pass)or die ("Connect error DB".mysqli_error($this->conn));
        mysqli_select_db($this->conn, $this->base) or die ("connect error" .mysqli_error($this->conn));
    }
    public function getConn()
    {
        return $this->conn;
    }
}