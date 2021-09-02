<?php
 
	session_start();
	
	$s = $_SESSION["user"];
	
	if($s == TRUE)
	{

	if(isset($_POST['submit']))
	{
		$u = $_GET['id'];
		$s = $_POST['sem'];
		$n = $_POST['tname'];
		
		$con = mysqli_connect('localhost','root','','sport');
		
		$qry = "UPDATE `team` SET `sem`='$s',`team_name`='$n' where team_id='$u';";
		
		$result = mysqli_query($con,$qry);
		
		//$num = mysqli_num_rows($result);
		
		if($result)
		{
			echo "<script>alert('Successfully Changed Team Details.')</script>";
			echo '<script>window.location="team.php"</script>';
		}
		else
		{
			echo "<script>alert('something went wrong please check it.')</script>";
			echo '<script>window.location="team_update.php"</script>';
		}
			
	}
	else
	{
		echo "<script>alert('Something went Wrong.')</script>";
	}
		
	}
	else
	{
		header('location:index.php');
	}
?>