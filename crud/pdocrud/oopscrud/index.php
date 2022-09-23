<?php

  include "model.php";

  //$upload_dir = $_SERVER['DOCUMENT_ROOT']."/crud/oopscrud/uploads";
 //die($upload_dir);

  $userobj = new Users;
  $userrecords = $userobj->select();

  $nameerr = $numbererr = $emailerr = $gendererr = $cityerr = $addresserr = $imageerr = '';
  $userrecord['name'] = $userrecord['number'] = $userrecord['email'] = $userrecord['city'] = $userrecord['address'] = $userrecord['$image'] = '';
  
  if(isset($_GET['id'])){

	if($_GET['action'] == 'update'){
	$userrecord = $userobj->selectuser($_GET['id']);
	// echo $userrecord['id'];
	// print_r($userrecord);
	// die();
	}

  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registration Form</title>
	 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <style>
  	span{
  		color : red;
  	}
  </style>
</head>
<body>
<div class="container">
    
	<form action="controller.php" id="form" method="post" enctype="multipart/form-data">

	<?php 
		if(isset($_GET['id'])){

			
	?>		

			<input type="hidden" name="uid" value="<?php echo $_GET['id'] ?>">
    <?php
			}
	?>		


       <div class="mb-3 mt-3">
         <label for="name" class="form-label">Name:</label>
         <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" value="<?php echo $userrecord['name'] ?>">
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
				<?php if($userrecord['city'] != NULL){ ?> 
							<option value="<?php echo $userrecord['city'] ?>"><?php echo $userrecord['city'] ?></a>
						<?php }else{ ?>
			    			<option value="">Please Select City</a>
					 	<?php } ?>
			       			<option value="mehsana">Mehsana</a>
			       			<option value="ahmedabad">Ahmedabad</a>
			       			<option value="surat">Surat</a>
			    </select><br>
         <span id="cityid"><?php echo $cityerr; ?></span>
  		</div>

  		<div class="mb-1 mt-1">
   	
		  <label for="address">Address:</label>
		  <textarea class="form-control" id="address" rows="5" name="address"><?php echo $userrecord['address']?></textarea>
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
			      <input type="checkbox" class="form-check-input" id="check2" name="hobbies[]" value="websurfing">
			      <label class="form-check-label" for="check2">Web Surfing</label>
			</div>
            
            <div class="mb-1 mt-3">
			  <input type="file" name="image" id="image"/><br>
			  <span id="imageid"><?php echo $imageerr; ?></span>
			</div>  

    	</div>	

  		<button type="submit" name="submit" class="btn btn-primary mt-3">Submit</button>

	</form>

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
					<td><a class="btn btn-success" href="index.php?id=<?php echo $user['id'];?>&action=update">Update</a></td>
					<td><form action="controller.php" method="post" enctype="multipart/form-data"><input type="hidden" name="did" value="<?php echo $user['id'] ?>"><button type="submit" name="submit" class="btn btn-warning">Delete</button></form></td>
					
				</tr>
		<?php } ?>
		
	</table>	


</div>  

</body>
</html>