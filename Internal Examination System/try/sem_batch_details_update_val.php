<?php
 
	session_start();
	
	$s = $_SESSION["user"];
	
	if($s)
	{
        if(isset($_POST['submit']))
        {
            $batch_id = $_GET['id'];
            $sem_id = $_POST['sem_id'];
            $batch_name = $_POST['batch_name'];
            
            include '../admin/connection.php';

            $qry = "select * from sem_batch where sem_id='$sem_id' and batch_name='$batch_name';";
            $result = mysqli_query($con,$qry);
            $row = mysqli_num_rows($result);
        
            if($row>0)
            {
                //echo "duplicate";
                echo "<script>alert('Batch Already Add.')</script>";
                echo '<script>window.location="../admin/sem_batch_details_update.php"</script>';
            }
            else
            {
                $qry = "UPDATE `sem_batch` SET `sem_id`='$sem_id',`batch_name`='$batch_name' where batch_id='$batch_id';";
                $result = mysqli_query($con,$qry);
                if($result)
                {
                    echo "<script>alert('Successfully Changed Batch Details.')</script>";
                    echo '<script>window.location="../admin/sem_batch_details.php"</script>';
                }
                else
                {
                    echo "<script>alert('something went wrong please check it.')</script>";
                    echo '<script>window.location="../admin/sem_batch_details_update.php"</script>';
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