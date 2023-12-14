<?php
require("connect.php");
$sql = "SELECT * FROM courier_branches";
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