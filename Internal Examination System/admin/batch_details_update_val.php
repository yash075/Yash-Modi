<?php
 
	session_start();
	
	$s = $_SESSION["user"];
	
	if($s)
	{

	if(isset($_POST['submit']))
	{
		$id = $_GET['id'];
		$name = $_POST['batch_name'];
		
		include '../admin/connection.php';
        
        $qry = "select * from batch where batch_name='$name';";
            $result = mysqli_query($con,$qry);
            $row = mysqli_num_rows($result);
        
            if($row>0)
            {
                //echo "duplicate";
                echo "<script>alert('batch name Already Add.')</script>";
                echo '<script>window.location="../admin/batch_details_update.php"</script>';
            }
            else
            {
		
		$qry = "UPDATE `batch` SET `batch_name`='$name'   where batch_id='$id';";
		$result = mysqli_query($con,$qry);
		
		//$num = mysqli_num_rows($result);
		
		if($result)
		{
			echo "<script>alert('Successfully Changed batch Details.')</script>";
			echo '<script>window.location="../admin/batch_details.php"</script>';
		}
		else
		{
			echo "<script>alert('something went wrong please check it.')</script>";
			echo '<script>window.location="../admin/batch_details_update.php"</script>';
		}
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