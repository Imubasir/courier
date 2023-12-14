<?php
session_start();
require("connect.php");
$username = $_SESSION['username'];

$error = mysqli_real_escape_string($link, $_POST['error']);

$insert = "INSERT INTO courier_error_log (error, error_user) VALUES ('$error', '$username')";
$insert_rs = mysqli_query($link, $insert);

if($insert_rs) {
	echo 1;
}
?>