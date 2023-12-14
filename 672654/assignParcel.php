<?php
session_start();
require("../php/connect.php");
$username = $_SESSION['username'];
$location=$_SESSION['branch_code'];

$m_code = $_POST['m_code'];
$parcelCode = $_POST['p_code'];
$codes = explode("_", $parcelCode);
$p_code = $codes[0];
$r_code = $codes[1];

$status = $_POST['status'];
$select = '';
$activity = '';

if($status == 'assign') {
	if($r_code == 'return') {
		$select = "UPDATE courier_parcel SET manifest_code = '$m_code', assign_status = '5' WHERE parcel_code = '$p_code'";
	} else if ($r_code == 'sending') {
		$select = "UPDATE courier_parcel SET manifest_code = '$m_code', assign_status = '1' WHERE parcel_code = '$p_code'";
	}

	$select_rs = mysqli_query($link, $select);

	if($select_rs) {
	//Creating Log Event
		$activity .= "Parcel - ".$p_code." Assigned to : ".$m_code;
		$insert = "INSERT INTO courier_logs (log_activity, log_user) VALUES ('$activity', '$username')";
		$insert_rs = mysqli_query($link, $insert);
		if($insert_rs) {
		//Updating Tracking Log
			$remark = "ITEM ADDED TO MANIFEST - ".$m_code;

			$insert_trk = "INSERT INTO courier_tracking (parcel_code_fk, stage, location, remark, track_created_by) VALUES ('$p_code', '2', '$location', '$remark', '$username')";
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


} else if ($status == 'unassign') {
	if($r_code == 'return') {
		$select = "UPDATE courier_parcel SET manifest_code = '0', assign_status = '4' WHERE parcel_code = '$p_code'";
	} else if ($r_code == 'sending') {
		$select = "UPDATE courier_parcel SET manifest_code = '0', assign_status = '0' WHERE parcel_code = '$p_code'";
	}

	$select_rs = mysqli_query($link, $select);

	if($select_rs) {
	//Creating Log Event
		$activity .= "Parcel - ".$p_code." Removed from : ".$m_code;
		$insert = "INSERT INTO courier_logs (log_activity, log_user, log_branch) VALUES ('$activity', '$username', '$location')";
		$insert_rs = mysqli_query($link, $insert);
		if($insert_rs) {
		//Updating Tracking Log
			$remark = "ITEM ADDED TO MANIFEST - ".$m_code;

			$remv_trk = "DELETE FROM courier_tracking WHERE remark = '$remark' AND parcel_code_fk = '$p_code'";
			$trk_rs = mysqli_query($link, $remv_trk);
			if($trk_rs) {
				echo 1;
			} else {
				echo $link->error;
			}
		}
	} else {
		echo $link->error;
	}
}

?>