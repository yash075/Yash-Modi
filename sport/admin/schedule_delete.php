<?php

	 
	session_start();
	
	$s = $_SESSION["user"];
	
	if($s == TRUE)
	{

	
		$con = mysqli_connect('localhost','root','','sport');
		
		$d = $_GET['id'];
		
		$query = "delete from schedule where s_id ='$d'; ";
		
		$result = mysqli_query($con,$query);
		
		$num = mysqli_num_rows($result);
		
		if(!$num == 1)
		{
			echo "<script>alert('Schedule Deleted.')</script>";
			echo "<script>window.location='../admin/schedule.php'</script>";
		}
		else
		{
			echo "<script>alert('Something went wrong in deleting games.')</script>";
			
		}
		
	}
	else
	{
		header('location:index.php');
	}
?>
