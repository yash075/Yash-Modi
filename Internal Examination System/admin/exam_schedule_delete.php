<?php
	
	session_start();
	
	$s = $_SESSION["user"];
	
	if($s)
	{
        if(isset($_POST['del'])){
        include '../admin/connection.php';
        $checkbox = $_POST['check'];
        for($i=0;$i<count($checkbox);$i++){
           $del_id = $checkbox[$i]; 
           mysqli_query($con,"delete from exam_generation where exam_id='$del_id'");
        }
        echo "<script>alert('exam generated Deleted.')</script>";
        echo "<script>window.location='../admin/examination_schedule.php'</script>";
    }
    else
    {            
        echo "<script>alert('Something went wrong in deleting exam.')</script>";     
        die('query error:'.mysqli_errno($con).'error is:'.mysqli_errno($con));
        
    }	
      
	}
	else
	{
		header('location:../admin/index.php');
	}

?>