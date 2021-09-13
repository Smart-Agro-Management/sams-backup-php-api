<?php

$connection = mysqli_connect("localhost", "root", "", "mytest");

$Encode = file_get_contents('php://input');
$Decode = json_decode($Encode, true);

$id = $Decode["id"];
$name = $Decode["name"];
$price = $Decode["price"];
$description = $Decode["description"];

$query = "UPDATE Stock SET Name = '$name', Price = '$price', Description = '$description' WHERE ID = '$id';";
$table = mysqli_query($connection, $query);

if($table){
	$message = "Updated!";
	echo json_encode($message);
}
else{
	$message = "Something Wrong!";
	echo json_encode($message);
}

?>