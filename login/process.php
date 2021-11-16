<?php 
	require_once('config.php');
?>

<?php 
	if (isset($_POST)) {
		$nama=$_POST['nama'];
		$username=$_POST['username'];
		$email=$_POST['email'];
		$pword=sha1($_POST['pword']);

		$sql = "INSERT INTO users (nama, username, email, pword) VALUES (?,?,?,?)";
		$stmtinsert = $db->prepare($sql);
		$result = $stmtinsert->execute([$nama,$username,$email,$pword]);
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