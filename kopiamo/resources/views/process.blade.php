<?php
//Name: Muihammad Zulhusni bin Mohd Azhar
//Matric No:A19EC0108



if(isset($_POST)){

	$nama=$_POST['nama'];
	$username=$_POST['username'];
	$email=$_POST['email'];
	$pword=sha1($_POST['pword']); //sha1 is for encryption,jadi kat database dia keluar random char, bukan yang user masukkan (security)

		$sql = "INSERT INTO users (nama, username, email, pword) VALUES('$nama','$username','$email','$pword')";
		if (mysqli_query($conn, $sql)) {
 		echo "Congrats! Your information has been saved successfully";
 		} else {
 			echo "There was an error -> Error: " . $sql . "<br>" . mysqli_error($conn);
 			}
 mysqli_close($conn);
}

else{
	echo 'No data';
}
 ?>
