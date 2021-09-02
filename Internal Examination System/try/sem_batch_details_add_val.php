<?php
	if(isset($_POST['submit']))
	{
        $sem_id = $_POST['sem_id'];
        $batch_name = strtoupper($_POST['batch_name']);
		
		include '../admin/connection.php';
		
        $qry = "select * from sem_batch where sem_id='$sem_id' and batch_name='$batch_name';";
        $result = mysqli_query($con,$qry);
        $row = mysqli_num_rows($result);
        
        if($row>0)
        {
            /*$num = mysqli_fetch_assoc($result);
            $sem_code=$num['course_code'].$sem_code;
        
            $qry = "select * from semester where sem_code='$sem_code' and course_id='$course_id';";
            $result = mysqli_query($con,$qry);
            $row = mysqli_num_rows($result);
        
            if($row>0)
            {*/
                //echo "duplicate";
                echo "<script>alert('Batch Already Add.')</script>";
                echo '<script>window.location="../admin/sem_batch_details_add.php"</script>';
        }
        else
        {
                
            $qry2 = "INSERT INTO `sem_batch` VALUES (NULL,'$sem_id','$batch_name')";
			$result2 = mysqli_query($con,$qry2);
            if($result2)
            {
                echo "<script>alert('Batch Successfully Add.')</script>";
			    echo '<script>window.location="../admin/sem_batch_details.php"</script>';
            }
			else
			{    
			   echo "<script>alert('something went wrong to add Batch please check it.')</script>";
			   echo '<script>window.location="../admin/sem_batch_details_add.php"</script>';
            }
        }
	}
	else
	{
		echo "<script>alert('Something went Wrong.')</script>";
	}
?>