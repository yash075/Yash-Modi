<?php

	session_start();
	
	$s = $_SESSION["user"];
	
	if($s == TRUE)
	{

	if(isset($_POST['submit']))
	{
		$u = $_GET['id'];
		$r = $_POST['relist'];
		$g = $_POST['glist'];
		$t = $_POST['winlist'];
		$s = $_POST['mans'];
		$m = $_POST['manm'];
		$bat = $_POST['bbat'];
		$bowl = $_POST['bbowl'];
		$rd = $_POST['raid'];
		
		$con = mysqli_connect('localhost','root','','sport');
		
		$qry = "UPDATE `winner` SET `r_id`='$r',`game_id`='$g',`team_id`='$t',`man_series`='$s',`man_match`='$m',`b_bowl`='$bowl',`b_bat`='$bat',`b_raid`='$rd';";
		
		$result = mysqli_query($con,$qry);
		
		//$num = mysqli_num_rows($result);
		
		if($result)
		{
			echo "<script>alert('Successfully Changed Details.')</script>";
			echo '<script>window.location="winner.php"</script>';
		}
		else
		{
			echo "<script>alert('something went wrong please check it.')</script>";
			echo '<script>window.location="winner_update.php"</script>';
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