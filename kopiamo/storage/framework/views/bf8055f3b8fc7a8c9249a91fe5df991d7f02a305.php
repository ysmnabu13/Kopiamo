<!doctype html>
<html lang="en">
  <head>
   <title>Kopiamo - Menu</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Shop icon -->
        <link rel="icon" href="img/shop-logo.png" type="image/x-icon" />
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
        rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
        crossorigin="anonymous"
        >
        <link rel="stylesheet" type="text/css" href="css_copy/bootstrap.css">
        <!--Font Awesome-->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" />
        <!--Custom CSS-->
        <link rel="stylesheet" type="text/css" href="css_copy/styles.css">
        <!-- Google Fonts Roboto -->
        <link
        rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap"
        />
  </head>
  <body>
    <!--Session-->
    <?php
      /*require_once('config.blade.php');
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
          $avatar = $row['avatar'];
        }
      }*/
    ?>

    <!--Upload files-->
    <?php
      /*if (isset($_POST['upload'])) {

        $filename = $_FILES['uploadfile']['name'];
        $tempname = $_FILES['uploadfile']['tmp_name'];    
        $folder = 'profile_img/'.$filename;

        $sql = "UPDATE users SET avatar='$filename' WHERE email='$email'";
  
        if(mysqli_query($conn, $sql)){
          echo "<script type='text/javascript'>
          alert('Profile picture updated!');
          </script>";
        }else{
          echo "There was an error -> Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        move_uploaded_file($tempname, $folder);
      }*/
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
                        <?php
                          /*if($avatar == ""){
                            echo"
                            <img src='img/avatar.jpg' alt='avatar.jpg' class='d-inline-block align-text-top rounded-circle' height='30' width='30'>";
                          }else{
                            echo" 
                            <img src='profile_img/". $avatar ."' alt='avatar.jpg' class='d-inline-block align-text-top rounded-circle' height='30' width='30'>";
                          }*/
                          
                        ?>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-lg-end dropdown-menu-md-start" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" aria-current="page" href="profile.html">Profile</a>
                        <a class="dropdown-item" href="#">Settings</a>
                        <a class="dropdown-item" href="logout.blade.php">Logout</a>
                    </ul>
                </li>

            </div>
        </div>
    </nav>
    <!--End Navbar-->
    <!--Carousel-->
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="img/carousel/carousel1.jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="img/carousel/carousel1.jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="img/carousel/carousel1.jpg" class="d-block w-100" alt="...">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
    <!--End Carousel-->

    <!--Footer-->
    <!-- <footer class="bg-dark text-center text-white fixed-bottom">
        <div class="container p-4">
          © Copyright of Richiamoo team
        </div>
    </footer> -->

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

  </body>
</html><?php /**PATH E:\Kopiamoo\kopiamo\resources\views/customermenu.blade.php ENDPATH**/ ?>