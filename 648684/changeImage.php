<?php
session_start();
require("../php/connect.php");
$username = $_SESSION['username'];
$location = $_SESSION['branch_code'];
$username = $_SESSION['username'];

 $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
 $path = '../uploads/'; // upload directory

 if($_FILES['file']) {
 	$img = $_FILES['file']['name'];
 	$tmp = $_FILES['file']['tmp_name'];

 	$ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));

    // can upload same image using rand function
 	$final_image = rand(10,10000).'_'.$img;

    // check's valid format
 	if(in_array($ext, $valid_extensions)) 
 	{ 
 		$path = $path.strtolower($final_image); 

 		if(move_uploaded_file($tmp,$path)) 
 		{ 
 			$update = "UPDATE courier_login SET image = '$path' WHERE email = '$username'";
 			$update_rs = mysqli_query($link, $update);

 			if($update_rs) {
 				echo 1;
 			} else {
 				echo $link->error;
 			}
 		}

 	}

 }

?>