<?php
session_start();
error_reporting(0);
include('connection.php');
$mob=$_SESSION['contactno'];
$mail=$_SESSION['email'];
if(isset($_POST['submit']))
  {
    $contactno=$_SESSION['contactno'];
    $email=$_SESSION['email'];
    $pass=$_POST['pass'];
    $conpass=$_POST['conpass'];
    if($pass!=$conpass){
        echo "<script>alert('Password & Confirm Password does not match');</script>";
echo '<script>window.location="restpassworduser.php"</script>';
    }
    $query=mysqli_query($con,"update member set m_pass='$pass'  where  m_mail='$email' or m_mob='$contactno' ");
   if($query)
   {
echo "<script>alert('Password successfully changed');</script>";
echo '<script>window.location="indexshop.php"</script>';
   }
  
  }
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
<a href="/sem 6/user/home.php" class="txt3" >
    <i class="fa fa-arrow-left" aria-hidden="true"></i> Home
						</a>	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form p-l-55 p-r-55 p-t-178" action="" method="post">
					<span class="login100-form-title">
						Reset Password
					</span>

					<div class="wrap-input100 validate-input m-b-16" data-validate="Password">
						<input class="input100" type="password" name="pass" placeholder="Password" required>
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Confirm Password.">
						<input class="input100" type="password" name="conpass" placeholder="Confirm Password" required>
						<span class="focus-input100"></span>
					</div>
<br>
					<div class="container-login100-form-btn">
					<input type="submit" value="Reset" name="submit" class="login100-form-btn" style="width:150px;">
					</div>

					<div class="flex-col-c p-t-170 p-b-40">
						<span class="txt1 p-b-9">
							Rember Password?
						</span>

						<a href="indexshop.php" class="txt3">
							Sign In
						</a>

					</div>
				</form>
			</div>
		</div>
	</div>
	
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>