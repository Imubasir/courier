<?php
session_start();
require("connect.php");
$user = $_SESSION['email'];

$sql = "SELECT CONCAT_WS(' ', firstname, lastname) as name, email FROM courier_login";
$rs = mysqli_query($link, $sql);

$data = array();
if($rs) {
    while($row = mysqli_fetch_assoc($rs)) {
     $data[] = $row;   
    }
} else {
    echo $link->error;
}

echo json_encode($data);
?>