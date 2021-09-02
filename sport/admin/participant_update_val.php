<?php

	session_start();
	
	$s = $_SESSION["user"];
	
	if($s == TRUE)
	{

	if(isset($_POST['submit']))
	{
		$u = $_GET['id'];
		$e = $_POST['eno'];
		$n = $_POST['pn'];
		$d = $_POST['bdate'];
		$m = $_POST['mno'];
		$c = $_POST['class'];
		$t = $_POST['tlist'];
		$g = $_POST['glist'];
		$ty = $_POST['pty'];
		//$pp = $_POST['pass'];
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
		
		$qry = "UPDATE `participant` SET `e_no`='$e',`p_name`='$n',`p_birth`='$d',`p_mobile`='$m',`p_class`='$c',`team_id`='$t',`game_id`='$g',`p_type`='$ty',`p_email`='$em' WHERE e_no = '$u';";
		
		
		$result = mysqli_query($con,$qry);
		
		//$num = mysqli_fetch_assoc($result);
		
		if($result)
		{
			echo "<script>alert('Participant Details Successfully Updated.')</script>";
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