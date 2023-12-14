<?php
session_start();
require("../php/connect.php");
$username = $_SESSION['username'];
$m_code = trim($_POST['m_code']);
// echo $m_code
$select = "SELECT * FROM courier_parcel WHERE manifest_code = '$m_code' ORDER BY date_received DESC";
$select_rs = mysqli_query($link, $select);
$data = array();

if($select_rs) {
	while($select_row = mysqli_fetch_assoc($select_rs)) {
		$data[] = $select_row;
	}
}

echo json_encode($data);
?>