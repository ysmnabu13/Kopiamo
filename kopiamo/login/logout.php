<?php


session_start();

// if the user is logged in, unset the session
if (isset($_SESSION['Login'])) {
	unset($_SESSION['Login']);
}
session_destroy(); //destroy the session


// go to login page
header('Location: index.php');
exit;
?>
