<?php
session_start();
require ("../php/connect.php");
$username=$_SESSION['username'];
$location=$_SESSION['branch_code'];

$weight = $_POST['weight'];

if($weight <= 4) {
	$read = "SELECT * FROM courier_rate WHERE '$weight' BETWEEN rate_weight_from AND rate_weight_to";
	$read_rs = mysqli_query($link, $read);
	if($read_rs->num_rows > 0) {
		while($row = mysqli_fetch_assoc($read_rs)) {
			echo $row['price'];
		}
	} else {
		echo '0.00';
	}
} else if ($weight > 4) {

	$getRate = "SELECT rate_constant FROM courier_constants";
	$rs = mysqli_query($link, $getRate);

	if($rs) {
		while($row = mysqli_fetch_assoc($rs)) {
			$rate = $row['rate_constant'];
		}
	}

	$value = $weight * $rate + 5;
		echo $value;
}


?>