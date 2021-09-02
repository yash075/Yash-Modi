<?php
 
	session_start();
	
	$s = $_SESSION["user"];
	
	if($s)
	{

	if(isset($_POST['submit']))
	{
		$id = $_GET['id'];
        $sem_id = $_POST['sem_id'];
        $sub_code = $_POST['sub_code'];
		$sub_name = $_POST['sub_name'];
		$sub_type = $_POST['sub_type'];
		
		include '../admin/connection.php';
		
        $qry = "select sem_code from semester where sem_id='$sem_id';";
        $result = mysqli_query($con,$qry);
        $row = mysqli_num_rows($result);
        
        if($row>0)
        {
            $num = mysqli_fetch_assoc($result);
            
            if(substr($sub_code,0,3)!=$num['sem_code'])
            {
                    echo "<script>alert('Subject code and semester code is not matched.')</script>";
				    echo '<script>window.location="../admin/subject_details.php"</script>';   
            }
            else
            {
                $qry = "select * from subject where sub_code='$sub_code' and sub_type='$sub_type' and sub_id!='$id';";
                $result = mysqli_query($con,$qry);
                $row = mysqli_num_rows($result);

                if($row>0)
                {
                    //echo "duplicate";
                    echo "<script>alert('Subject Type Already Add.')</script>";
                    echo '<script>window.location="../admin/subject_details_update.php"</script>';
                }
                else
                {
                    $qry = "UPDATE `subject` SET `sem_id`='$sem_id',`sub_code`='$sub_code',`sub_name`='$sub_name',`sub_type`='$sub_type' where sub_id='$id';";
                    $result = mysqli_query($con,$qry);

                    //$num = mysqli_num_rows($result);

                    if($result)
                    {
                        echo "<script>alert('Successfully Changed Subject Details.')</script>";
                        echo '<script>window.location="../admin/subject_details.php"</script>';
                    }
                    else
                    {
                        echo "<script>alert('something went wrong please check it.')</script>";
                        echo '<script>window.location="../admin/subject_details_update.php"</script>';
                    }
                }
            }
        }
			
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