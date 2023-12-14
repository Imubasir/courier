<?php
session_start();
require("../php/connect.php");
$username = $_SESSION['username'];
$location = $_SESSION['branch_code'];

$type = $_POST['type'];

if($type == 'daily') {
	$query = "SELECT COUNT(*) as total FROM courier_login WHERE branch_id = '$location'";
	$rs = mysqli_query($link, $query);

	if($rs) {
		while($row = mysqli_fetch_assoc($rs)) {
			echo $row['total'];
		}
	}
} else if ($type == 'monthly') {
	$query = "SELECT count(*) as registered FROM courier_parcel WHERE user_branch = '$location'";
	$rs = mysqli_query($link, $query);

	if($rs) {
		while($row = mysqli_fetch_assoc($rs)) {
			echo $row['registered'];
		}
	}
} else if ($type == 'quarterly') {
	$query = "SELECT count(*) as delivered FROM courier_parcel WHERE assign_status = '3' AND user_branch = '$location'";
	$rs = mysqli_query($link, $query);

	if($rs) {
		while($row = mysqli_fetch_assoc($rs)) {
			echo $row['delivered'];
		}
	}
} else if ($type == 'annually') {
	$query = "SELECT count(*) as destination FROM courier_branches";
	$rs = mysqli_query($link, $query);

	if($rs) {
		while($row = mysqli_fetch_assoc($rs)) {
			echo $row['destination'];
		}
	}
}

?>