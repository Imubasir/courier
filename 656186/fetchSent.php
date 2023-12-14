<?php
session_start();
require("../php/connect.php");
$username = $_SESSION['username'];

$origin = isset($_POST['sender_origin']) ? $_POST['sender_origin'] : '';
$date_from = isset($_POST['date_from']) ? $_POST['date_from'] : '';
$date_to = isset($_POST['date_to']) ? $_POST['date_to'] : '' ;
$pay_method = isset($_POST['pay_method']) ? $_POST['pay_method'] : '' ;
$select = '';

if($origin != '' && $pay_method != '' && $date_from != '' && $date_to != '') {
	$select .= "SELECT
	    *
	FROM
	    `courier_parcel`
	LEFT JOIN courier_manifests ON courier_parcel.manifest_code = courier_manifests.manifest_code
	LEFT JOIN courier_payments ON courier_parcel.parcel_code = courier_payments.parcel_code_fk
	WHERE
	    sender_origin = '$origin'
	    AND pay_method = '$pay_method'
	    AND pay_type = 'OVERDUE'
	    AND date_created BETWEEN '$date_from' AND DATE_ADD('$date_to', INTERVAL 1 DAY) ORDER BY manifest_date_added ";
}

 else if ($origin != '' && $pay_method != '') {
 	$select .= "SELECT
	    *
	FROM
	    `courier_parcel`
	LEFT JOIN courier_manifests ON courier_parcel.manifest_code = courier_manifests.manifest_code
	LEFT JOIN courier_payments ON courier_parcel.parcel_code = courier_payments.parcel_code_fk
	WHERE
	    sender_origin = '$origin'
	    AND pay_type = 'OVERDUE'
	    AND pay_method = '$pay_method' ORDER BY manifest_date_added ASC";
} 

else if ($origin != '' && $date_from != '' && $date_to != '') {
	$select .= "SELECT
		    *
		FROM
		    `courier_parcel`
		LEFT JOIN courier_manifests ON courier_parcel.manifest_code = courier_manifests.manifest_code
		LEFT JOIN courier_payments ON courier_parcel.parcel_code = courier_payments.parcel_code_fk
		WHERE
		    sender_origin = '$origin'
		    AND pay_type = 'OVERDUE'
		    AND date_created BETWEEN '$date_from' AND DATE_ADD('$date_to', INTERVAL 1 DAY) ORDER BY manifest_date_added ASC";
} 

else if ($pay_method != '' && $date_from != '' && $date_to != '') {
	$select .= "SELECT
	    *
	FROM
	    `courier_parcel`
	LEFT JOIN courier_manifests ON courier_parcel.manifest_code = courier_manifests.manifest_code
	LEFT JOIN courier_payments ON courier_parcel.parcel_code = courier_payments.parcel_code_fk
	WHERE
	    pay_method = '$pay_method'
	    AND pay_type = 'OVERDUE'
	    AND date_created BETWEEN '$date_from' AND DATE_ADD('$date_to', INTERVAL 1 DAY) ORDER BY manifest_date_added ASC";
}

else if ($origin != '') {
	$select .= "SELECT
	    *
	FROM
	    `courier_parcel`
	LEFT JOIN courier_manifests ON courier_parcel.manifest_code = courier_manifests.manifest_code
	LEFT JOIN courier_payments ON courier_parcel.parcel_code = courier_payments.parcel_code_fk
	WHERE
	pay_type = 'OVERDUE'
	  AND sender_origin = '$origin' ORDER BY manifest_date_added ASC";
} 

else if ($pay_method != '') {
	$select .= "SELECT
	    *
	FROM
	    `courier_parcel`
	LEFT JOIN courier_manifests ON courier_parcel.manifest_code = courier_manifests.manifest_code
	LEFT JOIN courier_payments ON courier_parcel.parcel_code = courier_payments.parcel_code_fk
	WHERE
	pay_type = 'OVERDUE'
	   AND pay_method = '$pay_method' ORDER BY manifest_date_added ASC";
}

else if ($date_from != '' && $date_to != '') {
	$select .= "SELECT
	    *
	FROM
	    `courier_parcel`
	LEFT JOIN courier_manifests ON courier_parcel.manifest_code = courier_manifests.manifest_code
	LEFT JOIN courier_payments ON courier_parcel.parcel_code = courier_payments.parcel_code_fk
	WHERE
	 pay_type = 'OVERDUE'
	  AND date_created BETWEEN '$date_from' AND DATE_ADD('$date_to', INTERVAL 1 DAY) ORDER BY manifest_date_added ASC";
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