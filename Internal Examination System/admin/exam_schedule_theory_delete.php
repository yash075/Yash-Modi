<?php
	
	session_start();
	
	$s = $_SESSION["user"];
	
	if($s)
	{
        if(isset($_POST['del']))
        {
        include '../admin/connection.php';
        $checkbox = $_POST['check'];
        for($i=0;$i<count($checkbox);$i++)
        {
            $del_id = $checkbox[$i];
            $qry = "select exam_schedule_theory.exam_sch_th_id from exam_schedule_theory inner join subject on subject.sub_id=exam_schedule_theory.sub_id where subject.sem_id='$del_id';";
            $result = mysqli_query($con,$qry);
            while($row = mysqli_fetch_assoc($result))
            {
                 $s = $row['exam_sch_th_id'];
                 mysqli_query($con,"delete from exam_schedule_theory where exam_sch_th_id='$s';");
            }

        }
        echo "<script>alert('Theory Exam Schedule Deleted.')</script>";
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