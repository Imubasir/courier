<?php
session_start();
require("../php/connect.php");
$username = $_SESSION['username'];
$location = $_SESSION['branch_code'];

$branch_name = isset($_POST['branch_name']) ? mysqli_real_escape_string($link, strtoupper($_POST['branch_name'])) : '';
$prefix = isset($_POST['prefix']) ? mysqli_real_escape_string($link, strtoupper($_POST['prefix'])) : '';
$branch_code = $prefix.rand(1000, 10000);

$select = "INSERT INTO courier_branches (branch_code, prefix, branch_name, branch_added_by) VALUES ('$branch_code', '$prefix', '$branch_name', '$username')";

$select_rs = mysqli_query($link, $select);

if($select_rs) {
	//Creating Log Event
	$activity = "New Branch Created. Branch Name: ".$branch_code;
	
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