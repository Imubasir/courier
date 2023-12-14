<?php
session_start();
require("../php/connect.php");
$username = $_SESSION['username'];
$location = $_SESSION['branch_code'];

$parcelcode = isset($_POST['parcelcode']) ? mysqli_real_escape_string($link, $_POST['parcelcode']) : '';
$destination = isset($_POST['destination']) ? mysqli_real_escape_string($link, $_POST['destination']) : '';
$date_from = isset($_POST['date_from']) ? mysqli_real_escape_string($link, $_POST['date_from']) : '';
$date_to = isset($_POST['date_to']) ? mysqli_real_escape_string($link, $_POST['date_to']) : '';
$select = '';
$data = array();

if($parcelcode != '' && $date_from != '' && $date_to != '' && $destination != '') {
	$select .= "SELECT
    *
	FROM
	courier_parcel
	WHERE
	parcel_code = '$parcelcode'
	AND date_created BETWEEN '$date_from' AND DATE_ADD('$date_to', INTERVAL 1 DAY)
	AND recipient_destination = '$destination'
	AND user_branch = '$location' ORDER BY date_created ASC";
} 

else if ($parcelcode != '' && $date_from != '' && $date_to != '') {
	$select .= "SELECT
    *
	FROM
	courier_parcel
	WHERE
	parcel_code = '$parcelcode'
	AND date_created BETWEEN '$date_from' AND DATE_ADD('$date_to', INTERVAL 1 DAY)
	AND user_branch = '$location' ORDER BY date_created ASC";
} 

else if ($date_from != '' && $date_to != '' && $destination != '') {
	$select .= "SELECT
    *
	FROM
	courier_parcel
	WHERE
	date_created BETWEEN '$date_from' AND DATE_ADD('$date_to', INTERVAL 1 DAY)
	AND recipient_destination = '$destination'
	AND user_branch = '$location' ORDER BY date_created ASC";
} 

else if ($parcelcode != '' && $destination != '') {
	$select .= "SELECT
    *
	FROM
	courier_parcel
	WHERE
	parcel_code = '$parcelcode'
	AND recipient_destination = '$destination'
	AND user_branch = '$location' ORDER BY date_created ASC";
} 

else if ($parcelcode != '') {
	$select .= "SELECT
    *
	FROM
	courier_parcel
	WHERE
	parcel_code = '$parcelcode'
	AND user_branch = '$location' ORDER BY date_created ASC";
} 

else if ($date_from != '' && $date_to != '') {
	$select .= "SELECT
    *
	FROM
	courier_parcel
	WHERE
	date_created BETWEEN '$date_from' AND DATE_ADD('$date_to', INTERVAL 1 DAY)
	AND user_branch = '$location' ORDER BY date_created ASC";
} 

else if ($destination != '') {
	$select .= "SELECT
    *
	FROM
	courier_parcel
	WHERE
	recipient_destination = '$destination'
	AND user_branch = '$location' ORDER BY date_created ASC";
}

$select_rs = mysqli_query($link, $select);


if($select_rs) {
	while($select_row = mysqli_fetch_assoc($select_rs)) {
		$data[] = $select_row;
	}
}
echo json_encode($data);
?>