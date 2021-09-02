<?php
	if(isset($_POST['submit']))
	{
        $stud_code = $_POST['stud_code'];
        $stud_name = $_POST['stud_name'];
        $sem_id = $_POST['sem_id'];
        $stud_mobile = $_POST['stud_mobile'];
        $stud_mail = $_POST['stud_mail'];
		$stud_status = '1';
		
		include '../admin/connection.php';
            
        $qry = "select * from student where stud_code='$stud_code';";
        $result = mysqli_query($con,$qry);
        $row = mysqli_num_rows($result);
        
        if($row>0)
        {
            //echo "duplicate";
            echo "<script>alert('Student code Already Add.')</script>";
            echo '<script>window.location="../admin/student_details_add.php"</script>';
        }
        else
        {
                
            $qry2 = "INSERT INTO `student` VALUES (NULL,'$stud_code','$stud_name','$sem_id','$stud_mobile','$stud_mail','$stud_status')";
		   $result2 = mysqli_query($con,$qry2);
            if($result2)
            {
                echo "<script>alert('Student Successfully Add.')</script>";
                echo '<script>window.location="../admin/student_details.php"</script>';
            }
			else
			{    
			    echo "<script>alert('something went wrong to add student please check it.')</script>";
			    echo '<script>window.location="../admin/student_details_add.php"</script>';
            }
        }	
	}
	else
	{
		echo "<script>alert('Something went Wrong.')</script>";
	}
?>