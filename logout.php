<?php
require('conn.inc.php');
require('functions.inc.php');
unset($_SESSION['UserID']);
unset($_SESSION['UserFullName']);
header('location:index.php');
die;
?>