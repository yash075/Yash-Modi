
<?php
	
	session_start();
	
	//$s = $_SESSION["user"];
	
	if(true)//$s)
	{
        include('includes/dbconnection.php');
        if(isset($_POST['del']))
        {
            $checkbox = $_POST['check'];
            
            for($i=0;$i<count($checkbox);$i++)
            {
                $del_id = $checkbox[$i]; 
                mysqli_query($con,"delete from visitor_log_detail where v_id ='$del_id'");
            }
            echo "<script>alert('visitors Deleted.')</script>";
            echo "<script>window.location='manage-newvisitors.php'</script>";
        }
	}
	/*else
	{
		header('location:../admin/index.php');        
	}*/

?>