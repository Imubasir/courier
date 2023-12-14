<?php
session_start();
require("../php/connect.php");
$username = $_SESSION['username'];

$page = $_POST['page'];
$group = $_POST['group'];

$select = "SELECT * FROM courier_page_access WHERE group_id_fk = '$group' AND group_page_fk = '$page'";
$select_rs = mysqli_query($link, $select);


if($select_rs->num_rows == 1) {
	echo 1;
} else {
	echo $link->error;
}
?>