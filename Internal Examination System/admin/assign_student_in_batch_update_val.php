<?php
 
	session_start();
	
	$s = $_SESSION["user"];
	
	if($s)
	{

	if(isset($_POST['submit']))
	{
		$id = $_GET['id'];
		$batch_id = $_POST['batch_id'];
		
		include '../admin/connection.php';
		
		$qry = "UPDATE `assign_student_in_batch` SET `batch_id`='$batch_id' where ass_stud_b_id='$id';";
		$result = mysqli_query($con,$qry);
		
		//$num = mysqli_num_rows($result);
		
		if($result)
		{
			echo "<script>alert('Student Successfully Changing Batch.')</script>";
			echo '<script>window.location="../admin/assign_student_in_batch.php"</script>';
		}
		else
		{
			echo "<script>alert('something went wrong please check it.')</script>";
			echo '<script>window.location="../admin/assign_student_in_batch_update.php"</script>';
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