<?php
session_start();
require("../php/connect.php");
$username = $_SESSION['username'];

$origin = isset($_POST['sender_origin']) ? $_POST['sender_origin'] : '';
$date_from = isset($_POST['date_from']) ? $_POST['date_from'] : '';
$date_to = isset($_POST['date_to']) ? $_POST['date_to'] : '' ;
$sender_company = isset($_POST['sender_name_select']) ? $_POST['sender_name_select'] : '' ;
$select = '';

if($origin != '' && $sender_company != '' && $date_from != '' && $date_to != '') {
	$select .= "SELECT
	    *
	FROM
	    `courier_parcel`
	LEFT JOIN courier_manifests ON courier_parcel.manifest_code = courier_manifests.manifest_code
	LEFT JOIN courier_payments ON courier_parcel.parcel_code = courier_payments.parcel_code_fk
	WHERE
	    sender_origin = '$origin'
	    AND sender_name = '$sender_company'
	    AND sender_type = 'COMPANY'
	    AND date_created BETWEEN '$date_from' AND DATE_ADD('$date_to', INTERVAL 1 DAY) ORDER BY date_created ASC";
}

 else if ($origin != '' && $sender_company != '') {
 	$select .= "SELECT
	    *
	FROM
	    `courier_parcel`
	LEFT JOIN courier_manifests ON courier_parcel.manifest_code = courier_manifests.manifest_code
	LEFT JOIN courier_payments ON courier_parcel.parcel_code = courier_payments.parcel_code_fk
	WHERE
	    sender_origin = '$origin'
	    AND sender_name = '$sender_company'
	    AND sender_type = 'COMPANY' ORDER BY date_created ASC";
} 

else if ($origin != '' && $date_from != '' && $date_to != '') {
	$select .= "SELECT
		    *
		FROM
		    `courier_parcel`
		LEFT JOIN courier_manifests ON courier_parcel.manifest_code = courier_manifests.manifest_code
		LEFT JOIN courier_payments ON courier_parcel.parcel_code = courier_payments.parcel_code_fk
		WHERE
			sender_type = 'COMPANY'
		    AND sender_origin = '$origin'
		    AND date_created BETWEEN '$date_from' AND DATE_ADD('$date_to', INTERVAL 1 DAY) ORDER BY date_created ASC";
} 

else if ($sender_company != '' && $date_from != '' && $date_to != '') {
	$select .= "SELECT
	    *
	FROM
	    `courier_parcel`
	LEFT JOIN courier_manifests ON courier_parcel.manifest_code = courier_manifests.manifest_code
	LEFT JOIN courier_payments ON courier_parcel.parcel_code = courier_payments.parcel_code_fk
	WHERE
	    sender_name = '$pay_method'
	    AND sender_type = 'COMPANY'
	    AND date_created BETWEEN '$date_from' AND DATE_ADD('$date_to', INTERVAL 1 DAY) ORDER BY date_created ASC";
}

else if ($origin != '') {
	$select .= "SELECT
	    *
	FROM
	    `courier_parcel`
	LEFT JOIN courier_manifests ON courier_parcel.manifest_code = courier_manifests.manifest_code
	LEFT JOIN courier_payments ON courier_parcel.parcel_code = courier_payments.parcel_code_fk
	WHERE
		sender_type = 'COMPANY'
	    AND sender_origin = '$origin' ORDER BY date_created ASC";
} 

else if ($sender_company != '') {
	$select .= "SELECT
	    *
	FROM
	    `courier_parcel`
	LEFT JOIN courier_manifests ON courier_parcel.manifest_code = courier_manifests.manifest_code
	LEFT JOIN courier_payments ON courier_parcel.parcel_code = courier_payments.parcel_code_fk
	WHERE
		sender_type = 'COMPANY'
	    AND sender_name = '$sender_company' ORDER BY date_created ASC";
}

else if ($date_from != '' && $date_to != '') {
	$select .= "SELECT
	    *
	FROM
	    `courier_parcel`
	LEFT JOIN courier_manifests ON courier_parcel.manifest_code = courier_manifests.manifest_code
	LEFT JOIN courier_payments ON courier_parcel.parcel_code = courier_payments.parcel_code_fk
	WHERE
		sender_type = 'COMPANY'
	    AND date_created BETWEEN '$date_from' AND DATE_ADD('$date_to', INTERVAL 1 DAY) ORDER BY date_created ASC";
}


$select_rs = mysqli_query($link, $select);
$data = array();

if($select_rs) {
	while($select_row = mysqli_fetch_assoc($select_rs)) {
		$data[] = $select_row;
	}
}

echo json_encode($data);
?>