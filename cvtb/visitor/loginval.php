<?php
    session_start();
    $username = $_POST['uname'];
    $password =$_POST['password'];
//echo $username." - ".$password;
	include('includes/dbconnection.php');
	if(isset($_POST['submit']))
	{
			$query = "SELECT v_id FROM `visitor_log_detail` WHERE `email` LIKE '$username' AND `pass` LIKE '$password'";
			$results = mysqli_query($con, $query);
            //die($query);
			if (mysqli_num_rows($results) == 1) {
               // die("hello");
                $_SESSION['username'] = $username;
                while($row=mysqli_fetch_array($results)){
                    $id=$row['v_id'];
                }
                $_SESSION['cvmsaid']=$id;
				//$_SESSION['success'] = "You are now logged in";
                 echo '<script>alert("Welcome To CVMS user site.")</script>';
				echo '<script>window.location="main.php"</script>';
			}else {
               // die("hi");
                 echo '<script>alert("Username or password wrong.")</script>';
                echo '<script>window.location="index.php"</script>';
			}
		}
?>
