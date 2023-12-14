<?php
require("connect.php");
session_start();
$user = $_SESSION['email'];

$data = array();

$sql = "SELECT DISTINCT(CONCAT_WS(' ', firstname, lastname)) as name FROM courier_login WHERE email = '$user'";
$rs = mysqli_query($link, $sql);

if($rs) {
    while($row = mysqli_fetch_assoc($rs)) {
        echo $row['name'];
    }
} else {
    echo $link->error;
}

?>