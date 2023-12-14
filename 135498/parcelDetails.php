<?php
session_start();
require("../php/connect.php");
$username = $_SESSION['username'];
$location = $_SESSION['branch_code'];

$parcelcode = $_POST['parcelcode'];
$select = "SELECT * FROM courier_parcel LEFT JOIN courier_payments ON parcel_code = parcel_code_fk WHERE parcel_code = '$parcelcode'";
$select_rs = mysqli_query($link, $select);
$data = array();

if($select_rs) {
	while($select_row = mysqli_fetch_assoc($select_rs)) {
		$data[] = $select_row;
	}
}
echo json_encode($data);
?>