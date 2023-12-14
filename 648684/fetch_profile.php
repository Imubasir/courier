<?php
session_start();
require("../php/connect.php");
$username = $_SESSION['username'];
$location = $_SESSION['branch_code'];
$data = array();

$select = "SELECT * FROM courier_login LEFT JOIN courier_group ON access_group = group_id LEFT JOIN courier_branches ON courier_branches.branch_code = courier_login.branch_id WHERE email = '$username'";
$select_rs = mysqli_query($link, $select);

if($select_rs) {
	while($row = mysqli_fetch_assoc($select_rs)) {
		$data[] = $row;
	}
} else {
	echo $link->error;
}

echo json_encode($data);