<?php

$connection = mysqli_connect("localhost", "root", "", "mytest");

$query = "select * from Login";

$table = mysqli_query($connection, $query);

if(mysqli_num_rows($table)>=1){
	while($row = mysqli_fetch_assoc($table)){
	$Username = $row["Username"];
	$Category = $row["Category"];
	$response[] = array("Username"=>$Username, "Category"=>$Category);
	}
	echo json_encode($response);
	mysqli_close($connection);
}
else{
	$Username = "";
	$Category = "";
	$response[] = array("Username"=>$Username, "Category"=>$Category);
	echo json_encode($response);
	mysqli_close($connection);
}

?>