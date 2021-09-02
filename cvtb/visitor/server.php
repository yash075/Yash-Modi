<?php 
	

	
	$db = mysqli_connect('localhost', 'root', '', 'cvl');

	// REGISTER USER
	if (isset($_POST['reg_user'])) {
		// receive all input values from the form
		$username =  $_POST['username'];
		$name =  $_POST['name'];
		$email =  $_POST['email'];
		$mobile = $_POST['mobile'];
		$gender = $_POST['gender'];
		$password = $_POST['password'];

		// register user if there are no errors in the form
	
			//$password = md5($password_1);//encrypt the password before saving in the database
			
			$query = "INSERT INTO visitor_log_detail (`name`, `username`, `pass`, `email`, `mob`, `gender`) VALUES('$name','$username','$password', '$email', '$mobile','$gender')";
			$qqq = mysqli_query($db, $query);

            if ($qqq) {
              
                 echo '<script>alert("Register Successfully .")</script>';
				echo '<script>window.location="index.php"</script>';
			}else {
                 echo '<script>alert("Some thing wrong.")</script>';
                echo '<script>window.location="register.php"</script>';
			}
		

	}
?>