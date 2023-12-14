<?php
session_start();
require("../php/connect.php");
$username = $_SESSION['username'];
$location = $_SESSION['branch_code'];
$m_code = $_POST['m_code'];

$data = array();

$select = "SELECT
    	DISTINCT (parcel_code), courier_parcel.*, courier_manifests.*, courier_payments.*
FROM
courier_parcel
LEFT JOIN courier_manifests ON courier_parcel.manifest_code = courier_manifests.manifest_code
LEFT JOIN courier_payments ON courier_parcel.parcel_code = courier_payments.parcel_code_fk
WHERE
pay_type = 'NEW' AND
(
    courier_parcel.manifest_code = '$m_code' AND courier_manifests.manifest_dispatch_status = '0'
) OR (courier_parcel.manifest_code = '0' AND courier_payments.pay_method != '' OR courier_parcel.sender_type = 'COMPANY') AND courier_parcel.user_branch = '$location'";
$select_rs = mysqli_query($link, $select);

if($select_rs) {
	while($select_row = mysqli_fetch_assoc($select_rs)) {
		$data[] = $select_row;
	}
}


//Add Return Parcels
$check = "SELECT
    *
FROM
    courier_parcel
LEFT JOIN courier_manifests ON courier_parcel.manifest_code = courier_manifests.manifest_code
WHERE
courier_parcel.assign_status = '4' OR courier_parcel.assign_status = '5'
AND (courier_parcel.manifest_code = '0' OR courier_parcel.manifest_code = '$m_code')
AND
recipient_destination = '$location'";

$check_rs = mysqli_query($link, $check);
if($check_rs) {
    while($row_ = mysqli_fetch_assoc($check_rs)) {
        $data[] = $row_;
    }
} else {
    echo $link->error;
}

echo json_encode($data);
?>