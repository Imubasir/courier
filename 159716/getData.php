<?php
session_start();
require("../php/connect.php");
$username = $_SESSION['username'];
$type = $_POST['type'];

$today = date('Y-m-d');

if($type == 'daily_manifest') {
	$total = '';
	$dispatched = '';
	$pending = '';

	$query = "SELECT COUNT(*) as total FROM courier_manifests WHERE DATE(manifest_date_added) = DATE(now())";
	$rs = mysqli_query($link, $query);

	if($rs) {
		while($row = mysqli_fetch_assoc($rs)) {
			$total = $row['total'];
		}
	}

	$query = "SELECT COUNT(*) as dispatched FROM courier_manifests WHERE manifest_dispatch_status != '0' AND DATE(manifest_date_added) = DATE(now())";
	$rs = mysqli_query($link, $query);

	if($rs) {
		while($row = mysqli_fetch_assoc($rs)) {
			$dispatched = $row['dispatched'];
		}
	}

	$query = "SELECT COUNT(*) as pending FROM courier_manifests WHERE manifest_dispatch_status = '0' AND DATE(manifest_date_added) = DATE(now())";
	$rs = mysqli_query($link, $query);

	if($rs) {
		while($row = mysqli_fetch_assoc($rs)) {
			$pending = $row['pending'];
		}
	}

	echo $total.'*'.$dispatched.'*'.$pending;
} 

else if ($type == 'weekly_manifest') {
	$total = '';
	$dispatched = '';
	$pending = '';

	$query = "SELECT COUNT(*) as total FROM courier_manifests WHERE WEEK(`manifest_date_added`) = WEEK(now())";
	$rs = mysqli_query($link, $query);

	if($rs) {
		while($row = mysqli_fetch_assoc($rs)) {
			$total = $row['total'];
		}
	}

	$query = "SELECT COUNT(*) as dispatched FROM courier_manifests WHERE manifest_dispatch_status != '0' AND WEEK(`manifest_date_added`) = WEEK(now())";
	$rs = mysqli_query($link, $query);

	if($rs) {
		while($row = mysqli_fetch_assoc($rs)) {
			$dispatched = $row['dispatched'];
		}
	}

	$query = "SELECT COUNT(*) as pending FROM courier_manifests WHERE manifest_dispatch_status = '0' AND WEEK(`manifest_date_added`) = WEEK(now())";
	$rs = mysqli_query($link, $query);

	if($rs) {
		while($row = mysqli_fetch_assoc($rs)) {
			$pending = $row['pending'];
		}
	}

	echo $total.'*'.$dispatched.'*'.$pending;
} 

else if ($type == 'monthly_manifest') {
	$total = '';
	$dispatched = '';
	$pending = '';

	$query = "SELECT COUNT(*) as total FROM courier_manifests WHERE MONTH(manifest_date_added) = MONTH(now())
	AND YEAR(manifest_date_added) = YEAR(now())";
	$rs = mysqli_query($link, $query);

	if($rs) {
		while($row = mysqli_fetch_assoc($rs)) {
			echo $row['total'];
		}
	}

	$query = "SELECT COUNT(*) as dispatched FROM courier_manifests WHERE manifest_dispatch_status != '0' AND MONTH(manifest_date_added) = MONTH(now())
	AND YEAR(manifest_date_added) = YEAR(now())";
	$rs = mysqli_query($link, $query);

	if($rs) {
		while($row = mysqli_fetch_assoc($rs)) {
			$dispatched = $row['dispatched'];
		}
	}

	$query = "SELECT COUNT(*) as pending FROM courier_manifests WHERE manifest_dispatch_status = '0' AND MONTH(manifest_date_added) = MONTH(now())
	AND YEAR(manifest_date_added) = YEAR(now())";
	$rs = mysqli_query($link, $query);

	if($rs) {
		while($row = mysqli_fetch_assoc($rs)) {
			$pending = $row['pending'];
		}
	}

	echo $total.'*'.$dispatched.'*'.$pending;
} 

