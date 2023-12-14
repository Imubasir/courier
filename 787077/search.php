<?php
session_start();
require("../php/connect.php");
$username = $_SESSION['username'];
$branch_code = $_SESSION['branch_code'];

$m_code = isset($_POST['code']) ? mysqli_real_escape_string($link, $_POST['code']) : '';
$m_date_from = isset($_POST['date_from']) ? mysqli_real_escape_string($link, $_POST['date_from']) : '';
$m_date_to = isset($_POST['date_to']) ? mysqli_real_escape_string($link, $_POST['date_to']) : '';
$select = '';
$data = array();

if($m_code != '' && $m_date_from != '' && $m_date_to != '') {
	$select .= "SELECT 
	* 
	FROM courier_manifests 
	
	WHERE manifest_code = '$m_code' 
	
	AND manifest_date_added BETWEEN '$m_date_from' AND DATE_ADD('$m_date_to', INTERVAL 1 DAY) 
	
	AND manifest_destination = '$branch_code' 
	
	AND (manifest_dispatch_status = '1' OR manifest_dispatch_status = '2') 
	
	AND user_branch != '$branch_code' ORDER BY manifest_date_dispatched DESC";
} else if ($m_code != '') {
	$select .= "SELECT 
	* 
	FROM courier_manifests 
	
	WHERE manifest_code = '$m_code' 
	
	AND manifest_destination = '$branch_code' 
	
	AND (manifest_dispatch_status = '1' OR manifest_dispatch_status = '2') 
	
	AND user_branch != '$branch_code' ORDER BY manifest_date_dispatched ASC";
} else if ($m_date_from != '' && $m_date_to != '') {
	$select .= "SELECT 
	* 
	FROM courier_manifests 
	
	WHERE manifest_date_added BETWEEN '$m_date_from' AND DATE_ADD('$m_date_to', INTERVAL 1 DAY) 
	
	AND manifest_destination = '$branch_code' 
	
	AND (manifest_dispatch_status = '1' OR manifest_dispatch_status = '2') 
	
	AND user_branch != '$branch_code' ORDER BY manifest_date_dispatched ASC";
}

$select_rs = mysqli_query($link, $select);


if($select_rs) {
	while($select_row = mysqli_fetch_assoc($select_rs)) {
		$data[] = $select_row;
	}
}
echo json_encode($data);
?>