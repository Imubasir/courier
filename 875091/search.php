<?php
session_start();
require("../php/connect.php");
$username = $_SESSION['username'];

$m_code = isset($_POST['code']) ? mysqli_real_escape_string($link, $_POST['code']) : '';
$m_date = isset($_POST['date']) ? mysqli_real_escape_string($link, $_POST['date']) : '';
$select = '';
$data = array();

if($m_code != '' && $m_date != '') {
	$select .= "SELECT * FROM courier_manifests WHERE manifest_code = '$m_code' AND manifest_date_added LIKE '$m_date%'";
} else if ($m_code != '') {
	$select .= "SELECT * FROM courier_manifests WHERE manifest_code = '$m_code'";
} else if ($m_date != '') {
	$select .= "SELECT * FROM courier_manifests WHERE manifest_date_added LIKE '$m_date%'";
}

$select_rs = mysqli_query($link, $select);


if($select_rs) {
	while($select_row = mysqli_fetch_assoc($select_rs)) {
		$data[] = $select_row;
	}
}
echo json_encode($data);
?>