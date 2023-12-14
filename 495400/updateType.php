<?php
session_start();
require("../php/connect.php");
$username = $_SESSION['username'];
$location = $_SESSION['branch_code'];

$id = $_POST['id'];
$type_code = isset($_POST['edit_type_code']) ? mysqli_real_escape_string($link, strtoupper($_POST['edit_type_code'])) : '';
$type_descr = isset($_POST['edit_type_descr']) ? mysqli_real_escape_string($link, strtoupper($_POST['edit_type_descr'])) : '';


$select = "UPDATE courier_parceltype SET parcelType_code = '$type_code', parcelType_descr = '$type_descr' WHERE parcelType_id = '$id' ";

$select_rs = mysqli_query($link, $select);


if($select_rs) {
	//Creating Log Event
	$activity = "Type Updated. Code: ".$type_code.". Descr: ".$type_descr;
	
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