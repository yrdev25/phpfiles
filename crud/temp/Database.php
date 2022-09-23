<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class Database{

    private $server = 'localhost';
    private $user = "root";
    private $pass = "root";
    private $db = "oopscrud";
    protected $conn;

    public function __construct(){

        $this->conn = new mysqli($this->server,$this->user,$this->pass,$this->db);
        
        if($this->conn->error){
            echo $this->conn->error;
        }
    }
}
?>