<?php
	if(isset($_POST['submit']))
	{
        $sem_code = $_POST['sem_code'];
        $course_id = $_POST['course_id'];
		$sem_type = $_POST['sem_type'];
		
		include '../admin/connection.php';
		
        $qry = "select course_code from course where course_id='$course_id';";
        $result = mysqli_query($con,$qry);
        $row = mysqli_num_rows($result);
        
        if($row>0)
        {
            $num = mysqli_fetch_assoc($result);
            $sem_code=$num['course_code'].$sem_code;
        
            $qry = "select * from semester where sem_code='$sem_code' and course_id='$course_id';";
            $result = mysqli_query($con,$qry);
            $row = mysqli_num_rows($result);
        
            if($row>0)
            {
                //echo "duplicate";
                echo "<script>alert('Semester Already Add.')</script>";
                echo '<script>window.location="../admin/sem_details_add.php"</script>';
            }
            else
            {
                
                $qry2 = "INSERT INTO `semester` VALUES (NULL,'$course_id','$sem_code','$sem_type')";
			    $result2 = mysqli_query($con,$qry2);
                if($result2)
                {
                    echo "<script>alert('Semester Successfully Add.')</script>";
				    echo '<script>window.location="../admin/sem_details.php"</script>';
                }
			    else
			    {    
				    echo "<script>alert('something went wrong to add Semester please check it.')</script>";
				    echo '<script>window.location="../admin/sem_details_add.php"</script>';
                }
            }
        }
        else
        {
            echo "<script>alert('Course id is not Already Add in course Details.')</script>";
            echo '<script>window.location="../admin/sem_details_add.php"</script>';
        }
			
	}
	else
	{
		echo "<script>alert('Something went Wrong.')</script>";
	}
?>