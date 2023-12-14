<?php
session_start();
require("../php/connect.php");
$username = $_SESSION['username'];
$const_id = $_POST['const_id'];
$constant = $_POST['newConstant'];

$select = "UPDATE courier_constants SET rate_constant = '$constant' WHERE constant_id = '$const_id'";
$select_rs = mysqli_query($link, $select);

if($select_rs) {
	echo 1;
} else {
	echo $link->error;
}
?>