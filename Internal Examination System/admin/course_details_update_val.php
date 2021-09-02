<?php
 
	session_start();
	
	$s = $_SESSION["user"];
	
	if($s)
	{

	if(isset($_POST['submit']))
	{
		$id = $_GET['id'];
        $code = $_POST['course_code'];
		$name = $_POST['course_name'];
		$type = $_POST['course_type'];
		
		include '../admin/connection.php';
        
         $qry = "select * from course where course_code='$code' And course_id!='$id';";
            $result = mysqli_query($con,$qry);
            $row = mysqli_num_rows($result);
        
            if($row>0)
            {
                //echo "duplicate";
                echo "<script>alert('Course Already Add.')</script>";
                echo '<script>window.location="../admin/course_details.php"</script>';
            }
            else
            {
                $qry = "select * from course where course_id='$id';";
                $result = mysqli_query($con,$qry);
                $rowss = mysqli_fetch_assoc($result);
                $tcode = $rowss['course_code'];
                
		
		$qry = "UPDATE `course` SET course_code='$code',`course_name`='$name',`course_type`='$type' where course_id='$id';";
		$result = mysqli_query($con,$qry);
		
		//$num = mysqli_num_rows($result);
		
		if($result)
		{
            if($tcode != $code)
            {
                $qry = "select * from semester where course_id='$id';";
                $result = mysqli_query($con,$qry);
                while($row = mysqli_fetch_assoc($result))
                {
                    $code11 = $code.substr($row['sem_code'],2);
                    $id = $row['sem_id'];
                    $qry11 = "UPDATE `semester` SET sem_code='$code11' where sem_id='$id';";
		            $result11 = mysqli_query($con,$qry11); 
                }
                
            }
			echo "<script>alert('Successfully Changed Course Details.')</script>";
			echo '<script>window.location="../admin/course_details.php"</script>';
		}
		else
		{
			echo "<script>alert('something went wrong please check it.')</script>";
			echo '<script>window.location="../admin/course_details_update.php"</script>';
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