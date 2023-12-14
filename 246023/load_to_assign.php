<?php
session_start();
require("../php/connect.php");
$username = $_SESSION['username'];
$location = $_SESSION['branch_code'];

$select = "SELECT
    *
FROM
    courier_parcel
LEFT JOIN courier_manifests ON courier_parcel.manifest_code = courier_manifests.manifest_code
LEFT JOIN courier_payments ON courier_parcel.parcel_code = courier_payments.parcel_code_fk
WHERE
pay_type = 'NEW' AND
    (
        courier_parcel.assign_status = '0'
     AND courier_parcel.manifest_code = '0') AND (courier_payments.pay_method != '' OR courier_parcel.sender_type = 'COMPANY') AND courier_parcel.user_branch = '$location'";

$select_rs = mysqli_query($link, $select);
$data = array();

if($select_rs) {
	while($select_row = mysqli_fetch_assoc($select_rs)) {
		$data[] = $select_row;
	}
}

echo json_encode($data);
?>