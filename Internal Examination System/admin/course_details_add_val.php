<?php
	if(isset($_POST['submit']))
	{
		$code = $_POST['course_code'];
		$name = $_POST['course_name'];
		$type = $_POST['course_type'];
		
		include '../admin/connection.php';
		
            $qry = "select * from course where course_code='$code' and course_name='$name';";
            $result = mysqli_query($con,$qry);
            $row = mysqli_num_rows($result);
        
            if($row>0)
            {
                //echo "duplicate";
                echo "<script>alert('Course Code and name Already Add.')</script>";
                echo '<script>window.location="../admin/course_details_add.php"</script>';
            }
            else
            {
            $qry = "select * from course where course_code='$code';";
            $result = mysqli_query($con,$qry);
            $row = mysqli_num_rows($result);
        
            if($row>0)
            {
                //echo "duplicate";
                echo "<script>alert('Course Code Already Add.')</script>";
                echo '<script>window.location="../admin/course_details_add.php"</script>';
            }
            else
            {
                $qry = "select * from course where course_name='$name';";
                $result = mysqli_query($con,$qry);
                $row = mysqli_num_rows($result);
        
                if($row>0)
                {
                    //echo "duplicate";
                    echo "<script>alert('Course Name Already Add.')</script>";
                    echo '<script>window.location="../admin/course_details_add.php"</script>';
                }
                else
                {
                    $qry2 = "INSERT INTO `course` VALUES  (NULL,'$code','$name','$type')";
			         $result2 = mysqli_query($con,$qry2);
                    if($result2)
                    { 
                        //$qry2 = "INSERT INTO `semester` VALUES  (NULL,'$code','$name','$type')";
				        echo "<script>alert('Course Successfully Add.')</script>";
				        echo '<script>window.location="../admin/course_details.php"</script>';
                    }
			         else
			         {
                        /*$query3 = "delete from register where u_id ='$id'; ";
		                $result3 = mysqli_query($con,$query3);*/
                     
				        echo "<script>alert('something went wrong to add Course please check it.')</script>";
				        echo '<script>window.location="../admin/course_details_add.php"</script>';
                    }
                }
            }
    }
			/* }
             else
			 {
				echo "<script>alert('something went wrong to add User please check it.')</script>";
				echo '<script>window.location="manage_user_add.php"</script>';
             }	
		}*/
	}
	else
	{
		echo "<script>alert('Something went Wrong.')</script>";
	}
?>