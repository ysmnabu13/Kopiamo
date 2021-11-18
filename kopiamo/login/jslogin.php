<?php 
	session_start();

	require_once('config.php');

	$username = $_POST['username'];
	$pword = sha1($_POST['pword']);
	$_SESSION['username'] = $username;
	$_SESSION['pword'] = $pword;

	$sql = "SELECT * FROM users WHERE username = ? AND pword = ? LIMIT 1";
	$stmtselect = $db->prepare($sql);
	$result = $stmtselect->execute([$username, $pword]);

	if ($result) {
		$user = $stmtselect->fetch(PDO::FETCH_ASSOC);
		if ($stmtselect->rowCount() > 0) {
			$_SESSION['kopiamo'] = $user;
			echo '1'; 
		}
		else{
			echo 'Your account does not exist';
		}
	}
	else {
		echo 'Error while connecting to database';
	}
 ?>