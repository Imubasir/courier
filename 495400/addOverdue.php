<?php
session_start();
require("../php/connect.php");
$username = $_SESSION['username'];
$location = $_SESSION['branch_code'];

$day_from = isset($_POST['day_from']) ? mysqli_real_escape_string($link, strtoupper($_POST['day_from'])) : '';
$day_to = isset($_POST['day_to']) ? mysqli_real_escape_string($link, strtoupper($_POST['day_to'])) : '';
$overdue_amount = isset($_POST['overdue_amount']) ? mysqli_real_escape_string($link, strtoupper($_POST['overdue_amount'])) : '';

$select = "INSERT INTO `courier_overdue_amounts` (`over_from`, `over_to`, `over_amount`, `over_added_by`) VALUES ('$day_from', '$day_to', '$overdue_amount', '$username')";

$select_rs = mysqli_query($link, $select);


if($select_rs) {
	//Creating Log Event
	$activity = "New Overdue Amount Created. Range: ".$day_from.' - '.$day_to." Amount: ".$overdue_amount;
	
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