<?php
session_start();
require("../php/connect.php");
$username = $_SESSION['username'];
$location = $_SESSION['branch_code'];

$group = isset($_POST['group']) ? mysqli_real_escape_string($link, strtoupper($_POST['group'])) : '';

$select = "INSERT INTO courier_group (group_name, added_by) VALUES ('$group', '$username')";
$select_rs = mysqli_query($link, $select);

if($select_rs) {
	//Creating Log Event
	$activity = "New Group Created. Group Name: ".$group;
	
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