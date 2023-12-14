<?php
session_start();
require("../php/connect.php");
$username = $_SESSION['username'];
$location = $_SESSION['branch_code'];

$branch = mysqli_real_escape_string($link, $_POST['edit_branch']);
$fname = mysqli_real_escape_string($link, $_POST['edit_fname']);
$lname = mysqli_real_escape_string($link, $_POST['edit_lname']);
$user_group = mysqli_real_escape_string($link, $_POST['edit_user_group']);
$login_status = mysqli_real_escape_string($link, $_POST['status']);
$email = mysqli_real_escape_string($link, $_POST['edit_email']);

$valid_extensions = array('jpeg', 'jpg', 'png'); // valid extensions
$path = '../uploads/';

if($_FILES['edit_image']) {
	$img = $_FILES['edit_image']['name'];
	$tmp = $_FILES['edit_image']['tmp_name'];

// get uploaded file's extension
	$ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));

// can upload same image using rand function
	$final_image = rand(1000,1000000).$img;

// check's valid format
	if(in_array($ext, $valid_extensions)) 
	{ 
		$path = $path.strtolower($final_image); 

		if(move_uploaded_file($tmp,$path)) 
		{
			$sql = "UPDATE courier_login SET branch_id = '$branch', firstname = '$fname', lastname = '$lname', access_group = '$user_group', log_status = '$login_status', image = '$path' WHERE email = '$email'";

			$rs = mysqli_query($link, $sql);
			if($rs) {
				$activity = "User Account Updated. User: ".$email;
				$insert = "INSERT INTO courier_logs (log_activity, log_user, log_branch) VALUES ('$activity', '$username', '$location')";
				$insert_rs = mysqli_query($link, $insert);
				if($insert_rs) {
					echo 1;
				}
			} else{
				echo $link->error;
			} 

		} else {
			echo "Image Not Moved";
		}
	} else {
		$sql = "UPDATE courier_login SET branch_id = '$branch', firstname = '$fname', lastname = '$lname', access_group = '$user_group', log_status = '$login_status' WHERE email = '$email'";

		$rs = mysqli_query($link, $sql);
		if ($rs) {
			$activity = "User Account Updated. User: ".$email;
			$insert = "INSERT INTO courier_logs (log_activity, log_user, log_branch) VALUES ('$activity', '$username', '$location')";
			$insert_rs = mysqli_query($link, $insert);
			if($insert_rs) {
				echo 1;
			}
		} else {
			echo $link->error;
		} 
	}
}
?>