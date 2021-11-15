<?php 
	require_once('config.php');
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Style -->
    <link rel="stylesheet" href="css/style.css">

    <!-- Javascript -->
    <link rel="stylesheet" href="js/main.js">


    <title>Kopiamoo Login Page</title>
  </head>
  <body>


  <div class="d-md-flex half">
    <div class="bg" style="background-image: url('images/2.jfif');"></div>
    <div class="contents">

      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-12">
            <div class="form-block mx-auto">
              <div class="text-center mb-5">
                <h3>Sign up to <strong>Kopiamoo</strong></h3>
              </div>
              <form action="registration.php" method="post">
                <div class="form-group mb-3">
                    <label for="fname">Name</label>
                    <input type="text" name="fname" class="form-control" placeholder="John Doe" id="fname" required>
                </div>

                <div class="form-group mb-3">
                    <label for="username">Username</label>
                    <input type="text" name="username" class="form-control" placeholder="john420" id="username" required>
                </div>
            
                <div class="form-group mb-3">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Your email" id="email" required>
                </div>

                <div class="form-group mb-5">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" placeholder="Your Password" id="password" required>
                    <label class="control control--checkbox mb-1 mt-2 mb-sm-0"><span class="caption">Show password</span>
                        <input type="checkbox"  onclick="showPass()"/>
                        <div class="control__indicator"></div>
                      </label>
                </div>


                <input type="submit" id="register" value="Sign Up" class="btn btn-block btn-primary">

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>


  </div>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <script type="text/javascript">
        $(function(){
            $('#register').click(function(){

                // Swal.fire({
                //     'title' : 'Registration success!',
                //     'text' : 'You have successfully registered to Kopiamoo',
                //     'type' : 'success'
                // })

                alert('You have successfully registered!');

            });
        });
    </script>


  </body>
</html>
