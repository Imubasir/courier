<?php
session_start();
require("../php/connect.php");
$username = $_SESSION['username'];
$location = $_SESSION['branch_code'];

$id = $_POST['id'];
$weight_from = isset($_POST['edit_weight_from']) ? mysqli_real_escape_string($link, $_POST['edit_weight_from']) : '';
$weight_to = isset($_POST['edit_weight_to']) ? mysqli_real_escape_string($link, $_POST['edit_weight_to']) : '';
$weight = $weight_from.' - '.$weight_to;
$price = isset($_POST['edit_price']) ? mysqli_real_escape_string($link, $_POST['edit_price']) : '';


$select = "UPDATE courier_rate SET rate_weight_from = '$weight_from', rate_weight_to = '$weight_to', price = '$price', rate_branch = '$location' WHERE rate_id = '$id' ";

$select_rs = mysqli_query($link, $select);


if($select_rs) {
	//Creating Log Event
	$activity = "Rate Updated. Weight: ".$weight.". Price ".$price;
	
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