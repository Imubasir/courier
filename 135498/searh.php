<?php
session_start();
require("../php/connect.php");
$username = $_SESSION['username'];
$location = $_SESSION['branch_code'];

$parcelcode = isset($_POST['code']) ? mysqli_real_escape_string($link, $_POST['code']) : '';
$date_from = isset($_POST['date_from']) ? mysqli_real_escape_string($link, $_POST['date_from']) : '';
$date_to = isset($_POST['date_to']) ? mysqli_real_escape_string($link, $_POST['date_to']) : '';
$select = '';
$data = array();

if($parcelcode != '' && $date_from != '' && $date_to != '') {
	$select .= "SELECT
    *
	FROM
	courier_parcel
	LEFT JOIN courier_payments ON parcel_code = parcel_code_fk
	WHERE
	parcel_code = '$parcelcode'
	AND date_created BETWEEN '$date_from' AND DATE_ADD('$date_to', INTERVAL 1 DAY)
	AND user_branch = '$location'";
} 

else if ($parcelcode != '') {
	$select .= "SELECT
    *
	FROM
	courier_parcel
	LEFT JOIN courier_payments ON parcel_code = parcel_code_fk
	WHERE
	parcel_code = '$parcelcode'
	AND user_branch = '$location'";
} 

else if ($date_from != '' && $date_to != '') {
	$select .= "SELECT
    *
	FROM
	courier_parcel
	LEFT JOIN courier_payments ON parcel_code = parcel_code_fk
	WHERE
	date_created BETWEEN '$date_from' AND DATE_ADD('$date_to', INTERVAL 1 DAY)
	AND user_branch = '$location'";
}

$select_rs = mysqli_query($link, $select);


if($select_rs) {
	while($select_row = mysqli_fetch_assoc($select_rs)) {
		$data[] = $select_row;
	}
} else {
	echo $link->error;
}

echo json_encode($data);
?>