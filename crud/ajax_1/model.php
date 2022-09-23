<?php

 include "database.php";

 class User extends Pdoconnection{

    public function insert($name,$number,$email,$gender,$city,$address,$hobbies,$image){

        try{

        $insert = "INSERT INTO users(`name`, `number`, `email`, `gender`, `city`, `address`, `hobbies`, `image`) VALUES (?,?,?,?,?,?,?,?)";
        $statement = $this->conn->prepare($insert);
        $statement->execute(array($name,$number,$email,$gender,$city,$address,$hobbies,$image));
        $last_id = $this->conn->lastInsertId();
        return $last_id;

        }catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
        }

    }
    

    public function select(){

      try{

          $select =  "SELECT * FROM users";
          $statement = $this->conn->prepare($select);
          $statement->execute();
          $users = $statement->fetchAll(PDO::FETCH_ASSOC);
          return $users;

        }catch(PDOException $e) {
          echo "Connection failed: " . $e->getMessage();
        }
    }

    public function delete($id){
    
      try{

          $delete = "DELETE FROM users WHERE id = ?";
          $statement = $this->conn->prepare($delete);     
          $statement->execute(array($id));
  
        }catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function update($name,$number,$email,$gender,$city,$address,$hobbies,$image,$id){

      try{

            $update = "UPDATE `users` SET `name`= ?,`number`= ?,`email`= ?,`gender`= ?,`city`=?,`address`= ?,`hobbies`= ?,`image`= ? WHERE id = ?";
            $statement = $this->conn->prepare($update);
            $statement->execute(array($name,$number,$email,$gender,$city,$address,$hobbies,$image,$id));

      }catch(PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
      }

    } 
    
    public function selectuser($id){

      try{

          $selectuser =  "SELECT * FROM users WHERE id = ?";
          $statement = $this->conn->prepare($selectuser);
          $statement->execute(array($id));
          $selectuser = $statement->fetch(PDO::FETCH_ASSOC);
          return $selectuser;

        }catch(PDOException $e) {
          echo "Connection failed: " . $e->getMessage();
        }
    }
    
   

}

    
//$usersobj = new Users;
//$usersobj->update('yasdh','1234567890','an@g.c','male','sidhpur','hfdsjkfh','redaing','hdskfj.png','2');
// $arr = $usersobj->select();
// echo "<pre>";
// print_r($arr);
// $usersobj->delete('1');

?> 