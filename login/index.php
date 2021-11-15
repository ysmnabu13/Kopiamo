<?php 
	session_start();

	if (!isset($_SESSION['kopiamo'])) {		
		header("Location: login.php");
	}

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION);
		header("Location:login.php");
	}
 ?>

 <p>Welcome to index</p>

 <a href="index.php?logout=true">Logout</a>