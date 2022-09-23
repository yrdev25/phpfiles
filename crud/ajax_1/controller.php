
<?php

include "model.php";

$obj = new User;
$row = $obj->select();

if(!isset($_POST['uid']) && !isset($_POST['uid'])){
 $id = $obj->insert($_POST['name'],$_POST['number'],$_POST['email'],$_POST['gender'],$_POST['city'],$_POST['address'],$_POST['hobbies'],$_POST['image']);
 $v = $obj->selectuser($id);
}

if(isset($_POST['did'])){
 $userobj->delete($_POST['did']);
}
?>


