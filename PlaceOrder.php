<?php
$connection = mysqli_connect("localhost","root","","mytest");

$EncodeData = file_get_contents('php://input');
$DecodeData = json_decode($EncodeData, true);

$id = $DecodeData["id"];
$username = $DecodeData["username"];
$price = $DecodeData["price"];
$city = $DecodeData["city"];

$query = "INSERT INTO OrderTable (ID, CustomerUsername, Price, City) VALUES ('$id', '$username', '$price', '$city');";
$execute = mysqli_query($connection, $query);

$query1 = "UPDATE Cart SET OrderId = '$id', Status = 'Ordered' WHERE CustomerUsername = '$username' AND Status = 'In Cart';";
$execute1 = mysqli_query($connection, $query1);

if($execute & $execute1){
	$message = "Order Placed!";
	echo json_encode($message);
}
else{
	$message = "Something wrong!";
	echo json_encode($message);
}


?>