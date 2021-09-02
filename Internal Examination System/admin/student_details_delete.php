<?php
	session_start();
	
	$s = $_SESSION["user"];
	
	if($s)
	{
        $d = $_GET['id'];
        
		include '../admin/connection.php';
		
		$query = "delete from student where stud_id ='$d';";
		$result = mysqli_query($con,$query);
        
		if($result)
		{
			echo "<script>alert('Student Successfully Deleted.')</script>";
			echo "<script>window.location='../admin/student_details.php'</script>";
		}
		else
		{
			echo "<script>alert('Something went wrong in deleting Subject.')</script>";	
		}
	
	}
	else
	{
		header('location:../admin/index.php');
	}
?>