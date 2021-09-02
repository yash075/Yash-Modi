<?php
	 
	session_start();
	
	$s = $_SESSION["user"];
	
	if($s == TRUE)
	{

		$con = mysqli_connect('localhost','root','','sport');
		
		$d = $_GET['id'];
		
		$query = "delete from participant where e_no ='$d'; ";
		
		$result = mysqli_query($con,$query);
		
		$num = mysqli_num_rows($result);
		
		if($result)
		{
			echo "<script>alert('Participant Details Deleted.')</script>";
			echo "<script>window.location='../admin/participant.php'</script>";
		}
		else
		{
			echo "<script>alert('Something went wrong in deleting details.')</script>";
			
		}

	}
	else
	{
		header('location:index.php');
	}

?>