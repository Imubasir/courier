<?php
require("connect.php");

$sql = "SELECT COUNT(*) as value, branch_name FROM courier_parcel LEFT JOIN courier_branches ON courier_parcel.user_branch = courier_branches.branch_code WHERE YEAR(date_created) = YEAR(now())";

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