<?php
session_start();
require("../php/connect.php");
$username = $_SESSION['username'];
$location = $_SESSION['branch_code'];

$code= $_POST['code'];
$codes = explode(",", $code);
$p_code = $codes[0];
$m_code = $codes[1];
$r_code = $codes[2];

$today = date('Y-m-d h:i:s');

if($r_code == 'returned') {
	$select = "UPDATE courier_parcel SET assign_status = '6', date_received = '$today' WHERE parcel_code = '$p_code'";
} else if ($r_code == 'sending') {
	$select = "UPDATE courier_parcel SET assign_status = '2', date_received = '$today' WHERE parcel_code = '$p_code'";
}

$select_rs = mysqli_query($link, $select);

if ($select_rs) {
	//Creating Log Event
	$activity = "Parcel - ".$p_code." Received at : ".$location;
	$insert = "INSERT INTO courier_logs (log_activity, log_user, log_branch) VALUES ('$activity', '$username', '$location')";
	$insert_rs = mysqli_query($link, $insert);
	if($insert_rs) {
		//Updating Tracking Log
		$remark = "ITEM ON ".$m_code. " RECEIVED AT DESTINATION";

		$insert_trk = "INSERT INTO courier_tracking (parcel_code_fk, stage, location, remark, track_created_by) VALUES ('$p_code', '4', '$location', '$remark', '$username')";
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