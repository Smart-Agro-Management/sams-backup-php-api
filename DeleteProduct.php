<?php

$connection = mysqli_connect("localhost", "root", "", "mytest");

$Encode = file_get_contents('php://input');
$Decode = json_decode($Encode, true);

$id = $Decode["id"];

$query = "DELETE FROM Stock WHERE ID = '$id';";
$table = mysqli_query($connection, $query);

if($table){
	$message = "Deleted!";
	echo json_encode($message);
}
else{
	$message = "Something Wrong!";
	echo json_encode($message);
}

?>