<?php

include "model.php";

$userobj = new Users;
if(isset($_POST['select'])){
$userobj->select();
}

if(!isset($_POST['uid']) && !isset($_POST['did'])){
$userobj->insert($_POST['name'],$_POST['number'],$_POST['email'],$_POST['gender'],$_POST['city'],$_POST['address'],$_POST['hobbies'],$_POST['image']);
}

if(isset($_POST['did'])){
$userobj->delete($_POST['did']);
}

if(isset($_POST['uid'])){
$userobj->update($_POST['name'],$_POST['number'],$_POST['email'],$_POST['gender'],$_POST['city'],$_POST['address'],$_POST['hobbies'],$_POST['image'],$_POST['uid']);
}
   
 


?>

