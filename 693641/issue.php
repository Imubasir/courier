<?php
session_start();
require("../php/connect.php");
$username = $_SESSION['username'];
$location = $_SESSION['branch_code'];

$p_code = isset($_POST['code']) ? mysqli_real_escape_string($link, $_POST['code']) : '';
$signature = isset($_POST['code']) ? mysqli_real_escape_string($link, $_POST['signature']) : '';
$name = isset($_POST['code']) ? mysqli_real_escape_string($link, $_POST['name']) : '';

$proxy_state = "N";
$today = date("Y-m-d h:i:s");

$proxy_name = '';
$proxy_id = '';
$proxy_address = '';

if($_POST['proxy_check'] == 'true') {
	$proxy_state = "Y";
	$proxy_name = isset($_POST['proxy_name']) ? mysqli_real_escape_string($link, $_POST['proxy_name']) : '';
	$proxy_id = isset($_POST['proxy_id']) ? mysqli_real_escape_string($link, $_POST['proxy_id']) : '';
	$proxy_address = isset($_POST['proxy_address']) ? mysqli_real_escape_string($link, $_POST['proxy_address']) : '';
}

$select = "UPDATE courier_parcel SET assign_status = '3' WHERE parcel_code = '$p_code'";

$select_rs = mysqli_query($link, $select);

if($select_rs) {

	$insert_proxy = "INSERT INTO courier_proxy (parcel_code_fk, proxy, proxy_name, proxy_ghcard, proxy_address, receiving_signature, receiving_name, date_pickup, issued_by) VALUES ('$p_code', '$proxy_state', '$proxy_name', '$proxy_id', '$proxy_address', '$signature', '$name', '$today', '$username')";

	$proxy_rs = mysqli_query($link, $insert_proxy);


	//Creating Log Event
	$activity = "Parcel - ".$p_code." Issued at : ".$location;
	$insert = "INSERT INTO courier_logs (log_activity, log_user, log_branch) VALUES ('$activity', '$username', '$location')";
	$insert_rs = mysqli_query($link, $insert);
	if($insert_rs) {
		//Updating Tracking Log
		$remark = "ITEM ".$p_code." ISSUED AT DESTINATION";

		$insert_trk = "INSERT INTO courier_tracking (parcel_code_fk, stage, location, remark, track_created_by) VALUES ('$p_code', '5', '$location', '$remark', '$username')";
		$trk_rs = mysqli_query($link, $insert_trk);
		if($trk_rs) {
			echo 1;
		} else {
			echo $link->error;
		}
	}
} else {
	echo $link->error;
}
?>