<?php

$connection = mysqli_connect("localhost", "root", "", "mytest");
$Encode = file_get_contents('php://input');
$Decode = json_decode($Encode, true);

$username = $Decode['username'];

$query1 = "select City from CustomerTable WHERE Username = '$username'";
$table1 = mysqli_query($connection, $query1);

$row1 = mysqli_fetch_assoc($table1);
$city = $row1['City'];

$query = "select * from FarmerTable WHERE City = '$city'";
$table = mysqli_query($connection, $query);

if(mysqli_num_rows($table)>=1){
	while($row = mysqli_fetch_assoc($table)){
	$Username = $row["Username"];
	$Name = $row["Name"];
	$City = $row["City"];
	$Phone = $row["Phone"];
	$NID = $row["NID"];
	$DOB = $row["DOB"];
	$Category = $row["Category"];
	$Rating = $row["Rating"];
	$response[] = array("Username"=>$Username, "Name"=>$Name, "City"=>$City, "Phone"=>$Phone, "NID"=>$NID, "DOB"=>$DOB, "Category"=>$Category, "Rating"=>$Rating);
	}
	echo json_encode($response);
	mysqli_close($connection);
}
else{
	$Username = "";
	$Name = "";
	$City = "";
	$Phone = "";
	$NID = "";
	$DOB = "";
	$Category = "";
	$Rating = "";
	$response[] = array("Username"=>$Username, "Name"=>$Name, "City"=>$City, "Phone"=>$Phone, "NID"=>$NID, "DOB"=>$DOB, "Category"=>$Category, "Rating"=>$Rating);
	echo json_encode($response);
	mysqli_close($connection);
}

?>