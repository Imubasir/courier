<?php
session_start();
require("../php/connect.php");

$username = $_SESSION['username'];
$location = $_SESSION['branch_code'];

$select = "SELECT * FROM courier_parcel WHERE DATE(date_created) = DATE(now()) AND user_branch = '$location'";
$select_rs = mysqli_query($link, $select);
$data = array();

if($select_rs) {
	while($select_row = mysqli_fetch_assoc($select_rs)) {
		$data[] = $select_row;
	}
}
echo json_encode($data);
?>