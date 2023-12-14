<?php
session_start();
require("../php/connect.php");
$username = $_SESSION['username'];
$location = $_SESSION['branch_code'];

$codes = $_POST['code'];
$code = explode(",", $codes);
$m_code = $code[0];
$dest = $code[1];

$today = date('Y-m-d h:i:s');

$select = "UPDATE courier_manifests SET manifest_dispatch_status = '1', manifest_date_dispatched = '$today' WHERE manifest_code = '$m_code'";
$select_rs = mysqli_query($link, $select);

if($select_rs) {
	//Creating Log Event
	$activity = "Manifest Dispatched - ".$m_code;
	$insert = "INSERT INTO courier_logs (log_activity, log_user, log_branch) VALUES ('$activity', '$username', '$location')";
	$insert_rs = mysqli_query($link, $insert);
	if($insert_rs) {
		$fetch_parcel = "SELECT parcel_code FROM courier_parcel WHERE manifest_code = '$m_code'";
		$fetch_rs = mysqli_query($link, $fetch_parcel);
		if($fetch_rs) {
			while($row = mysqli_fetch_assoc($fetch_rs)) {
				$p_code=$row['parcel_code'];
				//Updating Tracking Log
				$remark = "ITEM DISPATCHED WITH MANIFEST - ".$m_code." TO ".$dest;

				$insert_trk = "INSERT INTO courier_tracking (parcel_code_fk, stage, location, remark, track_created_by) VALUES ('$p_code', '3', '$location', '$remark', '$username')";
				$trk_rs = mysqli_query($link, $insert_trk);
				if($trk_rs) {
					
				} else {
					echo $link->error;
				}

			}
			echo 1;
		}		
	}
} else {
	echo $link->error;
}
?>