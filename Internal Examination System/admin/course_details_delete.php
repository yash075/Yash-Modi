
<?php
	session_start();
	
	$s = $_SESSION["user"];
	
	if($s)
	{
        $d = $_GET['id'];
        
		include '../admin/connection.php';
		
		$query = "delete from course where course_id ='$d'; ";
		$result = mysqli_query($con,$query);
        
		if($result)
		{
			echo "<script>alert('Course Successfully Deleted.')</script>";
			echo "<script>window.location='../admin/course_details.php'</script>";
		}
		else
		{
			echo "<script>alert('Something went wrong in deleting Course.')</script>";
			
		}
	
	}
	else
	{
		header('location:../admin/index.php');
	}
?>