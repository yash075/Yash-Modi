<?php
	$con = mysqli_connect('localhost','root','','sport');
	session_start();
	
	$s = $_SESSION["user"];
	
	if($s == TRUE)
	{
	if(isset($_POST['submit']))
	{
		$g = $_POST['list'];
		$t1 = $_POST['t1list'];
		$t2 = $_POST['t2list'];
		$d = $_POST['dt'];
		$t = $_POST['sctime'];
		$s = $_POST['st'];
		
		$query = "select * from schedule where game_id='".$g."' && team1 = '".$t1."' && team2 = '".$t2."' ";
		$res = mysqli_query($con,$query);
		$row = mysqli_num_rows($res);
		
		if($row>0)
		{
			echo "<script>alert('Schedule Already Generated.')</script>";
			echo '<script>window.location="schedule.php"</script>';
		}
		else
		{
		
			$qry = "INSERT INTO `schedule`(`game_id`, `team1`, `team2`, `s_date`, `s_time`, `s_status`) VALUES ('$g','$t1','$t2','$d','$t','$s')";
		
			$result = mysqli_query($con,$qry);
		
			//$num = mysqli_fetch_assoc($result);
		
			if($result)
			{
				echo "<script>alert('Schedule Successfully created.')</script>";
				echo '<script>window.location="schedule.php"</script>';
			}
			else
			{
				echo "<script>alert('something went wrong please check it.')</script>";
				echo '<script>window.location="add_schedule.php"</script>';
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