<?php
session_start();
require("../php/connect.php");
$username = $_SESSION['username'];
$parcelcode = $_POST['parcelcode'];

$select = "SELECT * FROM courier_parcel WHERE parcel_code = '$parcelcode'";
$select_rs = mysqli_query($link, $select);
$data = array();

if($select_rs) {
	while($select_row = mysqli_fetch_assoc($select_rs)) {
		$data[] = $select_row;
	}
}
echo json_encode($data);
?>