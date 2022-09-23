<?php 

include "model.php";

$obj = new User;
$table = 'users';

if(isset($_POST['submit'])){

    if(isset($_POST['did'])){

       $obj->delete($table,$_POST['did']);
       header('location:index.php');

    }elseif(isset($_POST['uid'])){


        if($_POST['hobbies'] == NULL){
            $hobbies_str = "No hobbies selected";
        }else{
            $hobbies_str = implode(",",$_POST['hobbies']) ;
        }     

            $array = array(
            'name' => $_POST['name'],
            'number' => $_POST['number'],
            'email' => $_POST['email'],
            'gender' => $_POST['gender'],
            'city' => $_POST['city'],
            'address' => $_POST['address'],
            'hobbies' => $hobbies_str,
            'image' => $_FILES['image']['name']
            );

        $obj->update($table,$array,$_POST['uid']);
        header('location:index.php');

    }else{

        if($_POST['hobbies'] == NULL){
            $hobbies_str = "No hobbies selected";
        }else{
            $hobbies_str = implode(",",$_POST['hobbies']) ;
        } 

            $array = array(
            'name' => $_POST['name'],
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