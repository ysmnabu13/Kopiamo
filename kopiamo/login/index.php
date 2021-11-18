<?php
	session_start();

	if (!isset($_SESSION['Login'])) {
		header("Location: login.php");
	}

	if($_SESSION["Login"] != "YES"){
		session_destroy();
		unset($_SESSION["Login"]);
		header("Location: login.php");
	}
 ?>

 <p>Welcome to index</p>

 <a href="../profile/profile.php">Profile</a>
 <br/>
 <a href="logout.php">Logout</a>
