<?php
session_start();
require("../php/connect.php");
$username = $_SESSION['username'];
$location = $_SESSION['branch_code'];

$m_code= $_POST['m_code'];
$today = date('Y-m-d h:i:s');

$select = "UPDATE courier_manifests SET manifest_dispatch_status = '2', manifest_date_received = '$today' WHERE manifest_code = '$m_code'";
$select_rs = mysqli_query($link, $select);

if($select_rs) {
	//Creating Log Event
	$activity = "Manifest Received - ".$m_code.' AT '.$location;
	
	$insert = "INSERT INTO courier_logs (log_activity, log_user, log_branch) VALUES ('$activity', '$username', '$location')";
	$insert_rs = mysqli_query($link, $insert);
	if($insert_rs) {
		echo '1';
	}
} else {
	echo $link->error;
}

?>