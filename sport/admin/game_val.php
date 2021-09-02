<?php
	if(isset($_POST['submit']))
	{
		$g = $_POST['game'];
		$n = $_POST['no'];
		$t = $_POST['gt'];
		$y = $_POST['year'];
		
		$con = mysqli_connect('localhost','root','','sport');
		
		/*$qry = "INSERT INTO `game`(`gname`, `max`, `type`, `year`) VALUES ('$g','$n','$t','$y')";
		
		$result = mysqli_query($con,$qry);
		
		//$num = mysqli_num_rows($result);
		
		if($result)
		{
			echo "<script>alert('Game Successfully Add.')</script>";
			echo '<script>window.location="game_show.php"</script>';
		}
		else
		{
			echo "<script>alert('something went wrong please check it.')</script>";
			echo '<script>window.location="game.php"</script>';
		}*/
		$qry = "select * from game where gname='$g';";
		$result = mysqli_query($con,$qry);
		$row = mysqli_num_rows($result);
		if($row>0)
		{
			//echo "duplicate";
			echo "<script>alert('Game Already Add.')</script>";
			echo '<script>window.location="game.php"</script>';
		}
		else
		{
			//echo "new";
			$qry1 = "INSERT INTO `game`(`gname`, `max`, `type`, `year`) VALUES ('$g','$n','$t','$y')";
			$result1 = mysqli_query($con,$qry1);
			if($result1 )
			{
				echo "<script>alert('Game Successfully Add.')</script>";
				echo '<script>window.location="game_show.php"</script>';
			}
			else
			{
				echo "<script>alert('something went wrong to add game please check it.')</script>";
				echo '<script>window.location="game.php"</script>';
			}
			
		}
		
			
	}
	else
	{
		echo "<script>alert('Something went Wrong.')</script>";
	}
?>