<?php
session_start();
require("../php/connect.php");
$username = $_SESSION['username'];
$location = $_SESSION['branch_code'];

$page_id = isset($_POST['page_id']) ? mysqli_real_escape_string($link, strtoupper($_POST['page_id'])) : '';
$group_id = isset($_POST['group_id']) ? mysqli_real_escape_string($link, strtoupper($_POST['group_id'])) : '';

$check_access = "SELECT * FROM courier_page_access WHERE group_id_fk = '$group_id' AND group_page_fk = '$page_id'";
$check_rs = mysqli_query($link, $check_access);

if ($check_rs->num_rows > 0) {
	$select = "DELETE FROM courier_page_access WHERE group_id_fk = '$group_id' AND group_page_fk = '$page_id'";
	$select_rs = mysqli_query($link, $select);
	
	if($select_rs) {
		//Creating Log Event
		$activity = "Access Created: Group: ".$group_id." Page: ".$page_id;
		
		$insert = "INSERT INTO courier_logs (log_activity, log_user, log_branch) VALUES ('$activity', '$username', '$location')";
		$insert_rs = mysqli_query($link, $insert);
		if($insert_rs) {
			echo 1;
		} else {
			echo $link->error;
		}
	} else {
		echo $link->error;
	}
} else {
	echo $link->error;
}


?>