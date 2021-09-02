<?php
	session_start();
	$u = $_POST['uname'];
	$p = $_POST['password'];
	
	if(isset($_POST['submit']))
	{
		
		
		$con = mysqli_connect('localhost','root','','sport');
		
		$qry = "select * from login where user='$u' && pass='$p';";
		
		$result = mysqli_query($con,$qry);
	
		$num = mysqli_num_rows($result);
	
		if($num == TRUE)
		{
			$_SESSION["user"]=$u;
			echo '<script>alert("Welcome To DCS Sport Event Managment System.")</script>';
			echo '<script>window.location="../admin/main.php"</script>';
			
		}
		else
		{
			echo '<script>alert("Please Check Username and Password.")</script>';
			echo '<script>window.location="../admin/index.php"</script>';
		}
	}
	else
	{
		echo "problem";
	}
?>