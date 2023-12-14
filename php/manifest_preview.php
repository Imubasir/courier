<?php
session_start();
require("connect.php");
$user = $_SESSION['email'];
$code = $_POST['manifestCode'];

$sql = "SELECT * FROM courier_manifests LEFT JOIN courier_branches ON manifest_destination = branch_code WHERE manifest_code = '$code'";
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