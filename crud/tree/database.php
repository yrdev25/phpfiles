<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$server = 'localhost';
$user = "root";
$pass = "root";
$db = "familytree";

   mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

   $conn = new mysqli($server,$user,$pass,$db);
   
   if($conn->error){
       echo $conn->error;
   }