<?php
session_start();
require("../php/connect.php");
$username = $_SESSION['username'];
$location = $_SESSION['branch_code'];

$p_code = $_POST['p_code'];
$pay_method = $_POST['pay_method'];

$pay_check = "SELECT * FROM courier_billings WHERE bill_parcel_code = '$p_code' AND bill_type = 'RETURN'";

$pay_rs = mysqli_query($link, $pay_check);

if($pay_rs->num_rows > 0) {

	while($row = mysqli_fetch_assoc($pay_rs)) {
		if($row['bill_clear'] == '0') {
			$pay_query = "INSERT INTO courier_payments (parcel_code_fk, pay_type, pay_method, received_by, payment_branch) VALUES ('$p_code', 'RETURN', '$pay_method', '$username', '$location')";

			$rs = mysqli_query($link, $pay_query);
			if($rs) {

				$update_bill = "UPDATE courier_billings SET bill_clear = '1' WHERE bill_parcel_code = '$p_code' AND bill_type = 'RETURN'";
				$update_bill_rs = mysqli_query($link, $update_bill);
				if($update_bill_rs) {
					//Creating Log Event
					$activity = "Payment Confirmed. Parcel Code: ".$p_code;

					$insert = "INSERT INTO courier_logs (log_activity, log_user, log_branch) VALUES ('$activity', '$username', '$location')";
					$insert_rs = mysqli_query($link, $insert);
					if($insert_rs) {
						echo 1;
					}
				}
				
			} else {
				echo $link->error;
			}
		} else if ($row['bill_clear'] == '1') {
			echo 2;
		}
	}
	
} else {
	echo 3;
}



?>