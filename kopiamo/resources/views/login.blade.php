<?php
	session_start();

	if (isset($_SESSION['kopiamo'])) {
		header("Location: index.blade.php");
	}
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
                <h3>Login to <strong>Kopiamoo</strong></h3>
                <!-- <p class="mb-4">Lorem ipsum dolor sit amet elit. Sapiente sit aut eos consectetur adipisicing.</p> -->
              </div>
              <form action="#" method="post">
                <div class="form-group first">
                  <label for="username">Username</label>
                  <input type="text" class="form-control" placeholder="your-email@gmail.com" name="username" id="username">
                </div>
                <div class="form-group last mb-3">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" placeholder="Your Password" name="pword" id="pword">
                </div>

                <div class="d-sm-flex mb-5 align-items-center">
                  <label class="control control--checkbox mb-3 mb-sm-0"><span class="caption">Remember me</span>
                    <input type="checkbox" checked="checked"/>
                    <div class="control__indicator"></div>
                  </label>
                  <span class="ml-auto"><a href="#" class="forgot-pass">Forgot Password</a></span>
                </div>
								<div class="d-flex justify-content-center links">
						         <a href="registration.php" class="ml-2">Sign Up</a>
						    </div>
								<br/>

                <input type="submit" value="Log In" id="login" class="btn btn-block btn-primary">

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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
    <script>
      $(function(){
        $('#login').click(function(e){
          var valid = this.form.checkValidity();

          if (valid) {
            var username = $('#username').val();
            var pword = $('#pword').val();
          }

          e.preventDefault();

					$.ajax({
						type: 'POST',
						url: 'jslogin.php',
						data:  {username: username, pword: pword},
						success: function(data){
							alert(data);
							if($.trim(data) == 'Click OK to continue'){
								setTimeout(' window.location.href =  "index.php"', 1000);
							}
						},
						error: function(data){
							alert('There were erros while signing in.');
						}
					});
        });
      });
    </script>
  </body>
</html>
