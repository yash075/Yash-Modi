<?php

	session_start();
	
	$s = $_SESSION["user"];
	
	if($s == TRUE)
	{

	if(isset($_POST['submit']))
	{
		
		$e = $_POST['eno'];
		$n = $_POST['pn'];
		$d = $_POST['bdate'];
		$m = $_POST['mno'];
		$c = $_POST['class'];
		$t = $_POST['tlist'];
		$g = $_POST['glist'];
		$ty = $_POST['pty'];
		$pp = $_POST['pass'];
		$em = $_POST['email'];
		
		/*echo $e;
		echo $n;
		echo $d;
		echo $m;
		echo $c;
		echo $t;
		echo $g;
		echo $ty;
		echo $em;*/
		
		$con = mysqli_connect('localhost','root','','sport');
		
		$qry = "INSERT INTO `participant`(`e_no`, `p_name`, `p_birth`, `p_mobile`, `p_class`, `team_id`, `game_id`, `p_type`, `p_password`, `p_email`) VALUES ('$e','$n','$d','$m','$c','$t','$g','$ty','$pp','$em')";
		
		
		$result = mysqli_query($con,$qry);
		
		//$num = mysqli_fetch_assoc($result);
		
		if($result)
		{
			echo "<script>alert('Participant Details Successfully Add.')</script>";
			echo '<script>window.location="participant.php"</script>';
		}
		else
		{
			echo "<script>alert('something went wrong to add Participant Details please check it.')</script>";
			echo '<script>window.location="add_participant.php"</script>';
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