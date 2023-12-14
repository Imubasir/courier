<?php
session_start();
require("../php/connect.php");
$username = $_SESSION['username'];
$type = $_POST['type'];

$today = date('Y-m-d');

//------------------------ Overal Parcels Taken----------------------------

if($type == 'daily_parcel') {
	$query = "SELECT COUNT(*) as total FROM courier_parcel WHERE DATE(date_created) = DATE(now())";
	$rs = mysqli_query($link, $query);

	if($rs) {
		while($row = mysqli_fetch_assoc($rs)) {
			echo $row['total'];
		}
	}
} else if ($type == 'weekly_parcel') {
	$query = "SELECT COUNT(*) as total FROM courier_parcel WHERE WEEK(`date_created`) = WEEK(now())";
	$rs = mysqli_query($link, $query);

	if($rs) {
		while($row = mysqli_fetch_assoc($rs)) {
			echo $row['total'];
		}
	}
} else if ($type == 'monthly_parcel') {
	$query = "SELECT COUNT(*) as total FROM courier_parcel WHERE MONTH(date_created) = MONTH(now())
   AND YEAR(date_created) = YEAR(now())";
	$rs = mysqli_query($link, $query);

	if($rs) {
		while($row = mysqli_fetch_assoc($rs)) {
			echo $row['total'];
		}
	}
} else if ($type == 'yearly_parcel') {
	$query = "SELECT COUNT(*) as total FROM courier_parcel WHERE YEAR(date_created) = YEAR(now())";
	$rs = mysqli_query($link, $query);

	if($rs) {
		while($row = mysqli_fetch_assoc($rs)) {
			echo $row['total'];
		}
	}

	//------------------------ Overal Payments Taken----------------------------

} else if ($type == 'daily_payment') {
	$query = "SELECT SUM(amount) as total FROM courier_parcel INNER JOIN courier_payments ON parcel_code = parcel_code_fk WHERE DATE(payment_date) = DATE(now())";
	$rs = mysqli_query($link, $query);

	if($rs) {
		while($row = mysqli_fetch_assoc($rs)) {
			echo $row['total'];
		}
	}
} else if ($type == 'weekly_payment') {
	$query = "SELECT SUM(amount) as total FROM courier_parcel INNER JOIN courier_payments ON parcel_code = parcel_code_fk  WHERE WEEK(`payment_date`) = WEEK(now())";
	$rs = mysqli_query($link, $query);

	if($rs) {
		while($row = mysqli_fetch_assoc($rs)) {
			echo $row['total'];
		}
	}
} else if ($type == 'monthly_payment') {
	$query = "SELECT SUM(amount) as total FROM courier_parcel INNER JOIN courier_payments ON parcel_code = parcel_code_fk  WHERE MONTH(payment_date) = MONTH(now()) AND YEAR(payment_date) = YEAR(now())";
	$rs = mysqli_query($link, $query);

	if($rs) {
		while($row = mysqli_fetch_assoc($rs)) {
			echo $row['total'];
		}
	}
} else if ($type == 'yearly_payment') {
	$query = "SELECT SUM(amount) as total FROM courier_parcel INNER JOIN courier_payments ON parcel_code = parcel_code_fk  WHERE YEAR(payment_date) = YEAR(now())";
	$rs = mysqli_query($link, $query);

	if($rs) {
		while($row = mysqli_fetch_assoc($rs)) {
			echo $row['total'];
		}
	}
}

//------------------------ Branch Parcel Taken----------------------------

 else if ($type == 'accra_daily_parcel') {
	$query = "SELECT COUNT(*) as total FROM courier_parcel WHERE user_branch='AC1750' AND DATE(date_created) = DATE(now())";
	$rs = mysqli_query($link, $query);

	if($rs) {
		while($row = mysqli_fetch_assoc($rs)) {
			echo $row['total'];
		}
	}
} else if ($type == 'kumasi_daily_parcel') {
	$query = "SELECT COUNT(*) as total FROM courier_parcel WHERE user_branch='KS6889' AND DATE(date_created) = DATE(now())";
	$rs = mysqli_query($link, $query);

	if($rs) {
		while($row = mysqli_fetch_assoc($rs)) {
			echo $row['total'];
		}
	}
} else if ($type == 'takoradi_daily_parcel') {
	$query = "SELECT COUNT(*) as total FROM courier_parcel WHERE user_branch='TK8898' AND DATE(date_created) = DATE(now())";
	$rs = mysqli_query($link, $query);

	if($rs) {
		while($row = mysqli_fetch_assoc($rs)) {
			echo $row['total'];
		}
	}
} else if ($type == 'tamale_daily_parcel') {
	$query = "SELECT COUNT(*) as total FROM courier_parcel WHERE user_branch='TL1350' AND DATE(date_created) = DATE(now())";
	$rs = mysqli_query($link, $query);

	if($rs) {
		while($row = mysqli_fetch_assoc($rs)) {
			echo $row['total'];
		}
	}
}

//------------------------ Branch Payment Taken----------------------------

 else if ($type == 'accra_daily_payment') {
	$query = "SELECT SUM(amount) as total FROM courier_parcel INNER JOIN courier_payments ON parcel_code = parcel_code_fk WHERE payment_branch = 'AC1750' AND DATE(payment_date) = DATE(now())";
	$rs = mysqli_query($link, $query);

	if($rs) {
		while($row = mysqli_fetch_assoc($rs)) {
			echo $row['total'];
		}
	}
} else if ($type == 'kumasi_daily_payment') {
	$query = "SELECT SUM(amount) as total FROM courier_parcel INNER JOIN courier_payments ON parcel_code = parcel_code_fk WHERE payment_branch = 'KS6889' AND DATE(payment_date) = DATE(now())";
	$rs = mysqli_query($link, $query);

	if($rs) {
		while($row = mysqli_fetch_assoc($rs)) {
			echo $row['total'];
		}
	}
} else if ($type == 'takoradi_daily_payment') {
	$query = "SELECT SUM(amount) as total FROM courier_parcel INNER JOIN courier_payments ON parcel_code = parcel_code_fk WHERE payment_branch = 'TK8898' AND DATE(payment_date) = DATE(now())";
	$rs = mysqli_query($link, $query);

	if($rs) {
		while($row = mysqli_fetch_assoc($rs)) {
			echo $row['total'];
		}
	}
} else if ($type == 'tamale_daily_payment') {
	$query = "SELECT SUM(amount) as total FROM courier_parcel INNER JOIN courier_payments ON parcel_code = parcel_code_fk WHERE payment_branch = 'TL1350' AND DATE(payment_date) = DATE(now())";
	$rs = mysqli_query($link, $query);

	if($rs) {
		while($row = mysqli_fetch_assoc($rs)) {
			echo $row['total'];
		}
	}
}

?>