<?php
$connection = mysqli_connect("localhost","root","","mytest");

$EncodeData = file_get_contents('php://input');
$DecodeData = json_decode($EncodeData, true);

$name = $DecodeData["name"];
$username = $DecodeData["username"];
$price = $DecodeData["price"];
$description = $DecodeData["description"];
$unit = $DecodeData["unit"];

$query = "INSERT INTO Stock (Name, Price, Description, FarmerUsername, Unit) VALUES ('$name', '$price', '$description', '$username', '$unit');";
$execute = mysqli_query($connection, $query);

if($execute){
	$message = "Successfully Added!";
	echo json_encode($message);
}
else{
	$message = "Something wrong!";
	echo json_encode($message);
}


?>