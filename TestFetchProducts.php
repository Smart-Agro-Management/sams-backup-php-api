<?php

$connection = mysqli_connect("localhost", "root", "", "mytest");

$EncodeData = file_get_contents('php://input');
$DecodeData = json_decode($EncodeData, true);

$username = $DecodeData["Username"];

$query = "select * from Login where username = '$username'";

$table = mysqli_query($connection, $query);

if(mysqli_num_rows($table)>=1){
	$row = mysqli_fetch_assoc($table)
	$Username = $row["Username"];
	$Category = $row["Category"];
	$response[] = array("Username"=>$Username, "Category"=>$Category);
	echo json_encode($response);
}
else{
	$Username = "";
	$Category = "";
	$response[] = array("Username"=>$Username, "Category"=>$Category);
	echo json_encode($response);
}

?>