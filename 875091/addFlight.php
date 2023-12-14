<?php
session_start();
require("../php/connect.php");
$username = $_SESSION['username'];
$location = $_SESSION['branch_code'];

$flight_name = isset($_POST['flight_name']) ? mysqli_real_escape_string($link, strtoupper($_POST['flight_name'])) : '';
$flight_descr = isset($_POST['flight_descr']) ? mysqli_real_escape_string($link, strtoupper($_POST['flight_descr'])) : '';
$flight_code = 'AWA'.rand(100, 1000);


$select = "INSERT INTO courier_flight (flight_code, flight_name, flight_descr, flight_added_by) VALUES ('$flight_code', '$flight_name', '$flight_descr', '$username')";

$select_rs = mysqli_query($link, $select);

if($select_rs) {
	//Creating Log Event
	$activity = "New Flight Created. Flight Name: ".$flight_name;
	
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