<?php
 
	session_start();
	

		$id = $_GET['vid'];
        $i = -1;

        include('includes/dbconnection.php');
        $qry="update visit_record set status='$i' where v_rec_id='$id';";
        $result = mysqli_query($con,$qry);
        if($result)
        {
            echo "<script>alert('Visit canceled.')</script>";
            echo '<script>window.location="visit_pandding.php"</script>';
        }
        else
        {
            echo "<script>alert('something went wrong please try again.')</script>";
             echo '<script>window.location="visit_panding.php"</script>';
        }
			
	
?>