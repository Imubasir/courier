<?php
require("connect.php");
$today = date('Y-m-d');

$sql = "SELECT DISTINCT SUM(amount) as value, payment_branch, branch_name FROM `courier_payments` LEFT JOIN courier_branches ON payment_branch = courier_branches.branch_code LEFT JOIN courier_parcel ON parcel_code = parcel_code_fk WHERE payment_date LIKE '$today%' ";
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