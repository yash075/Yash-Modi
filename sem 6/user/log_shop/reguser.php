<!DOCTYPE html>
<html lang="en">
<head>
	<title>Register</title>
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
				<form class="login100-form validate-form p-l-55 p-r-55 p-t-178" action="../log_shop/reguserval.php" method="post">
					<span class="login100-form-title">
					  Shop Serenity<br>
						Register
					</span>

					<div class="wrap-input100 validate-input m-b-16" data-validate="Please enter Name">
						<input class="input100" type="text" name="name" placeholder="Name"  value="<?php if(isset($_COOKIE['namec'])){echo $_COOKIE['namec'];}?>" required>
						<span class="focus-input100"></span>
					</div>
                    
					<div class="wrap-input100 validate-input m-b-16" data-validate="Please enter Mail">
						<input class="input100" type="email" name="mail" placeholder="E-mail" value="<?php if(isset($_COOKIE['mailc'])){echo $_COOKIE['mailc'];}?>" required>
						<span class="focus-input100"></span>
                    </div>

					<div class="wrap-input100 validate-input m-b-16" data-validate="Please enter Mobile no.">
						<input class="input100" type="tel" name="mob" placeholder="Mobile no." pattern="[0-9]{10}" value="<?php if(isset($_COOKIE['mobc'])){echo $_COOKIE['mobc'];}?>" required>
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Please enter password">
						<input class="input100" type="password" name="pass" placeholder="Password" value="<?php if(isset($_REQUEST['pass'])){echo $_REQUEST['pass'];}?>" required>
						<span class="focus-input100"></span>
					</div><br>
                    <div class="wrap-input100 validate-input" data-validate = "Please enter confirm password">
						<input class="input100" type="password" name="conpass" placeholder="Confirm password" value="<?php if(isset($_REQUEST['conpass'])){echo $_REQUEST['conpass'];}?>" required>
						<span class="focus-input100"></span>
					</div><br>

					<div class="container-login100-form-btn">
						<input type="submit" value="Sign In" name="submit" class="login100-form-btn">
					</div>

					<div class="flex-col-c p-t-170 p-b-40">
						<span class="txt1 p-b-9">
							 have an account?
						</span>

						<a href="indexuser.php" class="txt3">
							Sign in
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
		