<?php
session_start();
require("../php/connect.php");
$username = $_SESSION['username'];
$user = $_POST['user'];


$select = "DELETE FROM courier_login WHERE email = '$user'";
$select_rs = mysqli_query($link, $select);


if($select_rs) {
	echo 1;
} else {
	echo $link->error;
}
?>