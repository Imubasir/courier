<?php
session_start();
require("../php/connect.php");

$username = $_SESSION['username'];
$location = $_SESSION['branch_code'];
$today = date('Y-m-d');

$select = "SELECT
    *
FROM
    courier_payments
LEFT JOIN courier_parcel ON courier_payments.parcel_code_fk = courier_parcel.parcel_code
WHERE
    payment_date LIKE '$today%' AND payment_branch = '$location' ORDER BY payment_date ASC";
$select_rs = mysqli_query($link, $select);
$data = array();

if($select_rs) {
	while($select_row = mysqli_fetch_assoc($select_rs)) {
		$data[] = $select_row;
	}
}
echo json_encode($data);
?>