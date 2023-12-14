<?php
session_start();
require("../php/connect.php");
$username = $_SESSION['username'];

$p_code = isset($_POST['code']) ? mysqli_real_escape_string($link, $_POST['code']) : '';
$data = array();

$select = "SELECT
    *
FROM
    `courier_parcel`
LEFT JOIN courier_payments ON courier_parcel.parcel_code = courier_payments.parcel_code_fk
WHERE parcel_code = '$p_code'";


$select_rs = mysqli_query($link, $select);

if($select_rs) {
	while($select_row = mysqli_fetch_assoc($select_rs)) {
		$data[] = $select_row;
	}
}

echo json_encode($data);
?>