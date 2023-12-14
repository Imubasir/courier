<?php
session_start();
require("../php/connect.php");
$username = $_SESSION['username'];
$branch_code = $_SESSION['branch_code'];

$manifest_destination = isset($_POST['manifest_destination']) ? $_POST['manifest_destination'] : '';
$manifest_dispatcher = isset($_POST['manifest_dispatcher']) ? $_POST['manifest_dispatcher'] : '';
$manifest_flight = isset($_POST['manifest_flight']) ? $_POST['manifest_flight'] : '';
$manifest_instr = isset($_POST['manifest_instr']) ? $_POST['manifest_instr'] : '';

$manifest_code = prefix($branch_code).rand(10000000, 100000000).prefix($manifest_destination);

$insert = "INSERT INTO `courier_manifests`(`manifest_code`, `manifest_origin`, `manifest_destination`, `manifest_dispatcher`, `manifest_flight`, `manifest_instr`, `manifest_added_by`, `user_branch`) VALUES ('$manifest_code', '$branch_code', '$manifest_destination', '$manifest_dispatcher', '$manifest_flight', '$manifest_instr', '$username', '$branch_code')";

$insert_rs = mysqli_query($link, $insert);
if($insert_rs) {
	$activity = "New Manifest Created. From : ".$branch_code." To: ".$manifest_destination;
	
	$insert = "INSERT INTO courier_logs (log_activity, log_user, log_branch) VALUES ('$activity', '$username', '$branch_code')";
	$insert_rs = mysqli_query($link, $insert);
	if($insert_rs) {
		echo '1|'.$manifest_code;
	} else 
	echo $link->error;
} else {
	echo $link->error;
}

function prefix($location_code) {
	require ("../php/connect.php");
	$read = "SELECT prefix FROM courier_branches WHERE branch_code = '$location_code'";
	$rs = mysqli_query($link, $read);
	if($rs) {
		while($row = mysqli_fetch_assoc($rs)) {
			return $row['prefix'];
		}
	}
}
?>