<?php
session_start();
require("../php/connect.php");
$username = $_SESSION['username'];

$email = $_POST['email'];
$user_group = $_POST['user_group'];
$userLogin_status = $_POST['userLogin_status'];

$select = "UPDATE courier_login SET access_group = '$user_group', log_status = '$userLogin_status' WHERE email = '$email' ";
$select_rs = mysqli_query($link, $select);


if($select_rs) {
	echo 1;
} else {
	echo $link->error;
}
?>