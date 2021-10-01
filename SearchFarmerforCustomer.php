<?php

$connection = mysqli_connect("localhost", "root", "", "mytest");

$Encode = file_get_contents('php://input');
$Decode = json_decode($Encode, true);

$searchName = $Decode['searchName'];
$username = $Decode['username'];

$query1 = "select City from CustomerTable WHERE Username = '$username'";
$table1 = mysqli_query($connection, $query1);

$row1 = mysqli_fetch_assoc($table1);
$city = $row1['City'];

$query = "select * from FarmerTable WHERE Name LIKE '%$searchName%' AND City = '$city';";
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
	$response[] = array("Username"=>$Username, "Name"=>$Name, "City"=>$City, "Phone"=>$Phone, "NID"=>$NID, "DOB"=>$DOB, "Category"=>$Category);
	}
	echo json_encode($response);
}
else{
	$Username = "";
	$Name = "";
	$City = "";
	$Phone = "";
	$NID = "";
	$DOB = "";
	$Category = "";
	$response[] = array("Username"=>$Username, "Name"=>$Name, "City"=>$City, "Phone"=>$Phone, "NID"=>$NID, "DOB"=>$DOB, "Category"=>$Category);
	echo json_encode($response);
}

?>