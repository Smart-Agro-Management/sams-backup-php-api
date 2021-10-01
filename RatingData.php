<?php
$connection = mysqli_connect("localhost","root","","mytest");

$EncodeData = file_get_contents('php://input');
$DecodeData = json_decode($EncodeData, true);

$customerUsername = $DecodeData["customerUsername"];
$farmerUsername = $DecodeData["farmerUsername"];

$query = "SELECT Rate FROM RatingTable WHERE CustomerUsername = '$customerUsername' AND FarmerUsername = '$farmerUsername';";
$execute = mysqli_query($connection, $query);

if(mysqli_num_rows($execute) >= 1){
	$row = mysqli_fetch_assoc($execute);
	$rate = $row["Rate"];
	$message[] = array("Rate"=>$rate);
	echo json_encode($message);
}
else{
	$rate = 0;
	$message[] = array("Rate"=>$rate);
	echo json_encode($message);
}


?>