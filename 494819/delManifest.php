<?php
session_start();
require("../php/connect.php");
$username = $_SESSION['username'];
$location = $_SESSION['branch_code'];

$m_code = $_POST['manifestCode'];

$select = "SELECT * FROM courier_parcel WHERE manifest_code = '$m_code'";
$select_rs = mysqli_query($link, $select);

if($select_rs->num_rows > 0) {
	echo 2;
} else {

	$select = "DELETE FROM courier_manifests WHERE manifest_code = '$m_code' AND user_branch = '$location'";
	$select_rs = mysqli_query($link, $select);

	if($select_rs) {
		//Creating Log Event
			$activity = "Manifest Deleted. Manifest Code: ".$m_code;
			
			$insert = "INSERT INTO courier_logs (log_activity, log_user, log_branch) VALUES ('$activity', '$username', '$location')";
			$insert_rs = mysqli_query($link, $insert);
			if($insert_rs) {
				echo 1;
			}
	} else {
		echo $link->error;
	}
}



?>