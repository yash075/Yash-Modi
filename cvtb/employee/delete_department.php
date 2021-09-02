<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['cvmsaid']==0)) {
  header('location:logout.php');
  } else{
         if(isset($_POST['del']))
        {
            $checkbox = $_POST['check'];
            
            for($i=0;$i<count($checkbox);$i++)
            {
                $del_id = $checkbox[$i]; 
                mysqli_query($con,"delete from department where d_id='$del_id'");
            }
            echo "<script>alert('Department Deleted.')</script>";
            echo "<script>window.location='department.php'</script>";
        }
	}
?>