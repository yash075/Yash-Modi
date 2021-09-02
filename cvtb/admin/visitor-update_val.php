<?php
 
	session_start();
	
	/*$s = $_SESSION["user"];
	
	if($s)
	{*/

	if(isset($_POST['sub']))
	{
		$sch_vi_id = $_GET['id'];
        $e_id = $_POST['e_name'];
        $reason = $_POST['reason'];
        $date = $_POST['date'];
        $time = $_POST['time'];
        
        echo 	$sch_vi_id." - ".$e_id." - ".$reason." - ".$date." - ".$time;
		
		include('includes/dbconnection.php');
        
        $qry = "UPDATE `schedule_visitor` SET `e_id`='$e_id',`reason`='$reason',`date`='$date',`time`='$time' WHERE `sch_vi_id`='$sch_vi_id';";
        
        
        $result = mysqli_query($con,$qry);
        if($result)
        {
            echo "<script>alert('Successfully Changed Visitor Details.')</script>";
            echo '<script>window.location="manage-newvisitors.php"</script>';
        }
        else
        {
            echo "<script>alert('something went wrong please check it.')</script>";
           echo '<script>window.location="manage-newvisitors.php"</script>';
        }
			
	}
	else
	{
		echo "<script>alert('Something went Wrong.')</script>";
	}
		
	/*}
	else
	{
		header('location:../admin/index.php');
	}*/
?>