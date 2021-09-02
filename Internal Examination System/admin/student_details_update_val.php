<?php
 
	session_start();
	
	$s = $_SESSION["user"];
	
	if($s)
	{

	if(isset($_POST['submit']))
	{
		$stud_id = $_GET['id'];
        $stud_code = $_POST['stud_code'];
        $stud_name = $_POST['stud_name'];
        $sem_id = $_POST['sem_id'];
        $stud_mobile = $_POST['stud_mobile'];
		$stud_mail = $_POST['stud_mail'];
		$stud_status = $_POST['stud_status'];
		
		include '../admin/connection.php';
        
         //$qry = "select * from student where stud_code='$stud_code' And stud_name='$stud_name' And sem_id='$sem_id' And stud_mobile='$stud_mobile' And stud_mail='$stud_mail' And stud_status='$stud_status';";
        
        $qry = "select * from student where stud_code='$stud_code' And stud_id!='$stud_id';";
            $result = mysqli_query($con,$qry);
            $row = mysqli_num_rows($result);
        
            if($row>0)
            {
                //echo "duplicate";
                echo "<script>alert('Student Code Already Add.')</script>";
                echo '<script>window.location="../admin/student_details.php"</script>';
            }
            else
            {
        
        $qry = "UPDATE `student` SET `stud_code`='$stud_code',`stud_name`='$stud_name',`sem_id`='$sem_id',`stud_mobile`='$stud_mobile',`stud_mail`='$stud_mail',`stud_status`='$stud_status' where stud_id='$stud_id';";
        $result = mysqli_query($con,$qry);

        if($result)
        {
            echo "<script>alert('Successfully Changed Student Details.')</script>";
            echo '<script>window.location="../admin/student_details.php"</script>';
        }
        else
        {
            echo "<script>alert('something went wrong please check it.')</script>";
            echo '<script>window.location="../admin/student_details_update.php"</script>';
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