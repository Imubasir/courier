<?php
session_start();
require("../php/connect.php");
$username = $_SESSION['username'];
$location = $_SESSION['branch_code'];

$id = $_POST['id'];
$customer_name = isset($_POST['edit_customer_name']) ? mysqli_real_escape_string($link, strtoupper($_POST['edit_customer_name'])) : '';
$customer_address = isset($_POST['edit_customer_address']) ? mysqli_real_escape_string($link, strtoupper($_POST['edit_customer_address'])) : '';
$customer_phone = isset($_POST['edit_customer_phone']) ? mysqli_real_escape_string($link, $_POST['edit_customer_phone']) : '';

$select = "UPDATE courier_customer SET customer_name = '$customer_name', customer_address = '$customer_address', customer_phone = '$customer_phone' WHERE cust_id = '$id'";

$select_rs = mysqli_query($link, $select);

if($select_rs) {
	//Creating Log Event
	$activity = "Customer Updated. ID: ".$id;
	
	$insert = "INSERT INTO courier_logs (log_activity, log_user, log_branch) VALUES ('$activity', '$username', '$location')";
	$insert_rs = mysqli_query($link, $insert);
	if($insert_rs) {
		echo 1;
	} else {
		echo $link->error;
	}
} else {
	echo $link->error;
}
?>