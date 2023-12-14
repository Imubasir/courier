<?php
session_start();
require("../php/connect.php");
$username = $_SESSION['username'];
$location = $_SESSION['branch_code'];

$id = $_POST['id'];
$day_from = isset($_POST['edit_day_from']) ? mysqli_real_escape_string($link, strtoupper($_POST['edit_day_from'])) : '';
$day_to = isset($_POST['edit_day_to']) ? mysqli_real_escape_string($link, strtoupper($_POST['edit_day_to'])) : '';
$overdue_amount = isset($_POST['edit_overdue_amount']) ? mysqli_real_escape_string($link, strtoupper($_POST['edit_overdue_amount'])) : '';

$select = "UPDATE `courier_overdue_amounts` SET `over_from` = '$day_from', `over_to` = '$day_to', `over_amount` = '$overdue_amount' WHERE over_id = '$id'";

$select_rs = mysqli_query($link, $select);


if($select_rs) {
	//Creating Log Event
	$activity = "Overdue Updated. Range: ".$day_from.' - '.$day_to." Amount: ".$overdue_amount;
	
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