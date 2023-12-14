<?php
session_start();
require("../php/connect.php");
$username = $_SESSION['username'];
$location = $_SESSION['branch_code'];

$branch_name = isset($_POST['regional_branch_name']) ? mysqli_real_escape_string($link, strtoupper($_POST['regional_branch_name'])) : '';
$prefix = isset($_POST['regional_prefix']) ? mysqli_real_escape_string($link, strtoupper($_POST['regional_prefix'])) : '';
$branch_code = $prefix.rand(1000, 10000);

$select = "INSERT INTO courier_regional_branches (branch_code, prefix, branch_name, branch_added_by) VALUES ('$branch_code', '$prefix', '$branch_name', '$username')";

$select_rs = mysqli_query($link, $select);

if($select_rs) {
	//Creating Log Event
	$activity = "New Regional Station Created. Branch Name: ".$branch_code;
	
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