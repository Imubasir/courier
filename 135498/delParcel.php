<?php
session_start();
require("../php/connect.php");
$username = $_SESSION['username'];
$location = $_SESSION['branch_code'];

$parcelcode = $_POST['parcelcode'];

$select = "SELECT * FROM courier_parcel WHERE parcel_code = '$parcelcode'";
$select_rs = mysqli_query($link, $select);

if($select_rs) {
	while($row = mysqli_fetch_assoc($select_rs)) {
		if($row['manifest_code'] == '0') {
			$del = "DELETE FROM courier_parcel WHERE parcel_code = '$parcelcode'";
			$del_rs = mysqli_query($link, $del);

			if($del_rs) {
				echo 1;
			} else {
				echo $link->error;
			}
		} else {
			echo 2;
		}
	}
} else {
	echo $link->error;
}


?>