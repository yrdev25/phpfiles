<?php

include "model.php";

$userobj = new Users;

if(isset($_POST['submit'])){
 
    if(isset($_POST['uid'])){
        // die('update');
        if($_POST['hobbies'] == NULL){
            $hobbies_str = "No hobbies selected";
        }
        $uid = $_POST['uid'];
        $hobbies_str = implode(",",$_POST['hobbies']) ; 
        $userobj->update($_POST['name'],$_POST['number'],$_POST['email'],$_POST['gender'],$_POST['city'],$_POST['address'],$hobbies_str,$_FILES['image']['name'],$uid);
        header('location:index.php');

    }elseif(isset($_POST['did'])){
        // die('delete');
        
        $did = $_POST['did'];
        // die($did);
        $userobj->delete($did);
        
        header('location:index.php');

    }else{
        // die('insert');
        if($_POST['hobbies'] == NULL){
            $hobbies_str = "No hobbies selected";
        }
        $hobbies_str = implode(",",$_POST['hobbies']) ; 
        $userobj->insert($_POST['name'],$_POST['number'],$_POST['email'],$_POST['gender'],$_POST['city'],$_POST['address'],$hobbies_str,$_FILES['image']['name']);
        header('location:index.php');
    }
    die('error');

}




?>