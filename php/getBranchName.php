<?php
require("connect.php");
$code= $_POST['branch_code'];

$sql = "SELECT * FROM courier_branches WHERE branch_code = '$code'";
$rs = mysqli_query($link, $sql);

if($rs) {
    while($row = mysqli_fetch_assoc($rs)) {
     echo strtoupper($row['branch_name']);
    }
} else {
    echo $link->error;
}

?>