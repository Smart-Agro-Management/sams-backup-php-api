<?php
$connection = mysqli_connect("localhost","root","","mytest");

$EncodeData = file_get_contents('php://input');
$DecodeData = json_decode($EncodeData, true);

$name = $DecodeData["name"];
$username = $DecodeData["username"];
$password = $DecodeData["password"];
$phone = $DecodeData["phone"];
$nid = $DecodeData["nid"];
$city = $DecodeData["city"];
$category = $DecodeData["category"];
$dob = $DecodeData["dob"];

$query00 = "SELECT * FROM Login WHERE Username = '$username'";
$execute00 = mysqli_query($connection, $query00);

if(mysqli_num_rows($execute00)==0){ 
if($category == "Farmer"){
	$query = "INSERT INTO login (Username, Password, Category) VALUES ('$username', '$password', '$category');";
$query01 = "INSERT INTO FarmerTable (Username, Password, Name, City, Phone, NID, DOB) VALUES ('$username', '$password', '$name', '$city', '$phone', '$nid', '$dob');";

$execute = mysqli_query($connection, $query);
$execute01 = mysqli_query($connection, $query01);

if($execute && $execute01){
	$message = "Successfully registered!";
	$jsonMessage = json_encode($message);
    echo $jsonMessage;
}
else{
	$message = "ERROR";
	$jsonMessage = json_encode($message);
	echo $jsonMessage;
}
}
else if($category == "Agent"){
	$query = "INSERT INTO login (Username, Password, Category) VALUES ('$username', '$password', '$category');";
$query01 = "INSERT INTO AgentTable (Username, Password, Name, City, Phone, NID, DOB) VALUES ('$username', '$password', '$name', '$city', '$phone', '$nid', '$dob');";

$execute = mysqli_query($connection, $query);
$execute01 = mysqli_query($connection, $query01);

if($execute && $execute01){
	$message = "Successfully registered!";
	$jsonMessage = json_encode($message);
    echo $jsonMessage;
}
else{
	$message = "ERROR";
	$jsonMessage = json_encode($message);
	echo $jsonMessage;
}
}
else if($category == "Customer"){
	$query = "INSERT INTO login (Username, Password, Category) VALUES ('$username', '$password', '$category');";
$query01 = "INSERT INTO CustomerTable (Username, Password, Name, City, Phone, NID, DOB) VALUES ('$username', '$password', '$name', '$city', '$phone', '$nid', '$dob');";

$execute = mysqli_query($connection, $query);
$execute01 = mysqli_query($connection, $query01);

if($execute && $execute01){
	$message = "Successfully registered!";
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
	$message = "ERROR";
	$jsonMessage = json_encode($message);
	echo $jsonMessage;
}}
else{
	$errorMessage = "Username already exist!";
	$jsonMessage = json_encode($errorMessage);
	echo $jsonMessage;
}

/*$query = "INSERT INTO login (Username, Password) VALUES ('$username', '$password');";
$query01 = "INSERT INTO customerTable (email, city) VALUES ('$email', '$city');";

$execute = mysqli_query($connection, $query);
$execute01 = mysqli_query($connection, $query01);

if($execute && $execute01){
	$message = "Successfully registered!";
	$jsonMessage = json_encode($message);
    echo $jsonMessage;
}
else{
	$message = "ERROR";
	$jsonMessage = json_encode($message);
	echo $jsonMessage;
}*/


?>