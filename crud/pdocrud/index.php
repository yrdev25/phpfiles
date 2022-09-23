<?php
   include "database.php";
//die('here');
  $nameerr = $contacterr = $emailerr = $gendererr = $cityerr = $addresserr = $imageerr = '';

   if(isset($_POST['submit'])){
    print_r($_POST['submit']);
    die();
   	
   	// echo('dir = '.basename (dirname($_SERVER['PHP_SELF']),"/"));

   	$upload_dir = $_SERVER['DOCUMENT_ROOT'] . "../uploads/";
   	 // $upload_dir = "../uploads/";
   	  //die($upload_dir);

			// if ( is_writable($upload_dir)) {
			//     die('hey');
			// } else {
			//     echo 'Upload directory is not writable, or does not exist.';
			// }

   // 	$target_dir = ".../uploads/";
   //  $target_file = $target_dir . basename($_FILES["image"]["name"]);
   // var_dump($FILES['image']);

    //die();


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


     


     
     $insert = "INSERT INTO users(`name`, `number`, `email`, `gender`, `city`, `address`, `hobbies`, `image`) VALUES (?,?,?,?,?,?,?,?)";
     $statement = $conn->prepare($insert);


 
      $statement->execute(array($name,$contact,$email,$gender,$city,$address,$hobbies_str,$image));

      }
    
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
         <input type="name" class="form-control" id="name" placeholder="Enter name" name="name">
         <span id="nameid"><?php echo $nameerr; ?></span>
  		</div>

  		<div class="mb-1 mt-1">
         <label for="contact" class="form-label">Contact:</label>
         <input type="contact" class="form-control" id="contact" placeholder="Enter contact" name="contact">
         <span id="contactid"><?php echo $contacterr; ?></span>
  		</div>

  		<div class="mb-1 mt-1">
         <label for="email" class="form-label">Email:</label>
         <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
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
		  <textarea class="form-control" id="address" rows="5" name="address"></textarea>
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
			  <input type="file" name="image" id="image"><br>
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
<?php
      $sql = "SELECT COUNT(*) FROM users";
      $result = mysqli_query($conn, $sql) or trigger_error("SQL", E_USER_ERROR);
      print_r($result);
      echo '<br>';
      $r = mysqli_fetch_row($result);
      print_r($r);
     
      $numrows = $r[0];
      $rowsperpage = 5;
// find out total pages
$totalpages = ceil($numrows / $rowsperpage);
if (isset($_GET['currentpage']) && is_numeric($_GET['currentpage'])) {
  // cast var as int
  $currentpage = (int) $_GET['currentpage'];
} else {
  // default page num
  $currentpage = 1;
} 

if ($currentpage > $totalpages) {
  // set current page to last page
  $currentpage = $totalpages;
} // end if
// if current page is less than first page...
if ($currentpage < 1) {
  // set current page to first page
  $currentpage = 1;
}

$offset = ($currentpage - 1) * $rowsperpage;

$sql = "SELECT id, name FROM users LIMIT {$offset}, {$rowsperpage}";
$result = mysqli_query($conn, $sql) or trigger_error("SQL", E_USER_ERROR);

// while there are rows to be fetched...
while ($list = mysqli_fetch_assoc($result)) {
   // echo data
   echo $list['id'] . " : " . $list['name'] . "<br />";
}
$range = 3; // end while

      // $select = $conn->prepare("SELECT * FROM users");
      // $select->execute();
      // $re = $select->fetchAll(PDO::FETCH_ASSOC);
      // print_r($result);
      if ($currentpage > 1) {
        // show << link to go back to page 1
        echo " <a href='{$_SERVER['PHP_SELF']}?currentpage=1'><<</a> ";
        // get previous page num
        $prevpage = $currentpage - 1;
        // show < link to go back to 1 page
        echo " <a href='{$_SERVER['PHP_SELF']}?currentpage=$prevpage'><</a> ";
     } // end if 

     for ($x = ($currentpage - $range); $x < (($currentpage + $range)  + 1); $x++) {
      // if it's a valid page number...
      if (($x > 0) && ($x <= $totalpages)) {
         // if we're on current page...
         if ($x == $currentpage) {
            // 'highlight' it but don't make a link
            echo " [<b>$x</b>] ";
         // if not current page...
         } else {
            // make it a link
            echo " <a href='{$_SERVER['PHP_SELF']}?currentpage=$x'>$x</a> ";
         } // end else
      } // end if 
   } // end for

   if ($currentpage != $totalpages) {
    // get next page
    $nextpage = $currentpage + 1;
     // echo forward link for next page 
    echo " <a href='{$_SERVER['PHP_SELF']}?currentpage=$nextpage'>></a> ";
    // echo forward link for lastpage
    echo " <a href='{$_SERVER['PHP_SELF']}?currentpage=$totalpages'>>></a> ";
 } // end if
 /****** end build pagination links ******/

      foreach($r as $user){
?>
      <tr>
			<td><?php echo $user['name'] ?></td>
			<td><?php echo $user['number'] ?></td>
			<td><?php echo $user['email'] ?></td>
			<td><?php echo $user['gender'] ?></td>
			<td><?php echo $user['city'] ?></td>
			<td><?php echo $user['address'] ?></td>
			<td><?php echo $user['hobbies'] ?></td>
			<td><?php echo $user['image'] ?></td>
			<td><a class="btn btn-success" href="update.php?id=<?php echo $user['id'];?>">Update</a></td>
			<td><a class="btn btn-warning" href="delete.php?id=<?php echo $user['id'];?>">Delete</a></td>
		</tr>
		<?php } ?>
		
	</table>	

   </div>



</body>
</html>

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



