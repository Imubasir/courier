<?php
session_start();
require("connect.php");

$email = mysqli_real_escape_string($link, $_POST['awa_username']);
if(isset($_COOKIE['token'])) {
	$password = mysqli_real_escape_string($link, $_POST['awa_password']);	
} else {
	$password = mysqli_real_escape_string($link, md5($_POST['awa_password']));
}

$login_query = $link->prepare( 'SELECT * FROM courier_login WHERE email = ? and password = ?' );

$login_query->bind_param( 'ss', $email, $password );
$r = $login_query->execute();
$result = $login_query->get_result();

if ($result->num_rows == 1) {
	while($row = mysqli_fetch_assoc($result)) {
		$name = $row['firstname'].' '.$row['lastname'];
		$username = $row['email'];
		$access = $row['access_group'];
		$branch_code = $row['branch_id'];
		$image = $row['image'];
		$token = $row['token'];

		$img = explode("/", $image);

		$_SESSION['name'] = $name;
		$_SESSION['email'] = $email;
		$_SESSION['image'] = end($img);
		$_SESSION['username'] = $username;
		$_SESSION['access'] = $access;
		$_SESSION['branch_code'] = $branch_code;

		//Duplicate Login Check
		$token = getToken(10);
		$_SESSION['login_token'] = $token;

		$login_token = "SELECT * FROM courier_login_token WHERE username = '$email'";
		$login_token_rs = mysqli_query($link, $login_token);

		if ($login_token_rs->num_rows > 0) {
			$update_login_token = "UPDATE courier_login_token SET l_token = '$token' WHERE username = '$email'";
		} else {
			$update_login_token = "INSERT INTO courier_login_token (username, l_token) VALUES('$email', '$token')";
		}

		$update_login_token_rs = mysqli_query($link, $update_login_token);

		if($update_login_token_rs) {
			echo 52189;
		} else {
			echo $link->error;
		}

		//Update Login Status
		login_update ($username, $branch_code);

		$remember = $_POST['remember'];
		if($remember == 'true') {
			if(isset($_COOKIE['token'])) {
				$state = 'false';
			// Cookie Already Set
			} else {
				$state = 'true';
				$token = md5(time());
				setcookie('token', $token, time()+(86400*30), '/');
				// echo 'Token being set';
			}
		} else {
			setcookie('token', "", time()-3600, '/');
			// echo "cookie deleted";			
			$state = 'forget';

			$token = '';
		}

		//set remember
		if($state == 'true') {
			setRemember($token, $username);
		} else if ($state == 'forget') {
			setRemember($token, $username);
		}
		// echo $state;
	}
} else if ($result->num_rows < 1) {
	echo 74190;
} else {
	echo $link->error;
}

function login_update ($user, $branch_code) {
	require("connect.php");
	$today = date("d-M-Y H:i:s");

	$query = "UPDATE courier_login SET last_login = '$today' WHERE email = '$user'";
	$result_ = mysqli_query($link, $query);
	if($result_) {
		// echo 1;
	} else {
		// echo 0;
		echo $link->error;
	}

	$activity = "Login Successful";
	$insert = "INSERT INTO courier_logs (log_activity, log_user, log_branch) VALUES ('$activity', '$user', '$branch_code')";
	$insert_rs = mysqli_query($link, $insert);

	if($insert_rs) {

	}
}

function setRemember($token, $user) {
	require("connect.php");
	$query = "UPDATE courier_login SET token = '$token' WHERE email = '$user'";
	$result_ = mysqli_query($link, $query);
	if($result_) {
		
	} else {
		echo $link->error;
	}
}

// Generate token
function getToken($length){
  $token = "";
  $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
  $codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
  $codeAlphabet.= "0123456789";
  $max = strlen($codeAlphabet); // edited

  for ($i=0; $i < $length; $i++) {
    $token .= $codeAlphabet[random_int(0, $max-1)];
  }

  return $token;
}
?>