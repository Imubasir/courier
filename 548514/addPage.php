<?php
session_start();
require("../php/connect.php");
$username = $_SESSION['username'];
$location = $_SESSION['branch_code'];

$page_name = isset($_POST['page']) ? mysqli_real_escape_string($link, strtoupper($_POST['page'])) : '';
$page_cat = isset($_POST['cat']) ? mysqli_real_escape_string($link, strtoupper($_POST['cat'])) : '';

$select = "INSERT INTO courier_pages (page, page_cat) VALUES ('$page_name', '$page_cat')";
$select_rs = mysqli_query($link, $select);

if($select_rs) {
	//Creating Log Event
	$activity = "New Page Created. Page Name: ".$page_name;
	
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