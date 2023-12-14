<?php
session_start();
require("../php/connect.php");
$username = $_SESSION['username'];
$location = $_SESSION['branch_code'];

$type_code = isset($_POST['type_code']) ? mysqli_real_escape_string($link, strtoupper($_POST['type_code'])) : '';
$type_descr = isset($_POST['type_descr']) ? mysqli_real_escape_string($link, strtoupper($_POST['type_descr'])) : '';


$select = "INSERT INTO courier_parceltype (parcelType_code, parcelType_descr) VALUES ('$type_code', '$type_descr')";

$select_rs = mysqli_query($link, $select);


if($select_rs) {
	//Creating Log Event
	$activity = "New Type Created. Type: ".$type_code.". Descr: ".$type_descr;
	
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