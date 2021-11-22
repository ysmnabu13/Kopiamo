<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Kopiamo - Profile</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Shop icon -->
        <link rel="icon" href="img/shop-logo.png" type="image/x-icon" />
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
        rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
        crossorigin="anonymous"
        >
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <!--Font Awesome-->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" />
        <!--Custom CSS-->
        <link rel="stylesheet" type="text/css" href="css/styles.css">
        <!-- Google Fonts Roboto -->
        <link
        rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap"
        />
    </head>
    <body>

    <!--Session-->
    <?php
      require_once('../login/config.php');
      session_start();
      $username = $_SESSION['username'];
      $pword = $_SESSION['pword'];
      $result = mysqli_query($conn, "SELECT * FROM users");

      while($row = mysqli_fetch_assoc($result)){
        if($row['username'] == $username){
          $name = $row['nama'];
          $email = $row['email'];
          $phonenum = $row['phonenum'];
          $address = $row['address'];
          $gender = $row['gender'];
          $dob = $row['dob'];
          // $avatar = $row['avatar'];
        }
      }
    ?>

    <!--Navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: #775458">
        <div class="container-fluid">
            <!--Logo-->
            <a class="navbar-brand" href="#">
                <img src="img/shop-logo.png" alt="shop-logo.png" class="d-inline-block align-text-top" height="30">
                <small>Kopiamo</small>
            </a>

            <!--Collapse for smaller screen-->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <!--Links-->
                <div class="navbar-nav me-auto mb-2 mb-lg-0">
                    <a class="nav-link" href="#">Home</a>
                    <a class="nav-link" href="#">Menu</a>
                    <a class="nav-link" href="#">News & Promotion</a>
                    <a class="nav-link" href="#">About us</a>
                </div>

                <li class="nav-item dropdown d-flex">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="img/avatar.jpg" alt="avatar.jpg" class="d-inline-block align-text-top rounded-circle" height="30">
                    </a>
                    <ul class="dropdown-menu dropdown-menu-lg-end dropdown-menu-md-start" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" aria-current="page" href="profile.html">Profile</a>
                        <a class="dropdown-item" href="#">Settings</a>
                        <a class="dropdown-item" href="../login/logout.php">Logout</a>
                    </ul>
                </li>

            </div>
        </div>
    </nav>

    <!--My Profile-->
    <br><br>
    <div class="container shadow-sm pt-5">
      <div class="row">
        <h1 class="my-4 text-center">My Profile</h1>
      </div>
      <form action="profile.php" method="POST">
        <div class="row pb-4 lead">
          <!--Left side form-->
          <div class="col-md-8 ps-5 border-end">
            <div class="row g-3 align-items-center">
              <div class="col-auto">
                <label for="username" class="col-form-label">Username:</label>
              </div>
              <?php
                echo "
                <div class='col-auto'>
                  <input class='form-control rounded' type='text' id='username' value='". $username ."'>
                </div>";
              ?>
            </div>
            <div class="row g-3 align-items-center">
              <div class="col-auto">
                <label for="email" class="col-form-label">Email:</label>
              </div>
              <?php
                echo "
                <div class='col-auto'>
                  <input class='form-control rounded' type='text' id='email' value='". $email ."' disabled>
                </div>";
              ?>
            </div>
            <div class="row g-3 align-items-center">
              <div class="col-auto">
                <label for="fullname" class="col-form-label">Full name:</label>
              </div>
              <?php
                echo "
                <div class='col-auto'>
                  <input class='form-control rounded' type='text' id='fullname' value='". $name . "'>
                </div>";
              ?>
            </div>
            <div class="row g-3 align-items-center">
              <div class="col-auto">
                <label for="phonenumber" class="col-form-label">Phone number:</label>
              </div>
              <?php
                if($phonenum == ""){
                  echo "
                  <div class='col-auto'>
                    <input class='form-control rounded' type='text' id='phonenumber' value='+60'>
                  </div>";
                }else{
                  echo "
                  <div class='col-auto'>
                    <input class='form-control rounded' type='text' id='phonenumber' value='". $phonenum ."'>
                  </div>";
                }
              ?>
            </div>
            <div class="row g-3 align-items-center">
              <div class="col-auto">
                <label for="address" class="col-form-label">Address:</label>
              </div>
              <?php
                if($address == ""){
                  echo "
                  <div class='col-auto'>
                    <input class='form-control rounded' type='text' id='address' placeholder='Enter your address'>
                  </div>";
                }else{
                  echo "
                  <div class='col-auto'>
                    <input class='form-control rounded' type='text' id='address' value='". $address ."'>
                  </div>";
                }
              ?>
            </div>
            <div class="form-check-inline">Gender:</div>
            <?php
              if($gender == "Male"){
                echo "
                <div class='form-check form-check-inline'>
                  <input class='form-check-input' type='radio' name='gender' id='genderm' value='Male' checked>
                  <label class='form-check-label' for='gender'>Male</label>
                </div>
                <div class='form-check form-check-inline'>
                  <input class='form-check-input' type='radio' name='gender' id='genderf' value='Female'>
                  <label class='form-check-label' for='gender'>Female</label>
                </div>";
              }
              else if($gender == "Female"){
                echo "
                <div class='form-check form-check-inline'>
                  <input class='form-check-input' type='radio' name='gender' id='genderm' value='Male'>
                  <label class='form-check-label' for='gender'>Male</label>
                </div>
                <div class='form-check form-check-inline'>
                  <input class='form-check-input' type='radio' name='gender' id='genderf' value='Female' checked>
                  <label class='form-check-label' for='gender'>Female</label>
                </div>";
              }else{
                echo "
                <div class='form-check form-check-inline'>
                  <input class='form-check-input' type='radio' name='gender' id='genderm' value='Male'>
                  <label class='form-check-label' for='gender'>Male</label>
                </div>
                <div class='form-check form-check-inline'>
                  <input class='form-check-input' type='radio' name='gender' id='genderf' value='Female'>
                  <label class='form-check-label' for='gender'>Female</label>
                </div>";
              }
            ?>
            <br>
            <div class="row g-3 align-items-center">
              <div class="col-auto">
                <label for="dateofbirth" class="col-form-label">Date of birth:</label>
              </div>
              <?php
              if($dob == ""){
                echo"
                <div class='col-auto'>
                  <input class=' form-control rounded' type='text' id='dateofbirth' placeholder='DD/MM/YYYY'>
                </div>";
              }else{
                echo"
                <div class='col-auto'>
                  <input class=' form-control rounded' type='text' id='dateofbirth' value='". $dob ."'>
                </div>";
              }
              ?>
            </div>
          </div>
          <!--Right side profile picture-->
          <div class="col-md-4 g-5">
            <div class="card w-50 m-auto">
              <img src="img/avatar.jpg" class="rounded-3">
            </div><br>
            <label class="form-label" for="avatar">Upload an image</label>
            <input type="file" class="form-control" name="uploadfile" id="avatar">
          </div>
        </div>
        <div class="row">
          <div class="col p-3 ps-xl-5 ps-sm-4 ps-md-5">
            <input type="submit" name="update" id="update" class="btn btn-primary" value="Update">
          </div>
        </div>
      </form>
    </div>

    <!--Footer-->
    <!-- <footer class="bg-dark text-center text-white fixed-bottom">
        <div class="container p-4">
          © Copyright of Richiamoo team
        </div>
    </footer> -->

    <!--Javascript-->
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="js/bootstrap.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
    <script type="text/javascript">
      $(function(){
        $('#update').click(function(e){
          var valid = this.form.checkValidity();
          if(valid){
            var username = $('#username').val();
            var email = $('#email').val();
            var nama = $('#fullname').val();
            var phonenum = $('#phonenumber').val();
            var address = $('#address').val();
            if(document.getElementById('genderm').checked == true){   
              var gender = $('#genderm').val();
            }else if(document.getElementById('genderf').checked == true){  
              var gender = $('#genderf').val();
            }else{}
            var dob = $('#dateofbirth').val();

            <?php
              $filename = $_FILES["uploadfile"]["name"];
              $tempname = $_FILES["uploadfile"]["tmp_name"];
            ?>
            var avatar = $filename;

            e.preventDefault();

            $.ajax({
              type: 'POST',
              url: 'updateprofile.php',
              data: {username: username, email: email, nama: nama, phonenum: phonenum, address: address, gender: gender, dob: dob, avatar: avatar},
              success: function(data){
                alert('Profile updated!');
              },
              error: function(data){
                alert('Failed to update profile.');
              }
            });
          }else{}
        });
      });
    </script>
    </body>
</html>
