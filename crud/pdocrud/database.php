<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// $servername = "localhost";
// $username = "root";
// $password = "root";

// try {
//   $conn = new PDO("mysql:host=$servername;dbname=pdocrud", $username, $password);
//   // set the PDO error mode to exception
//   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
// } catch(PDOException $e) {
//   echo "Connection failed: " . $e->getMessage();
// }

 $server = 'localhost';
 $user = "root";
 $pass = "root";
 $db = "oopscrud";


// public function __construct(){
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    $conn = new mysqli($server,$user,$pass,$db);
    
    if($conn->error){
        echo $conn->error;
    }
// }
?>