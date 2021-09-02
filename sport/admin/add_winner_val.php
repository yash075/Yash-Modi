<?php

	session_start();
	
	$s = $_SESSION["user"];
	
	if($s == TRUE)
	{

	if(isset($_POST['submit']))
	{
		$r = $_POST['rlist'];
		$g = $_POST['glist'];
		$t = $_POST['winlist'];
		$s = $_POST['mans'];
		$m = $_POST['manm'];
		$bat = $_POST['bbat'];
		$bowl = $_POST['bbowl'];
		$rd = $_POST['raid'];
		
		$con = mysqli_connect('localhost','root','','sport');
		
		$qry = "INSERT INTO `winner`(`r_id`, `game_id`, `team_id`, `man_series`, `man_match`, `b_bowl`, `b_bat`, `b_raid`) VALUES ('$r','$g','$t','$s','$m','$bat','$bowl','$rd');";
		
		
		$result = mysqli_query($con,$qry);
		
		//$num = mysqli_fetch_assoc($result);
		
		if($result)
		{
			echo "<script>alert('Winners Successfully Generated.')</script>";
			echo '<script>window.location="winner.php"</script>';
		}
		else
		{
			echo "<script>alert('something went wrong in Generate winner so please check it.')</script>";
			echo '<script>window.location="add_winner.php"</script>';
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