<?php
session_start();
require("../php/connect.php");
$username = $_SESSION['username'];
$parcelcode = $_POST['parcelcode'];

$select = "SELECT * FROM courier_tracking LEFT JOIN courier_branches ON location = branch_code WHERE parcel_code_fk = '$parcelcode' ORDER BY track_date_created ASC";
$select_rs = mysqli_query($link, $select);
$data = array();

if($select_rs) {
	while($select_row = mysqli_fetch_assoc($select_rs)) {
		$data[] = $select_row;
	}
}
echo json_encode($data);
?>