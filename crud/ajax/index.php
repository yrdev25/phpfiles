<?php
    include "model.php"; 
    $nameerr = $numbererr = $emailerr = $gendererr = $cityerr = $addresserr = $imageerr = '';
    $userrecord['name'] = $userrecord['number'] = $userrecord['email'] = $userrecord['city'] = $userrecord['address'] = $userrecord['$image'] = '';
    $obj = new Users;
    $userrecords = $obj->select();

    // print_r($_GET['uid']);

    if(isset($_GET['uid'])){
        // die($_GET['uid']);

        // print_r($_GET['uid']);
        $userrecord = $obj->selectuser($_GET['uid']);

        // print_r($userrecord);
        
    
      }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registration Form</title>
	 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js">
  </script>
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js" integrity="sha512-2rNj2KJ+D8s1ceNasTIex6z4HWyOnEYLVC3FigGOmyQCZc2eBXKgOxQmo3oKLHyfcj53uz4QMsRCWNbLd32Q1g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <style>
  	span{
  		color : red;
  	}
  </style>
</head>
<body>
    <div class="container">
    
        <form action="" id="form" method="post" enctype="multipart/form-data">

        <?php 
		if(isset($_GET['uid'])){			
        ?>		
                <input type="hidden" class="uid" name="uid" value="<?php echo $_GET['uid'] ?>">
        <?php
            }
        ?>	

            <div class="mb-3 mt-3">
                <label for="name" class="form-label">Name:</label>
                <input type="name" class="form-control" id="name" placeholder="Enter name" name="name" value="<?php echo $userrecord['name'] ?>">
                <span id="nameid"><?php echo $nameerr; ?></span>
                </div>

                <div class="mb-1 mt-1">
                <label for="number" class="form-label">number:</label>
                <input type="text" class="form-control" id="number" placeholder="Enter number" name="number" value="<?php echo $userrecord['number'] ?>">
                <span id="numberid"><?php echo $numbererr; ?></span>
                </div>

                <div class="mb-1 mt-1">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="<?php echo $userrecord['email'] ?>">
                <span id="emailid"><?php echo $emailerr; ?></span>
                </div>

                <div class="mb-1 mt-1">
                    Gender:
                    <div class="form-check">
                    <input type="radio" class="form-check-input gender" id="male" name="gender" value="male">Male
                    <label class="form-check-label" for="male"></label>
                    </div>
                    <div class="form-check">
                    <input type="radio" class="form-check-input gender" id="female" name="gender" value="female">Female
                    <label class="form-check-label" for="female"></label>
                    </div>
                    <span id="genderid"><?php echo $gendererr; ?></span>
                </div>

                <div class="mb-1 mt-3">
                <label for="city" class="form-label">City:</label>

                        <select name="city" id="city">
                            <option value="">Please Select City</a>
                        <option value="mehsana">Mehsana</a>
                        <option value="ahmedabad">Ahmedabad</a>
                        <option value="surat">Surat</a>
                        </select><br>
                <span id="cityid"><?php echo $cityerr; ?></span>
                </div>

                <div class="mb-1 mt-1">
            
                <label for="address">Address:</label>
                <textarea class="form-control" id="address" rows="5" name="address"><?php echo $userrecord['address'] ?></textarea>
                <span id="addressid"><?php echo $addresserr; ?></span>
                </div>

                <div class="mb-1 mt-3">
                Hobbies:

                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="check1" name="hobbies[]" value="reading">
                        <label class="form-check-label" for="check1">Reading</label>
                    </div>

                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="check2" name="hobbies[]" value="writing">
                        <label class="form-check-label" for="check2">Writing</label>
                    </div>

                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="check3" name="hobbies[]" value="websurfing">
                        <label class="form-check-label" for="check2">Web Surfing</label>
                    </div>
                    
                <div class="mb-1 mt-3">
                    <input type="file" name="image" id="image"><br>
                    <span id="imageid"><?php echo $imageerr; ?></span>
                    </div>  

                </div>
                
              <?php  if(isset($_GET['uid'])){ ?>
                <button type="submit" id="updateform" class="btn btn-success mt-3">Update</button>
              <?php  }else{ ?>

                <button type="submit" id="submit" name="submit" class="btn btn-primary mt-3">Submit</button>
                <?php } ?>

        </form>

        <button class="btn btn-info" id="updatedata">Data</button>

        <table class="table table-bordered mt-5 table-dark table-striped">
		<tr>
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
		<?php foreach($userrecords as $user){ ?>
			<tr>
					<td><?php echo $user['name'] ?></td>
					<td><?php echo $user['number'] ?></td>
					<td><?php echo $user['email'] ?></td>
					<td><?php echo $user['gender'] ?></td>
					<td><?php echo $user['city'] ?></td>
					<td><?php echo $user['address'] ?></td>
					<td><?php echo $user['hobbies'] ?></td>
					<td><?php echo $user['image'] ?></td>
					<td><form action="" method="post" enctype="multipart/form-data"><input type="hidden" name="uid" id="uid" value="<?php echo $user['id'] ?>"><button type="submit" id="update" class="btn btn-success">Update</button></form></td>
					<td><form action="" method="post" enctype="multipart/form-data"><input type="hidden" name="did" id="did" value="<?php echo $user['id'] ?>"><button type="submit" id="delete" name="submit" class="btn btn-warning">Delete</button></form></td>
					
				</tr>
		<?php } ?>
		
	</table>	


    </div>
