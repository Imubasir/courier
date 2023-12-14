<?php
session_start();
require("../php/connect.php");
$username = $_SESSION['username'];
// echo $m_code
$select = "SELECT * FROM courier_parcel WHERE assign_status = '2' AND WEEK(`date_received`) < WEEK(now())  ORDER BY date_received DESC";
$select_rs = mysqli_query($link, $select);
$data = array();

if($select_rs) {
	while($select_row = mysqli_fetch_assoc($select_rs)) {
		$data[] = $select_row;
	}
}

echo json_encode($data);
?>