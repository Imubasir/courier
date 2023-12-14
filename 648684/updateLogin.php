<?php
session_start();
require("../php/connect.php");
$username = $_SESSION['username'];
$location = $_SESSION['branch_code'];

$fname = $_POST['first_name'];
$lname = $_POST['last_name'];
$user = $_POST['username'];
$staff_password = md5($_POST['staff_password']);
$pswd_check = $_POST['pswd_check'];

if($pswd_check == 'true') {
	$update = "UPDATE courier_login SET firstname = '$fname', lastname = '$lname', password = '$staff_password' WHERE email = '$user'";
	$update_rs = mysqli_query($link, $update);

	if($update_rs) {
		echo 1;
	} else {
		echo $link->error;
	}
} else {
	$update = "UPDATE courier_login SET firstname = '$fname', lastname = '$lname' WHERE email = '$user'";
	$update_rs = mysqli_query($link, $update);

	if($update_rs) {
		echo 1;
	} else {
		echo $link->error;
	}
}

?>
