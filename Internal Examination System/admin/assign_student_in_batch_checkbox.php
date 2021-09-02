<?php
	
	session_start();
	
	$s = $_SESSION["user"];
	
	if($s)
	{
        include '../admin/connection.php';
        if(isset($_POST['check'])){
        
        $checkbox = $_POST['check'];
        
        if(isset($_POST['delete']))
        {
            for($i=0;$i<count($checkbox);$i++)
            {
                $id = $checkbox[$i]; 
                mysqli_query($con,"delete from assign_student_in_batch where ass_stud_b_id='$id'");
            }
            echo "<script>alert('Students in Batch Deleted.')</script>";
            echo "<script>window.location='../admin/assign_student_in_batch.php'</script>";
        }
        else
        {
             echo "<script>window.location='../admin/assign_student_in_batch.php'</script>";
        }
             }
        else
        {
             echo "<script>window.location='../admin/assign_student_in_batch.php'</script>";
        }
    }
	else
	{
		header('location:../admin/index.php');
	}

?>