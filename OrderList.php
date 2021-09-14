<?php

$connection = mysqli_connect("localhost", "root", "", "mytest");

$Encode = file_get_contents('php://input');
$Decode = json_decode($Encode, true);

$username = $Decode['username'];

$query = "select * from OrderTable WHERE CustomerUsername = '$username';";
$table = mysqli_query($connection, $query);

if(mysqli_num_rows($table)>=1){
	while($row = mysqli_fetch_assoc($table)){
	$ID = $row["ID"];
	$Price = $row["Price"];
	$Date = $row["Date"];
	$City = $row["City"];
	$Status = $row["Status"];
	$response[] = array("ID"=>$ID, "Price"=>$Price, "Date"=>$Date, "City"=>$City, "Status"=>$Status);
	}
	echo json_encode($response);
}
else{
	$ID = "";
	$Price = "";
	$Date = "";
	$City = "";
	$Status = "";
	$response[] = array("ID"=>$ID, "Price"=>$Price, "Date"=>$Date, "City"=>$City, "Status"=>$Status);
	echo json_encode($response);
}

?>