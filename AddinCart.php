<?php
$connection = mysqli_connect("localhost","root","","mytest");

$EncodeData = file_get_contents('php://input');
$DecodeData = json_decode($EncodeData, true);

$id = $DecodeData["id"];
$username = $DecodeData["username"];
$price = $DecodeData["price"];
$quantity = $DecodeData["quantity"];

$query = "INSERT INTO Cart (Quantity, Price, ProductId, CustomerUsername) VALUES ('$quantity', '$price', '$id', '$username');";
$execute = mysqli_query($connection, $query);

if($execute){
	$message = "Added in cart!";
	echo json_encode($message);
}
else{
	$message = "Something wrong!";
	echo json_encode($message);
}


?>