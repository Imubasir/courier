<?php
session_start();
require("../php/connect.php");
$username = $_SESSION['username'];
$location = $_SESSION['branch_code'];

$from_date = isset($_POST['from_date']) ? mysqli_real_escape_string($link, $_POST['from_date']) : '';
$to_date = isset($_POST['to_date']) ? mysqli_real_escape_string($link, $_POST['to_date']) : '';

$data = array();

$select = "SELECT 
* 
FROM courier_logs 
WHERE log_date_added BETWEEN '$from_date' AND DATE_ADD('$to_date', INTERVAL 1 DAY) 
AND log_branch = '$location'";


$select_rs = mysqli_query($link, $select);


if($select_rs) {
	while($select_row = mysqli_fetch_assoc($select_rs)) {
		$data[] = $select_row;
	}
}
echo json_encode($data);
?>