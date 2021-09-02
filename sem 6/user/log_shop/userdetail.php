<?php 
if(isset($_REQUEST['set'])){
	session_start();
	
	$s = $_SESSION["user"];
  $id1=$_SESSION["id"];
}
  //die($id);
	//if($s == TRUE)
	//{
?>
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
	<a href="/sem 6/user/home.php?set=true" class="txt3" >
    <i class="fa fa-arrow-left" aria-hidden="true"></i> Home
						</a>
    <a href="changepassword.php?set=true" class="txt3" style="margin-left:20px;">Change Password</a>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form p-l-55 p-r-55 p-t-178" action="../log_shop/userdetailval.php" method="post">
					<span class="login100-form-title">
					  User Detail
					</span>
                   <?php 
                        include "connection.php";
                        $q=mysqli_query($con,"select * from customer where cust_id='$id1'");
                        $test=mysqli_fetch_assoc($q);
                   ?>
					<div class="wrap-input100 validate-input m-b-16" data-validate="Please enter Name">
						<input class="input100" type="text" name="name" placeholder="Name"  value="<?php echo $test['cust_name'];?>" required>
						<span class="focus-input100"></span>
					</div>
                    
					<div class="wrap-input100 validate-input m-b-16" data-validate="Please enter Mail">
						<input class="input100" type="email" name="mail" placeholder="E-mail" value="<?php echo $test['cust_mail'];?>" required>
						<span class="focus-input100"></span>
                    </div>

					<div class="wrap-input100 validate-input m-b-16" data-validate="Please enter Mobile no.">
						<input class="input100" type="tel" name="mob" placeholder="Mobile no." pattern="[0-9]{10}" value="<?php echo $test['cust_mob'];?>" required>
						<span class="focus-input100"></span>
					</div><br>
					<div class="container-login100-form-btn">
						<input type="submit" value="Change" name="submit" class="login100-form-btn" style="width:200px;">
					</div><br>
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
		