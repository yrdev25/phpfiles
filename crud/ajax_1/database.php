<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


class Pdoconnection{
  private $servername ;
  private $dbname;
  private $username ;
  private $password ;
  protected $conn;
   
    public function __construct(){

      $this->servername = 'localhost';
      $this->dbname = 'oopscrud';
      $this->username = 'root';
      $this->password = 'root';
      
      try {
        $this->conn = new PDO("mysql:host={$this->servername};dbname={$this->dbname}", $this->username, $this->password);
        // set the PDO error mode to exception
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo "jd";
  // exit;        
          } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
          }
        }

}

