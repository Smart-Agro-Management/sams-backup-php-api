<?php

$connection = mysqli_connect("localhost", "root", "", "mytest");

$Encode = file_get_contents('php://input');
$Decode = json_decode($Encode, true);

$username = $Decode['username'];

$query = "SELECT SUM(Price) AS Total FROM Cart WHERE CustomerUsername = '$username' AND Status = 'In Cart';";
$table = mysqli_query($connection, $query);

if(mysqli_num_rows($table) >= 1){
	$row = mysqli_fetch_assoc($table);
	$Price = $row["Total"];
	echo json_encode($Price);
}
else{
	$Price = '';
	echo json_encode($Price);
}

?>