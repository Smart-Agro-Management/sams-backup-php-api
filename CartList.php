<?php

$connection = mysqli_connect("localhost", "root", "", "mytest");

$Encode = file_get_contents('php://input');
$Decode = json_decode($Encode, true);

$username = $Decode['username'];

$query = "select Cart.*, Stock.Name from Cart, Stock, CustomerTable WHERE Cart.ProductId = Stock.ID AND Cart.CustomerUsername = CustomerTable.Username AND Cart.CustomerUsername = '$username' AND Cart.Status = 'In Cart';";
$table = mysqli_query($connection, $query);

if(mysqli_num_rows($table) >= 1){
	while($row = mysqli_fetch_assoc($table)){
	$Name = $row["Name"];
	$Price = $row["Price"];
	$Quantity = $row["Quantity"];
	$response[] = array("Name"=>$Name, "Price"=>$Price, "Quantity"=>$Quantity);
	}
	echo json_encode($response);
}
else{
	$Name = "";
	$Price = "";
	$Quantity = "";
	$response[] = array("Name"=>$Name, "Price"=>$Price, "Quantity"=>$Quantity);
	echo json_encode($response);
}

?>