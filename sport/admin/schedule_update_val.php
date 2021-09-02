<?php
	 
	session_start();
	
	$s = $_SESSION["user"];
	
	if($s == TRUE)
	{

	if(isset($_POST['submit']))
	{
		$u = $_GET['id'];
		$g = $_POST['glist'];
		$d = $_POST['date'];
		$t1 = $_POST['t1list'];
		$t2 = $_POST['t2list'];
		$t = $_POST['sctime'];
		$s = $_POST['st'];
		
		
		$con = mysqli_connect('localhost','root','','sport');
		
		$qry = "UPDATE `schedule` SET `game_id`='$g',`team1`='$t1',`team2`='$t2',`s_date`='$d',`s_time`='$t',`s_status`='$s' WHERE s_id = '$u';";
		
		$result = mysqli_query($con,$qry);
		
		//$num = mysqli_num_rows($result);
		
		if($result)
		{
			echo "<script>alert('Successfully Changed Schedule Details.')</script>";
			echo '<script>window.location="schedule.php"</script>';
		}
		else
		{
			echo "<script>alert('something went wrong please check it.')</script>";
			echo '<script>window.location="schedule_update.php"</script>';
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