<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$server = 'localhost';
$user = "root";
$pass = "root";
$db = "tree";


// public function __construct(){
   mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

   $conn = new mysqli($server,$user,$pass,$db);
   
   if($conn->error){
       echo $conn->error;
   }

   $selecttab1 = "SELECT * FROM tab1";
   $result1 = $conn->query($selecttab1);
   $row1 = $result1->fetch_all(MYSQLI_ASSOC);

   $selecttab2 = "SELECT * FROM tab2";
   $result2 = $conn->query($selecttab2);
   $row2 = $result2->fetch_all(MYSQLI_ASSOC);

   $selecttab3 = "SELECT * FROM tab3";
   $result3 = $conn->query($selecttab3);
   $row3 = $result3->fetch_all(MYSQLI_ASSOC);

   $selecttab4 = "SELECT * FROM tab4";
   $result4 = $conn->query($selecttab4);
   $row4 = $result4->fetch_all(MYSQLI_ASSOC);

//    print_r($row3);
    
   

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>Document</title>
    <style>
        .container{
            display : flex
        }
        .relation{
            margin : 0px 0px 0px 30px;
        }
    </style>
</head>
<body>
    <div class="container">

        <div class="child form mt-8">

             Select :
                <form>

                <div class="mt-3">

                    <select id="tab1">
                        Please select :
                        <?php foreach($row1 as $k => $v){?>
                        <option value="<?php echo $v['name']; ?>"><?php echo $v['name']; ?></option>
                        <?php } ?>
                    </select>

                </div>

                <div class="mt-3">

                    <select id="tab2">
                        Please select :
                        <?php foreach($row2 as $k => $v){?>
                        <option id="<?php echo $v['id']; ?>" value="<?php echo $v['name']; ?>"><?php echo $v['name']; ?></option>
                        <?php } ?>
                    </select>

                </div>

                <div class="mt-3">

                    <select id="tab3">
                        Please select :
                        <?php foreach($row3 as $k => $v){
                            //if($row2[0]['id'] == $row3[0]['pid']){
                            ?>
                            
                        <option id="<?php echo $v['id']; ?>" value="<?php echo $v['name']; ?>"><?php echo $v['name']; ?></option>
                        <?php } ?>
                    </select>

                </div>

                <div class="mt-3">

                    <select id="tab4">
                        Please select :
                        <?php foreach($row4 as $k => $v){?>
                        <option id="<?php echo $v['id']; ?>" value="<?php echo $v['name']; ?>"><?php echo $v['name']; ?></option>
                        <?php } ?>
                    </select>

                </div>

                <div class="mt-3">

                <input type="submit" id="submit" name="submit" class="btn btn-primary"/>

                </div>

                </form>
                            

        </div>

        <div class="child relation">

            <h2>Great Grand Parent</h2>
        
               <p id="ggid"></p>
            <br>
            
            <h3>Grand Parent</h3>
            
               <p id="gid"></p>
            <br>

            <h3>Parent</h3>
            
               <p id="pid"></p>
            <br>

            <h3>Person Selected</h3>
            
               <p id="id"></p>
            <br>


        </div>



    </div>
</body>
</html>

<script>

    $('#tab1').click(function(){
        

        var tab1 = $('#tab1').val();
        $('#ggid').html(tab1);
            //event
            $('#tab2').click(function(){

                var tab2 = $('#tab2').val();
                $('#gid').html(tab2);
                //event
                $('#tab3').click(function(){
                    var className = $('').attr('class');
                    if(tab2 == 1){
                      
                    }
                    
                    var tab3 = $('#tab3').val();
                    $('#pid').html(tab3);
                    //event
                    $('#tab4').click(function(){

                        var tab4 = $('#tab4').val();
                        $('#id').html(tab4);

                    });


                });

            });

    });

    
   
</script>