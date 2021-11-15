<?php 
	require_once('config.php');
?>

<?php 
	if (isset($_POST)) {
		$firstname=$_POST['name'];
		$lastname=$_POST['username'];
		$email=$_POST['email'];
		$password=sha1($_POST['password']);

		$sql = "INSERT INTO users (name, username, email, password) VALUES (?,?,?,?)";
		$stmtinsert = $db->prepare($sql);
		$result = $stmtinsert->execute([$name,$username,$email,$password]);
		if ($result) {
			echo "Register Success";
		}
		else {
			echo "Error detected while saving";
		}
	}
	else{
		echo 'No data';
	}
?>