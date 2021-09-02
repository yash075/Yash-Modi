
<?php
	session_start();
	
	$s = $_SESSION["user"];
	
	if($s)
	{
        $d = $_GET['id'];
        
		include '../admin/connection.php';
		
		$query = "delete from batch where batch_id ='$d'; ";
		$result = mysqli_query($con,$query);
        
		if($result)
		{
			echo "<script>alert('batch Successfully Deleted.')</script>";
			echo "<script>window.location='../admin/batch_details.php'</script>";
		}
		else
		{
			echo "<script>alert('Something went wrong in deleting batch.')</script>";
			
		}
	
	}
	else
	{
		header('location:../admin/index.php');
	}
?>