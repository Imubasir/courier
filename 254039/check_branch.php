<?php
session_start();
require("../php/connect.php");
$username = $_SESSION['username'];
$location = $_SESSION['branch_code'];

echo $location;
?>