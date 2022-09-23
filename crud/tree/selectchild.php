<?php

include "database.php";

$pid = $_POST['pid'];




$selectc = "SELECT * FROM child WHERE pid = ".$pid."";
// 
$resultc = $conn->query($selectc);
$row3 = $resultc->fetch_all(MYSQLI_ASSOC);


//  print_r($row3);
//  die();

 foreach($row3 as $k => $v){

?>
    <option value="<?php echo $v['id']; ?>"><?php echo $v['name']; ?></option>

<?php } ?>