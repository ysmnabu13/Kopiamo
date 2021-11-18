<?php
	session_start();

	require_once('config.php');

	$username = $_POST['username'];
	$pword = sha1($_POST['pword']);
	$_SESSION['username']=$username;
	$_SESSION['pword']=$pword ;

	$sql = "SELECT * FROM users WHERE username = '$username' AND pword = '$pword' LIMIT 1";
	$result = mysqli_query($conn, $sql);

  $rows=mysqli_fetch_assoc($result);
  $count=mysqli_num_rows($result);


  	if($count == 1)
  	{
  		$_SESSION["Login"] = "YES";
  		echo 'Click OK to continue';
  	} else {
  		echo'You entered the wrong username or password';
  	}
 ?>
