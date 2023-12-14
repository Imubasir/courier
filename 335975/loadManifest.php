<?php
session_start();
require("../php/connect.php");
$username = $_SESSION['username'];
$branch_code = $_SESSION['branch_code'];

$select = "SELECT * FROM courier_manifests WHERE manifest_destination = '$branch_code' AND (manifest_dispatch_status = '1' OR manifest_dispatch_status = '2')";
// $select = "SELECT * FROM courier_manifests WHERE manifest_destination = '$branch_code' AND (manifest_dispatch_status = '1' OR manifest_dispatch_status = '2')  AND user_branch != '$branch_code'";
$select_rs = mysqli_query($link, $select);
$data = array();

if($select_rs) {
	while($select_row = mysqli_fetch_assoc($select_rs)) {
		$data[] = $select_row;
	}
}

echo json_encode($data);
?>