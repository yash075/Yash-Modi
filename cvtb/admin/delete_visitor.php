<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['cvmsaid']==0)) {
  header('location:logout.php');
  } else{
  ?>
<?php
        if(isset($_POST['del']))
        {
            $checkbox = $_POST['check'];
            
            for($i=0;$i<count($checkbox);$i++)
            {
                $del_id = $checkbox[$i]; 
                mysqli_query($con,"delete from schedule_visitor where sch_vi_id='$del_id'");
            }
            echo "<script>alert('visitor Deleted.')</script>";
            echo "<script>window.location='manage-visit.php'</script>";
        }
	else
	{
		header('location:manage-visit.php');
    }
}

?>