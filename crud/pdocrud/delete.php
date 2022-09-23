<?php

include "database.php";

	$id = $_GET['id'];

    $delete = "DELETE FROM `users` WHERE id = ?";

    $statement = $conn->prepare($delete);


 
    $statement->execute(array($id));

    header('location:index.php');
	?>
