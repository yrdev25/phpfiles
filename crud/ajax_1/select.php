<?php
include "model.php";

$obj = new User;

$row = $obj->select();
         ?>
        <table class="table table-bordered mt-5 table-dark table-striped">

            <tr id="rowid">
                <th>Name</th>
                <th>Number</th>
                <th>Email</th>
                <th>Gender</th>
                <th>City</th>
                <th>Address</th>
                <th>Hobbies</th>
                <th>Image</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>

       

         <?php
            foreach($row as $v){ 
         ?>
        <tr>
            <td><?php echo $v['name'] ?></td>
            <td><?php echo $v['number'] ?></td>
            <td><?php echo $v['email'] ?></td>
            <td><?php echo $v['gender'] ?></td>
            <td><?php echo $v['city'] ?></td>
            <td><?php echo $v['address'] ?></td>
            <td><?php echo $v['hobbies'] ?></td>
            <td><?php echo $v['image'] ?></td>
            <td><input type="hidden" name="uid" value="<?php echo $v['id'] ?>"><button id="update" class="btn btn-success">Update</button></td>
            <td><input type="hidden" name="did" value="<?php echo $v['id'] ?>"><button id="delete" class="btn btn-warning">Delete</button></td>				
        </tr>

        <?php 
            }                       // print_r($obj->select());                       // exit();
         ?>

        </table> 