<?php

$connection = mysqli_connect("localhost", "root", "", "mytest");

$query = "select * from FarmerTable";

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
	$response[] = array("Username"=>$Username, "Name"=>$Name, "City"=>$City, "Phone"=>$Phone, "NID"=>$NID, "DOB"=>$DOB, "Category"=>$Category);
	echo json_encode($response);
	mysqli_close($connection);
}

?>