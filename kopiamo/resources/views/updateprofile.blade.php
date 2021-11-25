<?php
    require_once('config.blade.php');

    if(isset($_POST)){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $nama = $_POST['nama'];
        $phonenum = $_POST['phonenum'];
        $address = $_POST['address'];
        $gender = $_POST['gender'];
        $dob = $_POST['dob'];

        $sql = "UPDATE users SET username='$username', nama='$nama', phonenum='$phonenum', address='$address', gender='$gender', dob='$dob' WHERE email='$email'";
        if(mysqli_query($conn, $sql)){
            echo "Working!";
        }else{
            echo "There was an error -> Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        mysqli_close($conn);
    }else{
        echo 'No data';
    }
?>