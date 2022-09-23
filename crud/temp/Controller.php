<?php
 
 include "Model.php";

  $obj = new User;
  $table = 'users';


  $result = $obj->select($table);
  print_r($result);
//   $obj->delete($table,'3');

  if(isset($_POST['submit'])){
      
   if(isset($_POST['did'])){

    $obj->delete($table,$_POST['did']);
   
   }
   
   if(isset($_POST['uid'])){
     die('update');
   }
   
   else{
    $hobbies_str = implode('-',$_POST['hobbies']);
    $array = array('name' => $_POST['name'],
                   'number' => $_POST['number'],
                   'email' => $_POST['email'],
                   'gender' => $_POST['gender'],
                   'city' => $_POST['city'],
                   'address' => $_POST['address'],
                   'hobbies' => $hobbies_str,
                   'image' => $_FILES['image']['name']
                  );
    $obj->insert($table,$array);
    header('location:index.php');
   
    }
   


  }