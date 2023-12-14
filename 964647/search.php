<?php
session_start();
require("../php/connect.php");
$username = $_SESSION['username'];
$location = $_SESSION['branch_code'];

$parcelcode = isset($_POST['p_code']) ? mysqli_real_escape_string($link, $_POST['p_code']) : '';
$data = array();

$select = "SELECT * FROM courier_parcel  LEFT JOIN courier_billings ON parcel_code = bill_parcel_code WHERE parcel_code = '$parcelcode' AND user_branch = '$location'";

$select_rs = mysqli_query($link, $select);


if($select_rs) {
	while($select_row = mysqli_fetch_assoc($select_rs)) {
		$data[] = $select_row;
	}
}
echo json_encode($data);
?>