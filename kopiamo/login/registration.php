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
                    <label for="nama">Name</label>
                    <input type="text" name="nama" class="form-control" placeholder="John Doe" id="nama" required>
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
                    <input type="password" class="form-control" placeholder="Your Password" id="pword" name="pword" required>
                    <label class="control control--checkbox mb-1 mt-2 mb-sm-0"><span class="caption">Show password</span>
                        <input type="checkbox"  onclick="showPass()"/>
                        <div class="control__indicator"></div>
                      </label>
                </div>
								<div class="d-flex justify-content-center links">
		                 <a style="text-decoration:none" href="login.php" class="ml-2">Sign In</a>
		            </div>
								<br/>
                <input type="submit" id="signingup" value="Sign Up" class="btn btn-block btn-primary">

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
  	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

    <script type="text/javascript">

						$(function()
						{
							$('#signingup').click(function(e)
							{
								var valid = this.form.checkValidity();
								if(valid){
									var nama =$('#nama').val();
			            var username =$('#username').val();
			            var email =$('#email').val();
			            var pword =$('#pword').val();
									e.preventDefault();

									$.ajax( //ajax can update webpage without reloading,send data to a web server
									{
										type: 'POST',
										url: 'process.php',
										data: {nama: nama, username: username, email:email, pword:pword},
										success: function(data)
										{
										Swal.fire(  //swal.fire is sweetalert untuk keluarkan window prompt using the attributes(title,text,type)
										{
													'title': 'Successful',
													'text': data,
													'type': 'success'
													})

										},
										error: function(data)
										{
											Swal.fire(
											{
													'title': 'Errors',
													'text': 'Error in saving data.',
													'type': 'error'
											})
										}
									});
								}
							});
						});

    </script>


  </body>
</html>
