<?php
$connection = mysqli_connect("localhost","root","","mytest");

$EncodeData = file_get_contents('php://input');
$DecodeData = json_decode($EncodeData, true);

$agentUsername = $DecodeData["agentUsername"];
$name = $DecodeData["name"];
$username = $DecodeData["username"];
$phone = $DecodeData["phone"];
$nid = $DecodeData["nid"];
$city = $DecodeData["city"];
$dob = $DecodeData["dob"];

$query00 = "SELECT * FROM FarmerTable WHERE Username = '$username'";
$execute00 = mysqli_query($connection, $query00);

if(mysqli_num_rows($execute00)==0){
	$query01 = "INSERT INTO FarmerTable (Username, Name, City, Phone, NID, DOB, AgentUsername) VALUES ('$username', '$name', '$city', '$phone', '$nid', '$dob', '$agentUsername');";
	$execute01 = mysqli_query($connection, $query01);
	
	if($execute01){
		$message = "Successfully added!";
		$jsonMessage = json_encode($message);
		echo $jsonMessage;
	}
	else{
		$message = "ERROR";
		$jsonMessage = json_encode($message);
		echo $jsonMessage;
	}
}
else{
	$errorMessage = "Username already exist!";
	$jsonMessage = json_encode($errorMessage);
	echo $jsonMessage;
}


?>