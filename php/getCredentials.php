<?php
require("connect.php");

$token = $_POST['token'];
$data = array();

$sql = "SELECT * FROM courier_login WHERE token = '$token'";
$rs = mysqli_query($link, $sql);

if($rs) {
    while($row = mysqli_fetch_assoc($rs)) {
        $data[] = $row;
    }
} else {
    echo $link->error;
}

echo json_encode($data);

?>