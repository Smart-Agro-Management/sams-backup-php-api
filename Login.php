<?php

$connection = mysqli_connect("localhost", "root", "", "mytest");

$Encode = file_get_contents('php://input');
$Decode = json_decode($Encode, true);

$username = $Decode['username'];
$password = $Decode['password'];

$query = "select * from Login WHERE Username = '$username' AND Password = '$password';";
$table = mysqli_query($connection, $query);

if(mysqli_num_rows($table)>=1){
	$row = mysqli_fetch_assoc($table);
	$Username = $row["Username"];
	$Category = $row["Category"];
	$response[] = array("Username"=>$Username, "Category"=>$Category);
	echo json_encode($response);
	mysqli_close($connection);
}
else{
	$message = "Wrong Username or, Password!";
	echo json_encode($message);
	mysqli_close($connection);
}

?>