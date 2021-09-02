<?php
 
	session_start();
	
	$s = $_SESSION["user"];
	
	if($s)
	{
        if(isset($_POST['submit']))
        {
            $fac_per_id = $_GET['id'];
            $sub_id = $_POST['sub_id'];
            $f_id = $_POST['f_id'];
		    $batch_id = $_POST['batch_id'];
            
            include '../admin/connection.php';

            
           /* $qry = "select batch_id from batch where batch_id='$batch_id';";
                    
            $result = mysqli_query($con,$qry);
            $row = mysqli_num_rows($result);
                
            if($row == 1)
            {*/
                //$batchid =  mysqli_fetch_assoc($result);
                $qry = "select * from faculty_permission where sub_id='$sub_id' AND f_id='$f_id' AND batch_id='$batch_id';";
                $result = mysqli_query($con,$qry);
                $row = mysqli_num_rows($result);
                if($row>0)
                    {
                         echo "<script>alert('Batch And Subject allready assign in This Faculty.')</script>";
                        echo '<script>window.location="../admin/faculty_permission.php"</script>';
                    }
                    else
                    {
                        $qry2 = "UPDATE `faculty_permission` SET `f_id`='$f_id',`sub_id`='$sub_id',`batch_id`='$batch_id' where fac_per_id='$fac_per_id';";
			            $result2 = mysqli_query($con,$qry2);
                        if($result2)
                        {
                            echo "<script>alert('Permission Successfully Update.')</script>";
				            echo '<script>window.location="../admin/faculty_permission.php"</script>';
                        }
			            else
			            {
                            echo "<script>alert('something went wrong to Permission please check it.')</script>";
				            echo '<script>window.location="../admin/faculty_permission_update.php"</script>';
                        }
                    }      
               /* }
                else
                {
                    echo "<script>alert('Batch '+'$name'+' Not Insert Record In The sem Batch table' )</script>";
                    echo '<script>window.location="../admin/batch_details_add.php"</script>';
                }  */  
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