<?php
 
	session_start();
	
	$s = $_SESSION["user"];
	
	if($s)
	{

	if(isset($_POST['submit']))
	{
		$id = $_GET['id'];
        $title = $_POST['e_title'];
		$status = $_POST['status'];
		
		include '../admin/connection.php';
		
		$qry = "UPDATE `exam_generation` SET status='$status',e_title='$title' where exam_id='$id';";
		$result = mysqli_query($con,$qry);
		
		//$num = mysqli_num_rows($result);
		
		if($result)
		{
			echo "<script>alert('Successfully Changed Exam Status.')</script>";
			echo '<script>window.location="examination_schedule.php"</script>';
		}
		else
		{
			echo "<script>alert('something went wrong please check it.')</script>";
			echo '<script>window.location="examination_schedule.php"</script>';
		}
         		
	}
	else
	{
		echo "<script>alert('Something went Wrong.')</script>";
	}
		
	}
	else
	{
		header('location:../admin/index.php');
	}
?>