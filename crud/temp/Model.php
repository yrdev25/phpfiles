<?php

include "Database.php";


class User extends Database{

    public function insert($table,$array){

        $sql='INSERT INTO `'.$table.'` (`'.implode('`, `',array_keys($array)).'`) VALUES ("' . implode('", "', $array) . '")';
        if($this->conn->query($sql) == TRUE){
           echo "<script>alert('Data inserted')</script>";
        }
    }

    public function delete($table,$id){

        $sql = 'DELETE FROM `'.$table.'` WHERE id =`'.$id.'`';
        if($this->conn->query($sql) == TRUE){
            echo "<script>alert('Data deleted')</script>";
        }        
    }

    public function select($table){

        $sql = 'SELECT * FROM `'.$table.'`';
        //die($sql);
        
        if($this->conn->query($sql) == TRUE){
            $result = $this->conn->query($sql);
            return $result->fetch_object();
        } 
        
    }

}

// $table = 'users';
// $array = array(
//      'name' => 'yash',
//      'number' => '9998697366',
//      'email' => 'insert@g.com',
//      'gender' => 'male',
//      'city' => 'mehsna',
//      'address' => 'chfsdkjh',
//      'hobbies' => 'reading',
//       'image' => 'yash.png'
// );

// $obj = new User;
// $obj->delete($table,'3');


?>