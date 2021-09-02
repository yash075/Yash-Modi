<?php
    session_start();
	
	$s = $_SESSION["user"];
	
	if($s == TRUE)
	{
        if(isset($_POST['submit']))
        {
            $title = $_REQUEST['e_title'];
            $sdate = $_REQUEST['srt_date'];
            $edate = $_REQUEST['en_date'];
            $status = $_REQUEST['status'];
            echo "<script>alert('$sdate')</script>";
           
            include '../admin/connection.php';

                $qry1 = "insert into exam_generation values ('NULL','$sdate','$edate','$title','$status');";
                $result1 = mysqli_query($con,$qry1);
                if($result1 )
                {
                    echo "<script>alert('exam is on')</script>";
                    echo '<script>window.location="../admin/examination_schedule.php"</script>';
                }
                else
                {
                    echo "<script>alert('something went wrong to add User please check it.')</script>";
                    echo '<script>window.location="../admin/exam_schedule_add.php"</script>';
                }
           // }
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