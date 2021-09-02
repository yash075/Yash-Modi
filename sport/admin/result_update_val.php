<?php


	session_start();
	
	$s = $_SESSION["user"];
	
	if($s == TRUE)
	{

	if(isset($_POST['submit']))
	{
		$u = $_GET['id'];
		$s = $_POST['slist'];
		$to = $_POST['t1'];
		$tt = $_POST['t2'];
		$w = $_POST['winlist'];
		
		$con = mysqli_connect('localhost','root','','sport');
		
		$qry = "UPDATE `result` SET `s_id`='$s',`r_team1`='$to',`r_team2`='$tt',`win_team_id`='$w' where r_id='$u';";
		
		$result = mysqli_query($con,$qry);
		
		//$num = mysqli_num_rows($result);
		
		if($result)
		{
			echo "<script>alert('Successfully Changed result Details.')</script>";
			echo '<script>window.location="result.php"</script>';
		}
		else
		{
			echo "<script>alert('something went wrong please check it.')</script>";
			echo '<script>window.location="result_update.php"</script>';
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