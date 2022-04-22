<?php
$msg = filter_input(INPUT_GET,'msg');
session_start();
unset($_SESSION["usertype"]);
unset($_SESSION["usename"]);
session_destroy();
if ($msg!='') {
	header("Location: login.php?msg=$msg");
} 
else {
	header("Location: login.php?msg=You logged out"); }
?>
