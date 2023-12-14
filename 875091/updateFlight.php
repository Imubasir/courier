<?php
session_start();
require("../php/connect.php");
$username = $_SESSION['username'];
$location = $_SESSION['branch_code'];

$id = $_POST['id'];
$flight_name = isset($_POST['edit_flight_name']) ? mysqli_real_escape_string($link, strtoupper($_POST['edit_flight_name'])) : '';
$flight_descr = isset($_POST['edit_flight_descr']) ? mysqli_real_escape_string($link, strtoupper($_POST['edit_flight_descr'])) : '';

$select = "UPDATE courier_flight SET flight_name = '$flight_name', flight_descr = '$flight_descr' WHERE flight_code = '$id'";

$select_rs = mysqli_query($link, $select);

if($select_rs) {
	//Creating Log Event
	$activity = "Flight Updated. Flight Name: ".$flight_name;
	
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