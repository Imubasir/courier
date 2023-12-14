<?php
session_start();
require("../php/connect.php");
$username = $_SESSION['username'];
$location = $_SESSION['branch_code'];

$p_code = $_POST['p_code'];

$pay_check = "SELECT * FROM courier_billings WHERE bill_parcel_code = '$p_code' AND bill_clear = '0'";
$pay_rs = mysqli_query($link, $pay_check);

if($pay_rs->num_rows > 0) {
	while($pay_row = mysqli_fetch_assoc($pay_rs)) {
		$bill_type = $pay_row['bill_type'];
	}
		echo $bill_type.' Payment not Complete';
} else {
	echo 1;
}


?>