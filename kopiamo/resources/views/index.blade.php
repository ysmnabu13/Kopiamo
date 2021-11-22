<?php
	session_start();

	if (!isset($_SESSION['Login'])) {
		header("Location: login.blade.php");
	}

	if($_SESSION["Login"] != "YES"){
		session_destroy();
		unset($_SESSION["Login"]);
		header("Location: login.blade.php");
	}
 ?>

 <p>Welcome to index</p>

 <a href="profile.blade.php">Profile</a>
 <br/>
 <a href="logout.blade.php">Logout</a>
