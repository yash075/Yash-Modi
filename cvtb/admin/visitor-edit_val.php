<?php
 
	session_start();
	
	/*$s = $_SESSION["user"];
	
	if($s)
	{*/

	if(isset($_POST['sub']))
	{
		$v_id = $_GET['id'];        
       // echo 	$sch_vi_id." - ".$e_id." - ".$reason." - ".$date." - ".$time;
		
        include('includes/dbconnection.php');
        $file=$_FILES['filerem']['name'];
    $locfile= $_FILES['filerem']['tmp_name'];
    $folder="uploads/file/";
    $servepathfile=$locfile;
    $pathfile=$folder.$file;
        move_uploaded_file($servepathfile,$pathfile);
        $qry = "UPDATE `visitor_log_detail` SET `info`='$pathfile' WHERE `v_id`='$v_id';";
        
        $result = mysqli_query($con,$qry);
        if($result)
        {
            echo "<script>alert('Visitor Details Changed.')</script>";
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