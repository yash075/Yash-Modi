<?php
	session_start();
	
	$s = $_SESSION["user"];
	
	if($s == TRUE)
	{
		
	if(isset($_POST['submit']))
	{
		$u = $_GET['id'];
		$g = $_POST['game'];
		$n = $_POST['no'];
		$t = $_POST['gt'];
		$y = $_POST['year'];
		
		$con = mysqli_connect('localhost','root','','sport');
		
		$qry = "UPDATE `game` SET `gname`='$g',`max`='$n',`type`='$t',`year`='$y' where game_id='$u';";
		
		$result = mysqli_query($con,$qry);
		
		//$num = mysqli_num_rows($result);
		
		if($result)
		{
			echo "<script>alert('Successfully Changed Game Details.')</script>";
			echo '<script>window.location="game_show.php"</script>';
		}
		else
		{
			echo "<script>alert('something went wrong please check it.')</script>";
			echo '<script>window.location="game_update.php"</script>';
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