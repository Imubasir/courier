<?php
session_start();
require("../php/connect.php");
$username = $_SESSION['username'];

$data = array();

$select = "SELECT CONCAT_WS(' ', firstname, lastname) as name, branch_name, email, access_group, group_name FROM courier_login LEFT JOIN courier_branches ON courier_branches.branch_code = courier_login.branch_id LEFT JOIN courier_group ON access_group = group_id WHERE log_status != 0";
$select_rs = mysqli_query($link, $select);


if($select_rs) {
	while($select_row = mysqli_fetch_assoc($select_rs)) {
		$data[] = $select_row;
	}
}
echo json_encode($data);
?>