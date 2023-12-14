<?php
session_start();
require("../php/connect.php");
$username = $_SESSION['username'];

$p_code = $_POST['p_code'];
$data = array();

$select = "SELECT * FROM courier_parcel LEFT JOIN courier_proxy ON courier_parcel.parcel_code = courier_proxy.parcel_code_fk WHERE parcel_code = '$p_code'";


$select_rs = mysqli_query($link, $select);


if($select_rs) {
	while($select_row = mysqli_fetch_assoc($select_rs)) {
		$data[] = $select_row;
	}
}
echo json_encode($data);
?>