<script>

   $(document).ready(function(){

    $('#updatedata').click(function(e){
        e.preventDefault();
        $select = "select";
        $.ajax({
            url : "index.php",
            method : "post",
            data : { select : $select},
            success : function(data){
                
            }
        });
    });
        
    
   
    // $var = new Array();
    // $var.push('1');
    // $var.push('2');
    // $s = $var.toString();
    
   
     

            $('#form').submit(function(e){

                e.preventDefault();

                $name = $('#name').val();
                $number = $('#number').val();
                $email = $('#email').val();
                $gender = $('input:radio[name=gender]:checked').val();
                $city = $('#city').val();
                $address = $('#address').val();
                $hobbies_arr = new Array();
                $('input[type=checkbox]').each(function(){
                    $hobbies_arr.push(this.value);
                });
                if($hobbies_arr != ""){
                    $hobbies_str = $hobbies_arr.toString();  
                }else{
                    $hobbies_str = "No hobbies selected";
                }       
                $image = $('#image').val();

                $.ajax({
                    url : 'controller.php',
                    method : 'POST',
                    data :  {
                                name : $name,
                                number : $number,
                                email : $email,
                                gender : $gender,
                                city : $city,
                                address : $address,
                                hobbies : $hobbies_str,
                                image : $image                           
                            },
                    success : function(){
                              alert('Data Inserted Successfully');
                    }        
                });
              select();  
            });

           

            $('#delete').click(function(e){
                 e.preventDefault();
                $did = $('input#did').val();
                console.log($did);

                $.ajax({
                    url : 'controller.php',
                    method : 'POST',
                    data : { did : $did },
                    success : function(data){
                          console.log('delete');
                                             
                        }
                    });
          
            });

            $('#update').click(function(e){
                 e.preventDefault();
                $uid = $('input#uid').val();
                

                $.ajax({
                    url : 'index.php',
                    method : 'GET',
                    data : { uid : $uid },
                    success : function(data){
                          $('#form').html(data);                   
                        }
                    });

                  
            
                    

            });

            $('#updateform').click(function(e){

                e.preventDefault();
                $uid = $('.uid').val();
                $name = $('#name').val();
                $number = $('#number').val();
                $email = $('#email').val();
                $gender = $('input:radio[name=gender]:checked').val();
                $city = $('#city').val();
                $address = $('#address').val();
                $hobbies_arr = new Array();
                $('input[type=checkbox]').each(function(){
                $hobbies_arr.push(this.value);
                });
                if($hobbies_arr != ""){
                $hobbies_str = $hobbies_arr.toString();  
                }else{
                $hobbies_str = "No hobbies selected";
                }       
                $image = $('#image').val();

                $.ajax({
                url : 'controller.php',
                method : 'POST',
                data :  {
                            name : $name,
                            number : $number,
                            email : $email,
                            gender : $gender,
                            city : $city,
                            address : $address,
                            hobbies : $hobbies_str,
                            image : $image,
                            uid : $uid                           
                        },
                success : function(){
                        alert('Data Updated Successfully');
                }        
                }); 
             
            });  
            



    });



</script>    
   