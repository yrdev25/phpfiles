<?php

include "database.php";


class User extends Database{

    public function insert($table,$array){

        $insert='INSERT INTO `'.$table.'` (`'.implode('`, `',array_keys($array)).'`) VALUES ("' . implode('", "', $array) . '")';
        if($this->conn->query($insert) == TRUE){
           echo "<script>alert('Data inserted')</script>";
        }
    }

    public function select($table,$id = "",$order = "",$limit = ""){

        $select = 'SELECT * FROM `'.$table.'`';

        if($id != ""){
        	$select .= ' WHERE id = '.$id;
		}
        if($order != ""){
        	$select .= ' ORDER BY '.$order;
		}
        if($limit != ""){
        	$select .= ' LIMIT '.$limit;
		}
        //die($select);
        $result = $this->conn->query($select);
        $row = $result->fetch_all(MYSQLI_ASSOC); 
        return $row;    
       
    }

    public function delete($table,$id){

        $delete = 'DELETE FROM `'.$table.'` WHERE id = '.$id.'';
       // die($delete);
        if($this->conn->query($delete) == TRUE){
            echo "<script>alert('Data deleted')</script>";
        }
    }

    public function update($table,$array,$id){
      
        foreach($array as $k => $v){
            
            $update_arr[]=$k.'="'.$v.'"';
        }

        $update = 'UPDATE '.$table.' SET '.implode(',',$update_arr).' WHERE id = '.$id;

       // die($update);
        if($this->conn->query($update) == TRUE){
            echo "<script>alert('Data updated')</script>";
        }
    }

}  

//--------INSERT-----------//

//  $table = 'users';
// $array = array(
//      'name' => 'update',
//      'number' => '9998697366',
//      'email' => 'update@g.com',
//      'gender' => 'female',
//      'city' => 'ahmd',
//      'address' => 'update',
//      'hobbies' => 'update',
//       'image' => 'update.png'
// );

// $obj = new User;
// $obj->insert($table,$array);
//--------------------------//

//--------SELECT-----------//

//  $obj = new User;
// $row = $obj->select('users',3);
//  echo "<pre>";
//  print_r($row);

// foreach($row as $k => $v){
//       echo $v['id'];
// }

//--------------------------//

//--------DELETE-----------//

// $obj = new User;
// $id = '2';
// $obj->delete('users',$id);
//--------------------------//

//--------UPDATE-----------//

//$obj->update($table,$array,3);

//--------------------------//


