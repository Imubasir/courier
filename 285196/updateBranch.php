<?php
session_start();
require("../php/connect.php");
$username = $_SESSION['username'];
$location = $_SESSION['branch_code'];

$id = $_POST['id'];
$branch_name = isset($_POST['edit_branch_name']) ? mysqli_real_escape_string($link, strtoupper($_POST['edit_branch_name'])) : '';
$prefix = isset($_POST['edit_prefix']) ? mysqli_real_escape_string($link, strtoupper($_POST['edit_prefix'])) : '';

$select = "UPDATE courier_branches SET prefix = '$prefix', branch_name = '$branch_name' WHERE branch_code = '$id'";

$select_rs = mysqli_query($link, $select);

if($select_rs) {
	//Creating Log Event
	$activity = "Branch Updated. Branch Name: ".$branch_name;
	
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