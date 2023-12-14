<?php
session_start();
require("../php/connect.php");
$username = $_SESSION['username'];
$location = $_SESSION['branch_code'];

$customer_name = isset($_POST['customer_name']) ? mysqli_real_escape_string($link, strtoupper($_POST['customer_name'])) : '';
$customer_address = isset($_POST['customer_address']) ? mysqli_real_escape_string($link, strtoupper($_POST['customer_address'])) : '';
$customer_phone = isset($_POST['customer_phone']) ? mysqli_real_escape_string($link, $_POST['customer_phone']) : '';

$select = "INSERT INTO courier_customer (customer_name, customer_address, customer_phone, customer_added_by) VALUES ('$customer_name', '$customer_address', '$customer_phone', '$username')";

$select_rs = mysqli_query($link, $select);

if($select_rs) {
	//Creating Log Event
	$activity = "New Customer Created. Name: ".$customer_name;
	
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