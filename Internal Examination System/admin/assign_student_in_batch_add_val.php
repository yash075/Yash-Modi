<?php
	if(isset($_POST['submit']))
	{
		$stud_id = $_POST['stud_id'];
		$batch_id = $_POST['batch_id'];
		
		include '../admin/connection.php';
            $qry = "select * from assign_student_in_batch where stud_id='$stud_id';";
            $result = mysqli_query($con,$qry);
            $row = mysqli_num_rows($result);
        
            if($row>0)
            {
                //echo "duplicate";
                echo "<script>alert('Student Already Assign batch.')</script>";
                echo '<script>window.location="../admin/assign_student_in_batch_add.php"</script>';
            }
            else
            {
                    $qry2 = "INSERT INTO `assign_student_in_batch` VALUES  (NULL,'$batch_id','$stud_id')";
			         $result2 = mysqli_query($con,$qry2);
                    if($result2)
                    { 
				        echo "<script>alert('Student Successfully Assign in Batch.')</script>";
				        echo '<script>window.location="../admin/assign_student_in_batch.php"</script>';
                    }
			         else
			         {
                        /*$query3 = "delete from register where u_id ='$id'; ";
		                $result3 = mysqli_query($con,$query3);*/
                     
				        echo "<script>alert('something went wrong to Student Assign in Batch please check it.')</script>";
				        echo '<script>window.location="../admin/assign_student_in_batch_add.php"</script>';
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