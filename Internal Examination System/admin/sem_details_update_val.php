<?php
 
	session_start();
	
	$s = $_SESSION["user"];
	
	if($s)
	{
        if(isset($_POST['submit']))
        {
            $sem_id = $_GET['id'];
            $sem_code = $_POST['sem_code'];
            $course_id = $_POST['course_id'];
            $sem_type = $_POST['sem_type'];
            
            include '../admin/connection.php';

            $qry = "select course_code from course where course_id='$course_id';";
            $result = mysqli_query($con,$qry);
            $row = mysqli_num_rows($result);
        
            if($row>0)
            {
                $num=mysqli_fetch_assoc($result);
                $sem_code = $num['course_code'].$sem_code;

                $qry = "select * from semester where sem_code='$sem_code' AND sem_id!='$sem_id';";
                $result = mysqli_query($con,$qry);
                $row = mysqli_num_rows($result);

                if($row>1)
                {
                    //echo "duplicate";
                    echo "<script>alert('Semester Code Already Add.')</script>";
                    echo '<script>window.location="../admin/sem_details_update.php"</script>';
                }
                else
                {
                    $qry = "UPDATE `semester` SET `sem_code`='$sem_code',`sem_type`='$sem_type',`course_id`='$course_id' where sem_id='$sem_id';";
                    $result = mysqli_query($con,$qry);
                    if($result)
                    {
                        echo "<script>alert('Successfully Changed Semester Details.')</script>";
                        echo '<script>window.location="../admin/sem_details.php"</script>';
                    }
                    else
                    {
                        echo "<script>alert('something went wrong please check it.')</script>";
                        echo '<script>window.location="../admin/sem_details_update.php"</script>';
                    }
                }
            }
            else
		    {
                echo "<script>alert('something went wrong please check it.')</script>";
                echo '<script>window.location="../admin/sem_details_update.php"</script>';
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