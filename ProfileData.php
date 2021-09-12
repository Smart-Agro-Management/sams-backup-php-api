<?php

$connection = mysqli_connect("localhost", "root", "", "mytest");

$Encode = file_get_contents('php://input');
$Decode = json_decode($Encode, true);

$username = $Decode['username'];
$category = $Decode['category'];

if($category == 'Customer'){
	$query = "select * from CustomerTable WHERE Username = '$username';";
    $table = mysqli_query($connection, $query);
	$row = mysqli_fetch_assoc($table);
	$Name = $row["Name"];
		$City = $row["City"];
		$Phone = $row["Phone"];
		$NID = $row["NID"];
		$Password = $row["Password"];
		$DOB = $row["DOB"];
		$response[] = array("Name"=>$Name, "City"=>$City, "Phone"=>$Phone, "NID"=>$NID, "Password"=>$Password, "DOB"=>$DOB);
		echo json_encode($response);
}
else if($category == 'Agent'){
	$query = "select * from AgentTable WHERE Username = '$username';";
    $table = mysqli_query($connection, $query);
	$row = mysqli_fetch_assoc($table);
	$Name = $row["Name"];
		$City = $row["City"];
		$Phone = $row["Phone"];
		$NID = $row["NID"];
		$Password = $row["Password"];
		$DOB = $row["DOB"];
		$response[] = array("Name"=>$Name, "City"=>$City, "Phone"=>$Phone, "NID"=>$NID, "Password"=>$Password, "DOB"=>$DOB);
		echo json_encode($response);
}
else if($category == 'Farmer'){
	$query = "select * from FarmerTable WHERE Username = '$username';";
    $table = mysqli_query($connection, $query);
	$row = mysqli_fetch_assoc($table);
	$Name = $row["Name"];
		$City = $row["City"];
		$Phone = $row["Phone"];
		$NID = $row["NID"];
		$Password = $row["Password"];
		$DOB = $row["DOB"];
		$response[] = array("Name"=>$Name, "City"=>$City, "Phone"=>$Phone, "NID"=>$NID, "Password"=>$Password, "DOB"=>$DOB);
		echo json_encode($response);
}
else{
	$message = "Something wrong!";
	echo json_decode($message);
}

/*if($category == 'Farmer'){
	$query = "select * from FarmerTable WHERE Username = '$username';";
	$table = mysqli_query($connection, $query);
	
	if($table){
		$row = mysqli_fetch_assoc($table)
		$Name = $row["Name"];
		$City = $row["City"];
		$Phone = $row["Phone"];
		$NID = $row["NID"];
		$Password = $row["Password"];
		$DOB = $row["DOB"];
		$response[] = array("Name"=>$Name, "City"=>$City, "Phone"=>$Phone, "NID"=>$NID, "Password"=>$Password, "DOB"=>$DOB);
		echo json_encode($response);
		mysqli_close($connection);
		}
		else{
			$Name = '';
			$City = '';
			$Phone = '';
			$NID = '';
			$Password = '';
			$DOB = '';
			$response[] = array("Name"=>$Name, "City"=>$City, "Phone"=>$Phone, "NID"=>$NID, "Password"=>$Password, "DOB"=>$DOB);
			echo json_encode($response);
			mysqli_close($connection);
			}
}
else{
	$Name = '';
	$City = '';
	$Phone = '';
	$NID = '';
	$Password = '';
	$DOB = '';
	$response[] = array("Name"=>$Name, "City"=>$City, "Phone"=>$Phone, "NID"=>$NID, "Password"=>$Password, "DOB"=>$DOB);
	echo json_encode($response);
	mysqli_close($connection);
}*/

?>