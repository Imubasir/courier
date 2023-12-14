<?php
session_start();
require("../php/connect.php");
$username = $_SESSION['username'];

$m_code = $_POST['m_code'];

$select = "SELECT * FROM courier_manifests INNER JOIN courier_parcel ON courier_manifests.manifest_code = courier_parcel.manifest_code WHERE courier_manifests.manifest_code = '$m_code'";
$select_rs = mysqli_query($link, $select);
$data = array();

if($select_rs) {
	while($select_row = mysqli_fetch_assoc($select_rs)) {
		$data[] = $select_row;
	}
}

echo json_encode($data);
?>