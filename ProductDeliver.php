<?php
$connection = mysqli_connect("localhost","root","","mytest");

$EncodeData = file_get_contents('php://input');
$DecodeData = json_decode($EncodeData, true);

$cartId = $DecodeData["cartId"];
$stockId = $DecodeData["stockId"];
$quantity = $DecodeData["quantity"];

$query = "UPDATE Cart SET Status = 'Delivered' WHERE ID = '$cartId';";
$execute = mysqli_query($connection, $query);

$query1 = "UPDATE Stock SET Quantity = '$quantity' WHERE ID = '$stockId';";
$execute1 = mysqli_query($connection, $query1);

if($execute && $execute1){
	$message = "Data Updated!";
	echo json_encode($message);
}
else{
	$message = "Something wrong!";
	echo json_encode($message);
}


?>