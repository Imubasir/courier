<?php
require("connect.php");
$today = date('Y-m-d');

$sql = "SELECT DISTINCT COUNT(*) as value, branch_name FROM `courier_parcel` LEFT JOIN `courier_branches` ON user_branch = courier_branches.branch_code WHERE MONTH(date_created) = MONTH(now())";
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