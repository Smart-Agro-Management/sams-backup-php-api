<?php

$connection = mysqli_connect("localhost", "root", "", "mytest");

$Encode = file_get_contents('php://input');
$Decode = json_decode($Encode, true);

$username = $Decode['username'];

$query = "select * from Stock WHERE FarmerUsername = '$username';";
$table = mysqli_query($connection, $query);

if(mysqli_num_rows($table)>=1){
	while($row = mysqli_fetch_assoc($table)){
	$ID = $row["ID"];
	$Name = $row["Name"];
	$Price = $row["Price"];
	$Quantity = $row["Quantity"];
	$Description = $row["Description"];
	$response[] = array("ID"=>$ID, "Name"=>$Name, "Price"=>$Price, "Quantity"=>$Quantity, "Description"=>$Description,);
	}
	echo json_encode($response);
}
else{
	$ID = "";
	$Name = "";
	$Price = "";
	$Quantity = "";
	$Description = "";
	$response[] = array("ID"=>$ID, "Name"=>$Name, "Price"=>$Price, "Quantity"=>$Quantity, "Description"=>$Description,);
	echo json_encode($response);
}

?>