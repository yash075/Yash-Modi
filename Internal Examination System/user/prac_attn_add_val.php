<?php
    session_start();
	
	$s = $_SESSION["user"];
	include '../user/connection.php'; 
	if($s == TRUE)
	{
        if(isset($_POST['submit']))
        {
           
                $checkbox = $_POST['check'];
            
                for($i=0;$i<count($checkbox);$i++)
                {
                    $stud_id = $checkbox[$i]; 
                    //die($stud_id);
                    //mysqli_query($con,"insert into attendance_practical values ('NULL',$id,$stud_id,'p');");
                    mysqli_query($con,"UPDATE `attendance_practical` SET `status` = 'p' WHERE `attendance_practical`.`att_pr_id` = $stud_id;");
                    //die ();
                }
                echo "<script>alert('Attendance Done.')</script>";
                echo "<script>window.location='../user/pracattendance.php'</script>";
        }
        else
        {
            echo "<script>alert('Something went Wrong.')</script>";
        }
    }
    else
    {
        header('location:../admin/attendance_add.php');
    }
?>