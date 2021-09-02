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

                    mysqli_query($con,"update assign_block set status='p' where assign_block.ass_b_id= '$stud_id';");
                    //die ();
                }
                echo "<script>alert('Attendance Done.')</script>";
                echo "<script>window.location='../user/index.php'</script>";
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