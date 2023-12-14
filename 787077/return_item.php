<?php
session_start();
require("../php/connect.php");
$username = $_SESSION['username'];
$location = $_SESSION['branch_code'];

$code= $_POST['code'];
$codes = explode(",", $code);

$p_code = $codes[0];
$m_code = $codes[1];

$today = date('Y-m-d h:i:s');
$update_billing = '';

$select = "UPDATE courier_parcel SET assign_status = '4', manifest_code = '0' WHERE parcel_code = '$p_code'";
$select_rs = mysqli_query($link, $select);

if($select_rs) {

	$billing = "SELECT return_rate FROM courier_constants";
	$billing_rs = mysqli_query($link, $billing);
	if($billing_rs) {
		while($row = mysqli_fetch_assoc($billing_rs)) {
			$bill_amount = $row['return_rate'];
		}

		$select_billing = "SELECT * FROM courier_billings WHERE bill_parcel_code = '$p_code' AND bill_type = 'OVERDUE'";
		$select_billing_rs = mysqli_query($link, $select_billing);
		
		if($select_billing_rs->num_rows > 0) { //overdue billing exits.
			$update_billing .= "UPDATE courier_billings SET bill_amount = '$bill_amount', bill_type = 'RETURN', bill_clear = '0' WHERE bill_parcel_code = '$p_code'";
		} else { //No overdue billing, run ruturn bill
			$update_billing .= "INSERT INTO courier_billings (bill_parcel_code, bill_amount, bill_type) VALUES ('$p_code', '$bill_amount', 'RETURN')";
		}
		
		$update_billing_rs = mysqli_query($link, $update_billing);
		if($update_billing_rs) {
				//Creating Log Event
			$activity = "Parcel - ".$p_code." Returned from : ".$location;
			$insert = "INSERT INTO courier_logs (log_activity, log_user, log_branch) VALUES ('$activity', '$username', '$location')";
			$insert_rs = mysqli_query($link, $insert);
			if($insert_rs) {
		//Updating Tracking Log
				$remark = "ITEM ON ".$m_code. " FROM DESTINATION";

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
	}
} else {
	echo $link->error;
}

?>