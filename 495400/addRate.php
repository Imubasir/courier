<?php
session_start();
require("../php/connect.php");
$username = $_SESSION['username'];
$location = $_SESSION['branch_code'];

$weight_from = isset($_POST['weight_from']) ? mysqli_real_escape_string($link, $_POST['weight_from']) : '';
$weight_to = isset($_POST['weight_to']) ? mysqli_real_escape_string($link, $_POST['weight_to']) : '';
$weight = $weight_from.' - '.$weight_to;
$price = isset($_POST['price']) ? mysqli_real_escape_string($link, $_POST['price']) : '';


$select = "INSERT INTO courier_rate (rate_weight_from, rate_weight_to, price, rate_added_by, rate_branch) VALUES ('$weight_from', '$weight_to', '$price', '$username', '$location')";

$select_rs = mysqli_query($link, $select);


if($select_rs) {
	//Creating Log Event
	$activity = "New Rate Created. Weight: ".$weight.". Price ".$price;
	
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