<?php
session_start();
require ("../php/connect.php");
$username=$_SESSION['username'];
$location=$_SESSION['branch_code'];

// Sender Details
$senderType = isset($_POST['sender_type']) ? mysqli_real_escape_string($link, strtoupper($_POST['sender_type'])) : '';
$senderName = mysqli_real_escape_string($link, strtoupper($_POST['sender_name']));
$senderAddress = mysqli_real_escape_string($link, strtoupper($_POST['sender_address']));
$senderEmail = mysqli_real_escape_string($link, strtoupper($_POST['sender_email']));
$senderLocation = mysqli_real_escape_string($link, strtoupper($_POST['sender_location']));
// $senderCity = mysqli_real_escape_string($link, strtoupper($_POST['sender_city']));
$senderPhone = mysqli_real_escape_string($link, $_POST['sender_phone']);
$senderOrigin = isset($_POST['sender_origin']) ? mysqli_real_escape_string($link, strtoupper($_POST['sender_origin'])) : '';

// Receiver Details
$recipientName = mysqli_real_escape_string($link, strtoupper($_POST['recipient_name']));
$recipientAddress = mysqli_real_escape_string($link, strtoupper($_POST['recipient_address']));
$recipientEmail = mysqli_real_escape_string($link, strtoupper($_POST['recipient_email']));
$recipientLocation = mysqli_real_escape_string($link, strtoupper($_POST['recipient_location']));
// $recipientCity = mysqli_real_escape_string($link, strtoupper($_POST['recipient_city']));
$recipientPhone = mysqli_real_escape_string($link, $_POST['recipient_phone']);
$recipientDestination = isset($_POST['recipient_destination']) ? mysqli_real_escape_string($link, strtoupper($_POST['recipient_destination'])) : '';

// Parcel Details
$parcelCode = mysqli_real_escape_string($link, strtoupper($_POST['parcelCode']));
$parcel_group = mysqli_real_escape_string($link, strtoupper($_POST['parcel_group']));
$flight = mysqli_real_escape_string($link, strtoupper($_POST['flight']));
$serviceType = mysqli_real_escape_string($link, strtoupper($_POST['serviceType']));
$parcelType = mysqli_real_escape_string($link, strtoupper($_POST['parcel_type']));
$parcelQuantity = isset($_POST['parcel_quantity']) ? mysqli_real_escape_string($link, $_POST['parcel_quantity']) : 0;
$parcelWeight = mysqli_real_escape_string($link, $_POST['parcel_weight']);

$large_parcel_check = $_POST['large_parcel_check'];
if($large_parcel_check == 'true') {
	$large_parcel = 'Y';
	$parcel_length =  $_POST['length'];
	$parcel_width =  $_POST['width'];
	$parcel_height =  $_POST['height'];
	$parcel_volume = $large_parcel.'*'.$parcel_length.'*'.$parcel_width.'*'.$parcel_height;
} else if ($large_parcel_check == 'false') {
	$large_parcel = 'N';
	$parcel_length =  '';
	$parcel_width =  '';
	$parcel_height =  '';
	$parcel_volume = $large_parcel;
}

$parcelDescription = mysqli_real_escape_string($link, strtoupper($_POST['parcel_description']));
$insurance = mysqli_real_escape_string($link, strtoupper($_POST['insurance']));
$parcelValue = isset($_POST['parcel_value']) ? mysqli_real_escape_string($link, $_POST['parcel_value']) : 0;
$amount = 0.5 * $parcelWeight;


//Insert Query
$query = "UPDATE `courier_parcel` SET `sender_type` = '$senderType', `parcel_group` = '$parcel_group', `sender_name` = '$senderName', `sender_address` = '$senderAddress', `sender_email` = '$senderEmail', `sender_location` = '$senderLocation', `sender_telephone` = '$senderPhone', `sender_origin` = '$senderOrigin', `recipient_name` = '$recipientName', `recipient_address` = '$recipientAddress', `recipient_email` = '$recipientEmail', `recipient_location` = '$recipientLocation', `recipient_telephone` = '$recipientPhone', `recipient_destination` = '$recipientDestination', `flight` = '$flight', `service_type` = '$serviceType', `parcel_type` = '$parcelType', `no_items` = '$parcelQuantity', `weight` = '$parcelWeight', `volume` = '$parcel_volume', `amount` = '$amount', `content_descr` = '$parcelDescription', `insurance` = '$insurance', `value_of_item` = '$parcelValue', `created_by` = '$username', `user_branch` = '$location' WHERE `parcel_code` = '$parcelCode'";

$query_result = mysqli_query($link, $query);
if($query_result) {
	//Creating Log Event
	$activity = "Consignment Updated. Parcel Code: ".$parcelCode;
	
	$insert = "INSERT INTO courier_logs (log_activity, log_user, log_branch) VALUES ('$activity', '$username', '$location')";
	$insert_rs = mysqli_query($link, $insert);
	if($insert_rs) {
		//Updating Tracking Log
		$remark = "ITEM RECEIVED AT ORIGIN FACILITY";

		$insert_trk = "INSERT INTO courier_tracking (parcel_code_fk, stage, location, remark, track_created_by) VALUES ('$parcelCode', '1', '$location', '$remark', '$username')";
		$trk_rs = mysqli_query($link, $insert_trk);
		if($trk_rs) {
			echo '1|'.$parcelCode;
		} else {
			echo $link->error;
		}
	}
} else {
	echo $link->error;
}