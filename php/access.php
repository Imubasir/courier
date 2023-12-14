<?php
session_start();
require("connect.php");
$username = $_SESSION['username'];
$access = $_SESSION['access'];

$select = "SELECT * FROM courier_page_access WHERE group_id_fk = '$access'";
$select_rs = mysqli_query($link, $select);
$data = array();

if($select_rs) {
	while($select_row = mysqli_fetch_assoc($select_rs)) {
		$data[] = $select_row;
	}
}
echo json_encode($data);
?>