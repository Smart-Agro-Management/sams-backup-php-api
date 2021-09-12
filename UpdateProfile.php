<?php

$connection = mysqli_connect("localhost", "root", "", "mytest");

$Encode = file_get_contents('php://input');
$Decode = json_decode($Encode, true);

$username = $Decode['username'];
$category = $Decode['category'];
$name = $Decode["name"];
$password = $Decode["password"];
$phone = $Decode["phone"];
$nid = $Decode["nid"];
$city = $Decode["city"];
$dob = $Decode["dob"];

if($category == 'Customer'){
	$query = "UPDATE CustomerTable SET Name='$name', City='$city', Phone='$phone', NID='$nid', Password='$password', DOB='$dob' WHERE Username = '$username';";
	$query1 = "UPDATE Login SET Password='$password' WHERE Username = '$username';";
    $table = mysqli_query($connection, $query);
    $table1 = mysqli_query($connection, $query1);
	if($table && $table1){
		$message= "Updated!";
		echo json_encode($message);
	}
	else{
		$message = "Something wrong!";
		echo json_encode($message);
	}
}
else if($category == 'Agent'){
	$query = "UPDATE AgentTable SET Name='$name', City='$city', Phone='$phone', NID='$nid', Password='$password', DOB='$dob' WHERE Username = '$username';";
    $query1 = "UPDATE Login SET Password='$password' WHERE Username = '$username';";
	$table = mysqli_query($connection, $query);
    $table1 = mysqli_query($connection, $query1);
	if($table && $table1){
		$message= "Updated!";
		echo json_encode($message);
	}
	else{
		$message = "Something wrong!";
		echo json_encode($message);
	}
}
else if($category == 'Farmer'){
	$query = "UPDATE FarmerTable SET Name='$name', City='$city', Phone='$phone', NID='$nid', Password='$password', DOB='$dob' WHERE Username = '$username';";
    $query1 = "UPDATE Login SET Password='$password' WHERE Username = '$username';";
	$table = mysqli_query($connection, $query);
    $table1 = mysqli_query($connection, $query1);
	if($table && $table1){
		$message= "Updated!";
		echo json_encode($message);
	}
	else{
		$message = "Something wrong!";
		echo json_encode($message);
	}
}
else{
	$message = "Something wrong!";
	echo json_encode($message);
}

?>