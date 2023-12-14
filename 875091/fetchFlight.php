<?php
session_start();
require("../php/connect.php");
$username = $_SESSION['username'];
$id = $_POST['id'];

$data = array();

$select = "SELECT * FROM courier_flight WHERE flight_code = '$id'";
$select_rs = mysqli_query($link, $select);


if($select_rs) {
	while($select_row = mysqli_fetch_assoc($select_rs)) {
		$data[] = $select_row;
	}
}
echo json_encode($data);
?>