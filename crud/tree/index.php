<?php

    include "database.php";

    $selectgp = "SELECT * FROM grandparent_tab";
    $resultgp = $conn->query($selectgp);
    $row1 = $resultgp->fetch_all(MYSQLI_ASSOC);
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js" integrity="sha512-2rNj2KJ+D8s1ceNasTIex6z4HWyOnEYLVC3FigGOmyQCZc2eBXKgOxQmo3oKLHyfcj53uz4QMsRCWNbLd32Q1g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>Document</title>
    <style>
        
    </style>    
</head>
<body>
        <div class="container">
            
        
            <div class="card mt-2">
                <div class="card-header bg-info">Family Tree Form</div>

                <div class="card-body">
                        <div class="mt-3">
                            <label for="grandparent">Grandparent:</label>
                            <select id="grandparent">
                                <?php foreach($row1 as $k => $v){?>
                                <option value="<?php echo $v['id']; ?>"><?php echo $v['name']; ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="mt-3">
                            <label for="parent">Parent:</label>
                            <select id="parent">
                            </select> 
                        </div>

                        <div class="mt-3">
                            <label for="child">Child:</label>
                            <select id="child">
                            </select> 
                        </div>
                </div>
            </div>
                  
            <div class="card mt-3"> 
                <div class="card-header bg-secondary text-light">Family Tree Representation</div>  
                    <div class="card-body text-primary">
                        <h4>Grand Parent</h4>
                        <p id="gid" class="text-dark"></p><br>
                        <h4>Parent</h4>
                        <p id="pid" class="text-dark"></p><br>
                        <h4>Child</h4>
                        <p id="cid" class="text-dark"></p>
                    </div>     
            </div>


        </div>          
</body>  
</html>

<script>
    $(document).ready(function(){
        $('#parent').hide();
        $('#child').hide();

        $('#grandparent').click(function(){
           $('#parent').show();
           var gpid = $('#grandparent').val();
           var gidtext = $('#grandparent option:selected').text();
        //    alert(gidtext);
           $('#gid').html(gidtext);
           //alert(gpid);
            $.ajax({
                url : "selectparent.php",
                type : "POST",
                data : { gpid : gpid},
                success : function(data){
                    
                    //  console.log(data);
                 $('#parent').html(data);
                }
            });   
        });

        $('#parent').click(function(){
                $('#child').show();
                var pid = $('#parent').val();
                var pidtext = $('#parent option:selected').text();
                $('#pid').html(pidtext);
               // alert(pid);
                $.ajax({
                url : "selectchild.php",
                type : "POST",
                data : { pid : pid},
                success : function(data){
                    
                    //  console.log(data);
                 $('#child').html(data);
                }
            }); 
             
        });

        $('#child').click(function(){
            var id = $('#child').val();
            var idtext = $('#child option:selected').text();
            $('#cid').html(idtext);
        });  

        

    });
</script>


