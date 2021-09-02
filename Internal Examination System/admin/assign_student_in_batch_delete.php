
<?php
	session_start();
	
	$s = $_SESSION["user"];
	
	if($s)
	{
        $d = $_GET['id'];
        
		include '../admin/connection.php';
		
		$query = "delete from assign_student_in_batch where ass_stud_b_id ='$d'; ";
		$result = mysqli_query($con,$query);
        
		if($result)
		{
			echo "<script>alert('Student in Batch Successfully Deleted.')</script>";
			echo "<script>window.location='../admin/assign_student_in_batch.php'</script>";
		}
		else
		{
			echo "<script>alert('Something went wrong in Student Batch.')</script>";
			
		}
	
	}
	else
	{
		header('location:../admin/index.php');
	}
?>