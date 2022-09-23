<?php
include "model.php";


$userrecord['name'] = $userrecord['number'] = $userrecord['email'] = "";
$userrecord['gender'] = $userrecord['city'] = $userrecord['address'] = "";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js">
    </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js" integrity="sha512-2rNj2KJ+D8s1ceNasTIex6z4HWyOnEYLVC3FigGOmyQCZc2eBXKgOxQmo3oKLHyfcj53uz4QMsRCWNbLd32Q1g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>
    <div class="container">

                <div class="mb-3 mt-3">

                    <div class="mb-1 mt-1">
                    <label for="name" class="form-label">Name:</label>
                    <input type="name" class="form-control" id="name" placeholder="Enter name" name="name" value="<?php echo $userrecord['name'] ?>">                        
                    </div>

                    <div class="mb-1 mt-1">
                    <label for="number" class="form-label">number:</label>
                    <input type="text" class="form-control" id="number" placeholder="Enter number" name="number" value="<?php echo $userrecord['number'] ?>">                            
                    </div>

                    <div class="mb-1 mt-1">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="<?php echo $userrecord['email'] ?>">                                
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
                    </div>

                    <div class="mb-1 mt-3">
                    <label for="city" class="form-label">City:</label>
                            <select name="city" id="city">
                            <option value="">Please Select City</a>
                            <option value="mehsana">Mehsana</a>
                            <option value="ahmedabad">Ahmedabad</a>
                            <option value="surat">Surat</a>
                            </select><br>                
                    </div>

                    <div class="mb-1 mt-1">                           
                    <label for="address">Address:</label>
                    <textarea class="form-control" id="address" rows="5" name="address"><?php echo $userrecord['address'] ?></textarea>                           
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

                    </div>    
                                    
                    <div class="mb-1 mt-3">
                        <input type="file" name="image" id="image"><br>
                    </div> 
                    
                    <div class="mb-1 mt-3">
                        <button type="submit" id="submit" name="submit" class="btn btn-primary mt-3">Submit</button>
                    </div> 

                </div>

                <div id="tableid"></div>
  
    </div>                    

</body>
</html>    
<script>
    $(document).ready(function(){
        fetch();
       
         function fetch(){
            $.ajax({
             url : "select.php",
             data : "get",
             success : function(data){
                console.log(data);
                $('#tableid').html(data);
            }
          });
        }

        $('#submit').click(function(){
            
            var name = $('#name').val();
            var number = $('#number').val();
            var email = $('#email').val();
            var gender = $('input:radio[name=gender]:checked').val();
            var city = $('#city').val();
            var address = $('#address').val();

            var hobbies_arr = new Array();
                $('input[type=checkbox]:checked').each(function(){ 
                    hobbies_arr.push(this.value);               
                });
                    if(hobbies_arr == ""){
                        var hobbies = "No hobbies selected";
                    }else{
                        var hobbies = hobbies_arr.toString();
                    }

            var image = $('#image').val(); 

            $.ajax({
                url : "controller.php",
                method  : "post",
                data : { name : name,
                         number : number,
                         email : email,
                         gender : gender,
                         city : city,
                         address : address,
                         hobbies : hobbies,
                         image : image
                        },
                success : function(data){
                     
                    fetch();
                }        
            });
                        
        });



        $('#delete').click(function(){
                
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

         
             
            
       
       
       
    });
</script>       
            
         