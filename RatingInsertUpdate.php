<?php
$connection = mysqli_connect("localhost","root","","mytest");

$EncodeData = file_get_contents('php://input');
$DecodeData = json_decode($EncodeData, true);

$customerUsername = $DecodeData["customerUsername"];
$farmerUsername = $DecodeData["farmerUsername"];
$rate = $DecodeData["rate"];

$query1 = "SELECT * FROM RatingTable WHERE CustomerUsername = '$customerUsername' AND FarmerUsername = '$farmerUsername';";
$execute1 = mysqli_query($connection, $query1);

if(mysqli_num_rows($execute1) == 0){
	$query5 = "INSERT INTO RatingTable (Rate, FarmerUsername, CustomerUsername) VALUES('$rate', '$farmerUsername', '$customerUsername');";
	$execute5 = mysqli_query($connection, $query5);
	
	$query6 = "SELECT AVG(Rate) AS RatingPoint FROM RatingTable WHERE FarmerUsername = '$farmerUsername';";
	$execute6 = mysqli_query($connection, $query6);
	$row = mysqli_fetch_assoc($execute6);
	
	$ratingPoint = $row["RatingPoint"];
	
	$query7 = "UPDATE FarmerTable SET Rating = '$ratingPoint' WHERE Username = '$farmerUsername';";
	$execute7 = mysqli_query($connection, $query7);
	
	if($execute5 && $execute7){
		$message= "You've rated this framer!";
		echo json_encode($message);
	}
	else{
		$message= "Something wrong!";
		echo json_encode($message);
	}
}
else{
	$query2 = "UPDATE RatingTable SET Rate = '$rate' WHERE CustomerUsername = '$customerUsername' AND FarmerUsername = '$farmerUsername';";
	$execute2 = mysqli_query($connection, $query2);
	
	$query3 = "SELECT AVG(Rate) AS RatingPoint FROM RatingTable WHERE FarmerUsername = '$farmerUsername';";
	$execute3 = mysqli_query($connection, $query3);
	$row = mysqli_fetch_assoc($execute3);
	
	$ratingPoint = $row["RatingPoint"];
	
	$query4 = "UPDATE FarmerTable SET Rating = '$ratingPoint' WHERE Username = '$farmerUsername';";
	$execute4 = mysqli_query($connection, $query4);
	
	if($execute2 && $execute4){
		$message= "You've updated this framer's rating!";
		echo json_encode($message);
	}
	else{
		$message= "Something wrong!";
		echo json_encode($message);
	}
}


?>