else if ($type == 'yearly_manifest') {
	$total = '';
	$dispatched = '';
	$pending = '';

	$query = "SELECT COUNT(*) as total FROM courier_manifests WHERE YEAR(manifest_date_added) = YEAR(now())";
	$rs = mysqli_query($link, $query);

	if($rs) {
		while($row = mysqli_fetch_assoc($rs)) {
			echo $row['total'];
		}
	}

	$query = "SELECT COUNT(*) as dispatched FROM courier_manifests WHERE manifest_dispatch_status != '0' AND YEAR(manifest_date_added) = YEAR(now())";
	$rs = mysqli_query($link, $query);

	if($rs) {
		while($row = mysqli_fetch_assoc($rs)) {
			$dispatched = $row['dispatched'];
		}
	}

	$query = "SELECT COUNT(*) as pending FROM courier_manifests WHERE manifest_dispatch_status = '0' AND YEAR(manifest_date_added) = YEAR(now())";
	$rs = mysqli_query($link, $query);

	if($rs) {
		while($row = mysqli_fetch_assoc($rs)) {
			$pending = $row['pending'];
		}
	}

	echo $total.'*'.$dispatched.'*'.$pending;
} else if ($type == 'daily_manifest_accra') {
	$total = '';
	$dispatched = '';
	$pending = '';

	$query = "SELECT COUNT(*) as total FROM courier_manifests WHERE user_branch = 'AC1750' AND YEAR(manifest_date_added) = YEAR(now())";
	$rs = mysqli_query($link, $query);

	if($rs) {
		while($row = mysqli_fetch_assoc($rs)) {
			echo $row['total'];
		}
	}

	$query = "SELECT COUNT(*) as dispatched FROM courier_manifests WHERE user_branch = 'AC1750' AND manifest_dispatch_status != '0' AND YEAR(manifest_date_added) = YEAR(now())";
	$rs = mysqli_query($link, $query);

	if($rs) {
		while($row = mysqli_fetch_assoc($rs)) {
			$dispatched = $row['dispatched'];
		}
	}

	$query = "SELECT COUNT(*) as pending FROM courier_manifests WHERE user_branch = 'AC1750' AND manifest_dispatch_status = '0' AND YEAR(manifest_date_added) = YEAR(now())";
	$rs = mysqli_query($link, $query);

	if($rs) {
		while($row = mysqli_fetch_assoc($rs)) {
			$pending = $row['pending'];
		}
	}

	echo $total.'*'.$dispatched.'*'.$pending;
} else if ($type == 'daily_manifest_kumasi') {
	$total = '';
	$dispatched = '';
	$pending = '';

	$query = "SELECT COUNT(*) as total FROM courier_manifests WHERE user_branch = 'KS6889' AND YEAR(manifest_date_added) = YEAR(now())";
	$rs = mysqli_query($link, $query);

	if($rs) {
		while($row = mysqli_fetch_assoc($rs)) {
			echo $row['total'];
		}
	}

	$query = "SELECT COUNT(*) as dispatched FROM courier_manifests WHERE user_branch = 'KS6889' AND manifest_dispatch_status != '0' AND YEAR(manifest_date_added) = YEAR(now())";
	$rs = mysqli_query($link, $query);

	if($rs) {
		while($row = mysqli_fetch_assoc($rs)) {
			$dispatched = $row['dispatched'];
		}
	}

	$query = "SELECT COUNT(*) as pending FROM courier_manifests WHERE user_branch = 'KS6889' AND manifest_dispatch_status = '0' AND YEAR(manifest_date_added) = YEAR(now())";
	$rs = mysqli_query($link, $query);

	if($rs) {
		while($row = mysqli_fetch_assoc($rs)) {
			$pending = $row['pending'];
		}
	}

	echo $total.'*'.$dispatched.'*'.$pending;
}

 else if ($type == 'daily_manifest_takoradi') {
	$total = '';
	$dispatched = '';
	$pending = '';

	$query = "SELECT COUNT(*) as total FROM courier_manifests WHERE user_branch = 'TK8898' AND YEAR(manifest_date_added) = YEAR(now())";
	$rs = mysqli_query($link, $query);

	if($rs) {
		while($row = mysqli_fetch_assoc($rs)) {
			echo $row['total'];
		}
	}

	$query = "SELECT COUNT(*) as dispatched FROM courier_manifests WHERE user_branch = 'TK8898' AND manifest_dispatch_status != '0' AND YEAR(manifest_date_added) = YEAR(now())";
	$rs = mysqli_query($link, $query);

	if($rs) {
		while($row = mysqli_fetch_assoc($rs)) {
			$dispatched = $row['dispatched'];
		}
	}

	$query = "SELECT COUNT(*) as pending FROM courier_manifests WHERE user_branch = 'TK8898' AND manifest_dispatch_status = '0' AND YEAR(manifest_date_added) = YEAR(now())";
	$rs = mysqli_query($link, $query);

	if($rs) {
		while($row = mysqli_fetch_assoc($rs)) {
			$pending = $row['pending'];
		}
	}

	echo $total.'*'.$dispatched.'*'.$pending;
} 

else if ($type == 'daily_manifest_tamale') {
	$total = '';
	$dispatched = '';
	$pending = '';

	$query = "SELECT COUNT(*) as total FROM courier_manifests WHERE user_branch = 'TL1350' AND YEAR(manifest_date_added) = YEAR(now())";
	$rs = mysqli_query($link, $query);

	if($rs) {
		while($row = mysqli_fetch_assoc($rs)) {
			echo $row['total'];
		}
	}

	$query = "SELECT COUNT(*) as dispatched FROM courier_manifests WHERE user_branch = 'TL1350' AND manifest_dispatch_status != '0' AND YEAR(manifest_date_added) = YEAR(now())";
	$rs = mysqli_query($link, $query);

	if($rs) {
		while($row = mysqli_fetch_assoc($rs)) {
			$dispatched = $row['dispatched'];
		}
	}

	$query = "SELECT COUNT(*) as pending FROM courier_manifests WHERE user_branch = 'TL1350' AND manifest_dispatch_status = '0' AND YEAR(manifest_date_added) = YEAR(now())";
	$rs = mysqli_query($link, $query);

	if($rs) {
		while($row = mysqli_fetch_assoc($rs)) {
			$pending = $row['pending'];
		}
	}

	echo $total.'*'.$dispatched.'*'.$pending;
}

?>