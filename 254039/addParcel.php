<?php
// declare(strict_types=1);
session_start();
error_reporting(E_ALL);
require ("../php/connect.php");
$username=$_SESSION['username'];
$location=$_SESSION['branch_code'];

// Sender Details
$senderType = isset($_POST['sender_type']) ? mysqli_real_escape_string($link, strtoupper($_POST['sender_type'])) : '';
$sender1 = isset($_POST['sender_name']) ?  mysqli_real_escape_string($link, strtoupper($_POST['sender_name'])) : '';
$sender2 = isset($_POST['sender_name_select']) ? mysqli_real_escape_string($link, strtoupper($_POST['sender_name_select'])) : '';

if($sender1 != '') {
	$senderName = $sender1;
} else {
	$senderName = $sender2;
}

$senderAddress = mysqli_real_escape_string($link, strtoupper($_POST['sender_address']));
$sender_email = mysqli_real_escape_string($link, strtoupper($_POST['sender_email']));
$senderLocation = mysqli_real_escape_string($link, strtoupper($_POST['sender_location']));
// $senderCity = mysqli_real_escape_string($link, strtoupper($_POST['sender_city']));
$senderPhone = mysqli_real_escape_string($link, $_POST['sender_phone']);
$senderOrigin = isset($_POST['sender_origin']) ? mysqli_real_escape_string($link, strtoupper($_POST['sender_origin'])) : '';

// // Receiver Details
$recipient1 = isset($_POST['recipient_name']) ? mysqli_real_escape_string($link, strtoupper($_POST['recipient_name'])) : ''; ;
$recipient2 = isset($_POST['recipient_sender_name_select']) ? mysqli_real_escape_string($link, strtoupper($_POST['recipient_sender_name_select'])) : ''; ;

if($recipient1 != '') {
	$recipientName = $recipient1;
} else {
	$recipientName = $recipient2;
}

$recipientAddress = mysqli_real_escape_string($link, strtoupper($_POST['recipient_address']));
$recipient_email = mysqli_real_escape_string($link, strtoupper($_POST['recipient_email']));
$recipientLocation = mysqli_real_escape_string($link, strtoupper($_POST['recipient_location']));
// $recipientCity = mysqli_real_escape_string($link, strtoupper($_POST['recipient_city']));
$recipientPhone = mysqli_real_escape_string($link, $_POST['recipient_phone']);
$recipientDestination = isset($_POST['recipient_destination']) ? mysqli_real_escape_string($link, strtoupper($_POST['recipient_destination'])) : '';

// Parcel Details
$flight = mysqli_real_escape_string($link, strtoupper($_POST['flight']));
$parcel_group = mysqli_real_escape_string($link, strtoupper($_POST['parcel_group']));
$serviceType = mysqli_real_escape_string($link, strtoupper($_POST['serviceType']));
$parcelType = mysqli_real_escape_string($link, strtoupper($_POST['parcel_type']));
$parcelQuantity = isset($_POST['parcel_quantity']) ? mysqli_real_escape_string($link, $_POST['parcel_quantity']) : 0;
$parcelW = roundUp(mysqli_real_escape_string($link, $_POST['parcel_weight']), 0.5);

$large_parcel_check = $_POST['large_parcel_check'];
if($large_parcel_check == 'true') {
	$large_parcel = 'Y';
	$parcel_length =  $_POST['length'];
	$parcel_width =  $_POST['width'];
	$parcel_height =  $_POST['height'];
	$parcel_volume = ($parcel_length*$parcel_width*$parcel_height)/6000;
} else if ($large_parcel_check == 'false') {
	$large_parcel = 'N';
	$parcel_length =  '';
	$parcel_width =  '';
	$parcel_height =  '';
	$parcel_volume = '0';
}

if ($parcel_volume > $parcelW) {
	$parcelWeight = $parcel_volume;
} else {
	$parcelWeight = $parcelW;
}

$parcelDescription = mysqli_real_escape_string($link, strtoupper($_POST['parcel_description']));
$insurance = mysqli_real_escape_string($link, strtoupper($_POST['insurance']));
$parcelValue = isset($_POST['parcel_value']) ? mysqli_real_escape_string($link, $_POST['parcel_value']) : 0;
$amount = sprintf('%.2f', getRate($parcelWeight));

$parcelCode = prefix($senderOrigin).time().prefix($recipientDestination);

//Insert Query
$query = "INSERT INTO `courier_parcel`(`parcel_code`, `parcel_group`, `sender_type`, `sender_name`, `sender_address`, `sender_email`, `sender_location`, `sender_telephone`, `sender_origin`, `recipient_name`, `recipient_address`, `recipient_email`, `recipient_location`, `recipient_telephone`, `recipient_destination`, `flight`, `service_type`, `parcel_type`, `no_items`, `weight`, `volume`, `amount`, `content_descr`, `insurance`, `value_of_item`, `created_by`, `user_branch`) VALUES ('$parcelCode', '$parcel_group', '$senderType', '$senderName', '$senderAddress', '$sender_email', '$senderLocation', '$senderPhone', '$senderOrigin', '$recipientName', '$recipientAddress', '$recipient_email', '$recipientLocation', '$recipientPhone', '$recipientDestination', '$flight', '$serviceType', '$parcelType', '$parcelQuantity', '$parcelW', '$parcel_volume', '$amount', '$parcelDescription', '$insurance', '$parcelValue', '$username', '$location')";

$query_result = mysqli_query($link, $query);
if($query_result) {
	//Creating Log Event
	$activity = "New Consignment Created. Parcel Code: ".$parcelCode;
	
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

//Payment Structure
function getRate($weight) {
	require ("../php/connect.php");
	if($weight <= 4) {
		$read = "SELECT * FROM courier_rate WHERE '$weight' BETWEEN rate_weight_from AND rate_weight_to";
		$read_rs = mysqli_query($link, $read);
		if($read_rs) {
			while($row = mysqli_fetch_assoc($read_rs)) {
				return $row['price'];
			}
		} else {
			return 'Not Defined';
		}

	} else if ($weight > 4) {
		$getRate = "SELECT rate_constant FROM courier_constantS";
		$rs = mysqli_query($link, $getRate);

		if($rs) {
			while($row = mysqli_fetch_assoc($rs)) {
				$rate = $row['rate_constant'];
			}
		}

		$value = $weight * $rate + 5;
		return $value;
	}
}

function prefix($location_code) {
	require ("../php/connect.php");
	$read = "SELECT prefix FROM courier_branches WHERE branch_code = '$location_code'";
	$rs = mysqli_query($link, $read);
	if($rs) {
		while($row = mysqli_fetch_assoc($rs)) {
			return $row['prefix'];
		}
	}
}

function roundUp($number, $nearest) {	
	return sprintf('%.2f', (ceil($number/$nearest) * 0.5));
	;
}
?>