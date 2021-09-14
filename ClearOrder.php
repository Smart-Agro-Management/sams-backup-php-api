<?php
$connection = mysqli_connect("localhost","root","","mytest");

$EncodeData = file_get_contents('php://input');
$DecodeData = json_decode($EncodeData, true);

$username = $DecodeData["username"];

$query = "DELETE FROM Cart WHERE CustomerUsername = '$username' AND Status = 'In Cart';";
$execute = mysqli_query($connection, $query);

if($execute){
	$message = "";
	echo json_encode($message);
}
else{
	$message = "Something wrong!";
	echo json_encode($message);
}


?>