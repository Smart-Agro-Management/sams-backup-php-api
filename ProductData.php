<?php

$connection = mysqli_connect("localhost", "root", "", "mytest");

$Encode = file_get_contents('php://input');
$Decode = json_decode($Encode, true);

$id = $Decode['id'];

$query = "select * from Stock WHERE ID = '$id';";
$table = mysqli_query($connection, $query);

if($table){
	$row = mysqli_fetch_assoc($table);
	$Name = $row["Name"];
	$Price = $row["Price"];
	$Description = $row["Description"];
	$response[] = array("Name"=>$Name, "Price"=>$Price, "Description"=>$Description,);
	echo json_encode($response);
}
else{
	$Name = "";
	$Price = "";
	$Description = "";
	$response[] = array("Name"=>$Name, "Price"=>$Price, "Description"=>$Description,);
	echo json_encode($response);
}

?>