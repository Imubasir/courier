<?php
session_start();
require("../php/connect.php");
$username = $_SESSION['username'];
$user = $_POST['user'];

$data = array();

$select = "SELECT * FROM courier_login WHERE email = '$user'";
$select_rs = mysqli_query($link, $select);


if($select_rs) {
	while($select_row = mysqli_fetch_assoc($select_rs)) {
		$data[] = $select_row;
	}
}
echo json_encode($data);
?>