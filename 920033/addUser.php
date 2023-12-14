<?php
session_start();
require("../php/connect.php");
$username = $_SESSION['username'];
$location = $_SESSION['branch_code'];

$branch = mysqli_real_escape_string($link, $_POST['branch']);
$fname = mysqli_real_escape_string($link, strtoupper($_POST['fname']));
$lname = mysqli_real_escape_string($link, strtoupper($_POST['lname']));
$email = mysqli_real_escape_string($link, $_POST['email']);
$password = mysqli_real_escape_string($link, md5($_POST['password']));

$valid_extensions = array('jpeg', 'jpg', 'png'); // valid extensions
$path = '../uploads/';

if($_FILES['image']) {
	$img = $_FILES['image']['name'];
	$tmp = $_FILES['image']['tmp_name'];

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
			$sql = "INSERT INTO courier_login (email, branch_id, firstname, lastname, password, image) VALUES ('$email', '$branch', '$fname', '$lname', '$password', '$path')";

			$rs = mysqli_query($link, $sql);
			if($rs) {
				$activity = "New Account Created. User: ".$email;
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
		$sql = "INSERT INTO courier_login (email, branch_id, firstname, lastname, password) VALUES ('$email', '$branch', '$fname', '$lname', '$password')";

		$rs = mysqli_query($link, $sql);
		if ($rs) {
			$activity = "New Account Created. User: ".$email;
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