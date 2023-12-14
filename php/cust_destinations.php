<?php
session_start();
require("connect.php");
$location = $_SESSION['branch_code'];

$sql = "SELECT * FROM courier_branches";

$rs = mysqli_query($link, $sql);

$data = array();
if($rs) {
    while($row = mysqli_fetch_assoc($rs)) {
        if($location == $row['branch_code']) {
                continue;
        } else {
            $data[] = $row;
        }
    }
} else {
    echo $link->error;
}

echo json_encode($data);
?>