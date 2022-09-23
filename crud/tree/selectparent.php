<?php

include "database.php";

$gpid = $_POST['gpid'];
// die($gpid);



$selectp = "SELECT * FROM parent_tab WHERE gpid = ".$gpid."";
// 
$resultp = $conn->query($selectp);
$row2 = $resultp->fetch_all(MYSQLI_ASSOC);

// print_r($row2);
// die();

 foreach($row2 as $k => $v){

?>
    <option value="<?php echo $v['id']; ?>"><?php echo $v['name']; ?></option>

<?php } ?>