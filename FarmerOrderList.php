<?php

$connection = mysqli_connect("localhost", "root", "", "mytest");

$Encode = file_get_contents('php://input');
$Decode = json_decode($Encode, true);

$username = $Decode['username'];

$query = "select OrderTable.ID, OrderTable.Date, OrderTable.City, Cart.Status, Cart.Price, Cart.Quantity, Cart.ID AS CartId, Stock.Name, Stock.ID AS StockId, Stock.Quantity AS StockQuantity from OrderTable, Cart, Stock WHERE OrderTable.ID = Cart.OrderId AND Cart.ProductId = Stock.ID AND Cart.Status = 'Ordered' AND Stock.FarmerUsername = '$username';";
$table = mysqli_query($connection, $query);

if(mysqli_num_rows($table)>=1){
	while($row = mysqli_fetch_assoc($table)){
	$ID = $row["ID"];
	$StockId = $row["StockId"];
	$CartId = $row["CartId"];
	$Name = $row["Name"];
	$Price = $row["Price"];
	$Quantity = $row["Quantity"];
	$StockQuantity = $row["StockQuantity"];
	$Date = $row["Date"];
	$City = $row["City"];
	$Status = $row["Status"];
	$response[] = array("ID"=>$ID, "StockId"=>$StockId, "CartId"=>$CartId, "Name"=>$Name, "Price"=>$Price, "Quantity"=>$Quantity, "StockQuantity"=>$StockQuantity, "Date"=>$Date, "City"=>$City, "Status"=>$Status);
	}
	echo json_encode($response);
}
else{
	$ID = "";
	$StockId = "";
	$CartId = "";
	$Name = "";
	$Price = "";
	$Quantity = "";
	$StockQuantity = "";
	$Date = "";
	$City = "";
	$Status = "";
	$response[] = array("ID"=>$ID, "StockId"=>$StockId, "CartId"=>$CartId, "Name"=>$Name, "Price"=>$Price, "Quantity"=>$Quantity, "StockQuantity"=>$StockQuantity, "Date"=>$Date, "City"=>$City, "Status"=>$Status);
	echo json_encode($response);
}

?>