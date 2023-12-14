<?php
session_start();
require("../php/connect.php");
$username = $_SESSION['username'];
$location = $_SESSION['branch_code'];

$p_code = $_POST['p_code'];

$check = "SELECT * FROM courier_parcel WHERE parcel_code = '$p_code'";
$rs=mysqli_query($link, $check);

if($rs->num_rows > 0) {
	while($row = mysqli_fetch_assoc($rs)) {
		$p_group = $row['parcel_group'];

		if ($p_group == '0') {
			$pay_check = "SELECT * FROM courier_payments WHERE parcel_code_fk = '$p_code'";
			$pay_rs = mysqli_query($link, $pay_check);

			if($pay_rs -> num_rows > 0) {
				echo 1;
			} else {
				echo 0;
			}
		} else if ($p_group == '1') {
			echo 1;
		}
	}
} else if ($rs->num_rows < 1) {
	echo 2;
} else {
	echo $link->error;

}



?>