<?php

include "database.php";

	$id = $_GET['id'];

    if(isset($_POST['submit'])){
        $id = $_GET['id'];
     

  
 if(move_uploaded_file($_FILES["image"]["tmp_name"], $upload_dir)){
       echo "<script>alert('file uploaded successfully')</script>";
    }
     
      if($_POST['name'] == ''){
          $nameerr = "Name field is empty";
          $flag = 0;
      }else{
        $flag = 1;
      }

      if($_POST['contact'] == ''){
          $contacterr = "Contact field is empty";
          $flag = 0;
      }else{
        $flag = 1;
      }

      if($_POST['email'] == ''){
          $emailerr = "Email field is empty";
          $flag = 0;
      }else{
        $flag = 1;
      }

      if($_POST['gender'] == ''){
          $gendererr = "Gender field is empty";
          $flag = 0;
      }else{
        $flag = 1;
      }

      if($_POST['city'] == ''){
          $cityerr = "City field is empty";
          $flag = 0;
      }else{
        $flag = 1;
      }

      if($_POST['address'] == ''){
          $addresserr = "Address field is empty";
          $flag = 0;
      }else{
        $flag = 1;
      }

      if($_FILES['image']['name'] == ''){
          $imageerr = "Image field is empty";
          $flag = 0;
      }elseif(pathinfo($_FILES['image']['name'],PATHINFO_EXTENSION) != "jpg" || "jpeg" || "png"){
          $imageerr = "Uploaded file is not an image";
          $flage = 0;
      }else{
        $flag = 1;
      }

      //extension


      if($flag == 1){

      $name = $_POST['name'];
      $contact = $_POST['contact'];
      $email = $_POST['email'];
      $gender = $_POST['gender'];
      $city = $_POST['city'];
      $address = $_POST['address'];

      if($_POST['hobbies'] == ""){
             $hobbies_str = "No hobbies selected";
      }else{
        $hobbies_arr = $_POST['hobbies'];
        // exit();

     // print_r($_POST['hobbies']);
     $hobbies_str = implode(",",$hobbies_arr);
      }

     // echo "<img src='.$_SERVER['DOCUMENT_ROOT'].$_FILES["image"]["tmp_name"].'/>";
       // print_r($_FILES['image']['path']);
      $image = $_FILES["image"]["name"];

      $update = "UPDATE `users` SET `name`= ?,`number`= ?,`email`= ?,`gender`= ?,`city`=?,`address`= ?,`hobbies`= ?,`image`= ? WHERE id = ?";
      $statement = $conn->prepare($update);
  
  
   
      $statement->execute(array($name,$contact,$email,$gender,$city,$address,$hobbies_str,$image,$id));
  
      // if($statement == TRUE){
      //   die(1);
      // }else{
      //     die(0);
      // }
  
      header('location:index.php');


     }
       
     }

     $selectuser = $conn->prepare("SELECT * FROM users WHERE id = ?");
      $selectuser->execute(array($id));
      $result = $selectuser->fetchAll(PDO::FETCH_ASSOC);

      foreach($result as $user){

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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <style>
  	span{
  		color : red;
  	}
  </style>  
</head>
<body>
   <div class="container">
    
   <form action="" id="form" method="post" enctype="multipart/form-data">

        <div class="mb-3 mt-3">
         <label for="name" class="form-label">Name:</label>
         <input type="name" class="form-control" id="name" placeholder="Enter name" name="name" value="<?php echo $user['name'] ?>">
         <span id="nameid"><?php echo $nameerr; ?></span>
        </div>

        <div class="mb-1 mt-1">
         <label for="contact" class="form-label">Contact:</label>
         <input type="contact" class="form-control" id="contact" placeholder="Enter contact" name="contact" value="<?php echo $user['number'] ?>">
         <span id="contactid"><?php echo $contacterr; ?></span>
        </div>

        <div class="mb-1 mt-1">
         <label for="email" class="form-label">Email:</label>
         <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="<?php echo $user['email'] ?>">
         <span id="emailid"><?php echo $emailerr; ?></span>
        </div>

        <div class="mb-1 mt-1">
            Gender:
            <div class="form-check">
              <input type="radio" class="form-check-input" id="male" name="gender" value="male">Male
              <label class="form-check-label" for="male"></label>
            </div>
            <div class="form-check">
              <input type="radio" class="form-check-input" id="female" name="gender" value="female">Female
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
                </select>
         <span id="cityid"><?php echo $cityerr; ?></span>
        </div>

        <div class="mb-1 mt-1">
    
          <label for="address">Address:</label>
          <textarea class="form-control" rows="5" name="address" id="address"><?php echo $user['address'] ?></textarea>
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
            
            <div class="mb-1 mt-1">
              <input type="file" name="image" id="image">
              <span id="imageid"><?php echo $imageerr; ?></span>
            </div>  

        </div>  

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>

    </form>

<?php } ?>

<script>
    $(document).ready(function(){
      
        $('#form').submit(function(e){
        e.preventDefault();
 
        var name = $('#name').val();
        var contact = $('#contact').val();
        var email = $('#email').val();
        var gender = $('input[type=radio]').is(':checked'); 
       
        var city = $('#city').val();
        var address = $('#address').val();
        var image = $('#image').val();
        var extension = image.replace(/^.*\./, '');

       console.log(name);
       console.log(contact);
       console.log(email);
       console.log(gender);
       console.log(city);
       console.log(address);
       console.log(image);



        if(name == ""){
          $('span#nameid').html('Name is required');
        }

        if(contact == ""){
          $('span#contactid').html('Contact is required');
        }

        if(email == ""){
          $('span#emailid').html('Email is required');
        }

        if(gender == false){
          $('span#genderid').html('Gender is required');
        }

        if(city == ""){
          $('span#cityid').html('City is required');
        }

        if(address == ""){
          $('span#addressid').html('Address is required');
        }

        if(image == ""){
          $('span#imageid').html('Image is required');
        }

        if(image != "" && extension != "png" || "jpg" || "jpeg"){
          $('span#imageid').html('File uploaded must be an image');
        }




        });

    });
</script>   





