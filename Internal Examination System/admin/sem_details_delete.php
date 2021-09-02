
<?php
	session_start();
	
	$s = $_SESSION["user"];
	
	if($s)
	{
        $d = $_GET['id'];
        
		include '../admin/connection.php';
		
		$query = "delete from semester where sem_id ='$d';";
		$result = mysqli_query($con,$query);
        
		if($result)
		{
			echo "<script>alert('Semester Successfully Deleted.')</script>";
			echo "<script>window.location='../admin/sem_details.php'</script>";
		}
		else
		{
			echo "<script>alert('Something went wrong in deleting Semester.')</script>";	
		}
	
	}
	else
	{
		header('location:../admin/index.php');
	}
?>