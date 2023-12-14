<?php
session_start();
require("../php/connect.php");
$username = $_SESSION['username'];
$location = $_SESSION['branch_code'];

$parcelcode = isset($_POST['code']) ? mysqli_real_escape_string($link, $_POST['code']) : '';
$pay_type = isset($_POST['parcel_group']) ? mysqli_real_escape_string($link, $_POST['parcel_group']) : '';
$date_from = isset($_POST['date_from']) ? mysqli_real_escape_string($link, $_POST['date_from']) : '';
$date_to = isset($_POST['date_to']) ? mysqli_real_escape_string($link, $_POST['date_to']) : '';

$select = '';
$data = array();

if($parcelcode != '' && $pay_type != '' && $date_from != '' && $date_to != '') {
	$select .= "SELECT
    *
	FROM
	courier_payments
	LEFT JOIN courier_parcel ON courier_payments.parcel_code_fk = courier_parcel.parcel_code
	WHERE
	parcel_code_fk = '$parcelcode'
	AND pay_type = '$pay_type',
	AND payment_date BETWEEN '$date_from' AND DATE_ADD('$date_to', INTERVAL 1 DAY)
	AND payment_branch = '$location'";
} 

else if ($parcelcode != '' && $pay_type != '') {
	$select .= "SELECT
    *
	FROM
	courier_payments
	LEFT JOIN courier_parcel ON courier_payments.parcel_code_fk = courier_parcel.parcel_code
	WHERE
	parcel_code_fk = '$parcelcode' 
	AND pay_type = '$pay_type',
	AND payment_branch = '$location'";
}

else if ($date_from != '' && $date_to != '' && $pay_type != '') {
	$select .= "SELECT
    *
	FROM
	courier_payments
	LEFT JOIN courier_parcel ON courier_payments.parcel_code_fk = courier_parcel.parcel_code
	WHERE
	payment_date BETWEEN '$date_from' AND DATE_ADD('$date_to', INTERVAL 1 DAY)
	AND pay_type = '$pay_type'
	AND payment_branch = '$location'";
} 

else if ($parcelcode != '') {
	$select .= "SELECT
    *
	FROM
	courier_payments
	LEFT JOIN courier_parcel ON courier_payments.parcel_code_fk = courier_parcel.parcel_code
	WHERE
	parcel_code_fk = '$parcelcode'
	AND payment_branch = '$location'";
} 

else if ($pay_type != '') {
	$select .= "SELECT
    *
	FROM
	courier_payments
	LEFT JOIN courier_parcel ON courier_payments.parcel_code_fk = courier_parcel.parcel_code
	WHERE
	pay_type = '$pay_type'
	AND payment_branch = '$location'";
} 

else if ($date_from != '' && $date_to != '') {
	$select .= "SELECT
    *
	FROM
	courier_payments
	LEFT JOIN courier_parcel ON courier_payments.parcel_code_fk = courier_parcel.parcel_code
	WHERE
	payment_date BETWEEN '$date_from' AND DATE_ADD('$date_to', INTERVAL 1 DAY)
	AND payment_branch = '$location'";
} else {
	echo $link->error;
}

$select_rs = mysqli_query($link, $select);


if($select_rs) {
	while($select_row = mysqli_fetch_assoc($select_rs)) {
		$data[] = $select_row;
	}
}
echo json_encode($data);
?>