<?php

$connection = mysqli_connect("localhost", "root", "", "mytest");

$query = "select * from Products";

$table = mysqli_query($connection, $query);

if(mysqli_num_rows($table)>=1){
	while($row = mysqli_fetch_assoc($table)){
	$p_id = $row["P_ID"];
	$product_name = $row["Product_Name"];
	$product_description = $row["Product_Description"];
	$category = $row["Category"];
	$price = $row["Price"];
	$response[] = array("P_ID"=>$p_id, "Product_Name"=>$product_name, "Product_Description"=>$product_description, "Category"=>$category, "Price"=>$price);
	}
	echo json_encode($response);
	mysqli_close($connection);
}
else{
	$p_id = "";
	$product_name = "";
	$product_description = "";
	$category = "";
	$price = "";
	$response[] = array("P_ID"=>$p_id, "Product_Name"=>$product_name, "Product_Description"=>$product_description, "Category"=>$category, "Price"=>$price);
	echo json_encode($response);
	mysqli_close($connection);
}

?>