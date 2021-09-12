<?php

$connection = mysqli_connect("localhost", "root", "", "mytest");

$Encode = file_get_contents('php://input');
$Decode = json_decode($Encode, true);

$username = $Decode['username'];
$category = $Decode['category'];

if($category == 'Agent'){
	$message = "Nicely Done"
	echo json_decode($message);
}

/*$name = $DecodeData["name"];
$password = $DecodeData["password"];
$phone = $DecodeData["phone"];
$nid = $DecodeData["nid"];
$city = $DecodeData["city"];
$dob = $DecodeData["dob"];

if($category == 'Customer'){
	$query = "UPDATE CustomerTable SET Name='$name', City='$city', Phone='$phone', NID='$nid', Password='$password', DOB='$dob' WHERE Username = '$username';";
    $table = mysqli_query($connection, $query);
	$row = mysqli_fetch_assoc($table);
	$Name = $row["Name"];
		$City = $row["City"];
		$Phone = $row["Phone"];
		$NID = $row["NID"];
		$Password = $row["Password"];
		$DOB = $row["DOB"];
		$message= "Updated!";
		$response[] = array("Name"=>$Name, "City"=>$City, "Phone"=>$Phone, "NID"=>$NID, "Password"=>$Password, "DOB"=>$DOB, "Message"=>$message);
		echo json_encode($response);
}
else if($category == 'Agent'){
	$query = "UPDATE AgentTable SET Name='$name', City='$city', Phone='$phone', NID='$nid', Password='$password', DOB='$dob' WHERE Username = '$username';";
    $table = mysqli_query($connection, $query);
	$row = mysqli_fetch_assoc($table);
	$Name = $row["Name"];
		$City = $row["City"];
		$Phone = $row["Phone"];
		$NID = $row["NID"];
		$Password = $row["Password"];
		$DOB = $row["DOB"];
		$message= "Updated!";
		$response[] = array("Name"=>$Name, "City"=>$City, "Phone"=>$Phone, "NID"=>$NID, "Password"=>$Password, "DOB"=>$DOB, "Message"=>$message);
		echo json_encode($response);
}
else if($category == 'Farmer'){
	$query = "UPDATE FarmerTable SET Name='$name', City='$city', Phone='$phone', NID='$nid', Password='$password', DOB='$dob' WHERE Username = '$username';";
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
}*/

?>