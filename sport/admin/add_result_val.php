<?php
	 $con = mysqli_connect('localhost','root','','sport');
	session_start();
	
	$s = $_SESSION["user"];
	
	if($s == TRUE)
	{
	if(isset($_POST['submit']))
	{
		$s = $_POST['slist'];
		$to = $_POST['t1s'];
		$tt = $_POST['t2s'];
		$w = $_POST['winlist'];
		
		$query = "select * from result where s_id='".$s."'";
		$res = mysqli_query($con,$query);
		$row = mysqli_num_rows($res);
		
		if($row>0)
		{
			echo "<script>alert('Result Already Generated.')</script>";
			echo '<script>window.location="result.php"</script>';
		}
		else
		{
			$qry = "INSERT INTO `result`(`s_id`, `r_team1`, `r_team2`, `win_team_id`) VALUES ('$s','$to','$tt','$w')";
		
			$result = mysqli_query($con,$qry);
		
			//$num = mysqli_num_rows($result);
		
			if($result)
			{
				echo "<script>alert('Result Successfully Generated.')</script>";
				echo '<script>window.location="result.php"</script>';
			}
			else
			{
				echo "<script>alert('something went wrong please check it.')</script>";
				echo '<script>window.location="add_result.php"</script>';
			}
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