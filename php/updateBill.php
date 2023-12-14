<?php
session_start();
require("../php/connect.php");
$username = $_SESSION['username'];
$location = $_SESSION['branch_code'];

$select = "SELECT * FROM courier_parcel WHERE recipient_destination = '$location' AND assign_status = '2' AND WEEK(date_received) < WEEK(now())  ORDER BY date_received DESC";
$select_rs = mysqli_query($link, $select);

if($select_rs) {
    while($select_row = mysqli_fetch_assoc($select_rs)) {

        $parcel_code = $select_row['parcel_code'];
        $now = time();
        $your_date = strtotime($select_row['date_received']);
        $datediff = $now - $your_date;

        $overdue_day = intval($datediff / (60 * 60 * 24));
        
        $chck_overdue_bill = "SELECT
        over_amount
        FROM
        courier_overdue_amounts
        WHERE
        (
            ($overdue_day >= `over_from`) AND ($overdue_day <= `over_to`)
        )";

        $chck_overdue_bill_rs = mysqli_query($link, $chck_overdue_bill);

        if($chck_overdue_bill_rs) {

            while ($over_bill_row = mysqli_fetch_assoc($chck_overdue_bill_rs)) {
                $bill_amount = $over_bill_row['over_amount'];
                $bill_type = "OVERDUE";

                //check billing duplicate
                $check_dupl = "SELECT * FROM courier_billings WHERE bill_parcel_code = '$parcel_code' AND bill_type = 'OVERDUE'";
                $check_dupl_rs = mysqli_query($link, $check_dupl);
                if($check_dupl_rs->num_rows > 0) {
                    continue;
                } else {
                    $update_billings = "INSERT INTO courier_billings (bill_parcel_code, bill_amount, bill_type) VALUES ('$parcel_code', '$bill_amount', '$bill_type')";
                    $update_billings_rs = mysqli_query($link, $update_billings);
                    if($update_billings_rs) {
                        echo "New Billings Updated";
                    } else {
                        echo $link->error;
                    }
                }

            }
        } else {
            echo $link->error;
        }

    }
} else {
    echo $link->error;
}

// echo json_encode($data);
?>