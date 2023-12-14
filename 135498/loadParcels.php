<?php
session_start();
require("../php/connect.php");

$username = $_SESSION['username'];
$location = $_SESSION['branch_code'];
$today = date('Y-m-d');

$select = "SELECT * FROM courier_parcel WHERE date_created LIKE '$today%' AND user_branch = '$location'";
$select_rs = mysqli_query($link, $select);
$data = array();

if($select_rs) {
	while($select_row = mysqli_fetch_assoc($select_rs)) {
		$data[] = $select_row;
	}
}
echo json_encode($data);
?>