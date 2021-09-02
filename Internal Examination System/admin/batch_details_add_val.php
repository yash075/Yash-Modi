<?php
	if(isset($_POST['submit']))
    {
		$name = $_POST['batch_name'];
		
		
		include '../admin/connection.php';
		
		/*$qry = "INSERT INTO `game`(`gname`, `max`, `type`, `year`) VALUES ('$g','$n','$t','$y')";
		
		$result = mysqli_query($con,$qry);
		
		//$num = mysqli_num_rows($result);
		
		if($result)
		{
			echo "<script>alert('Game Successfully Add.')</script>";
			echo '<script>window.location="game_show.php"</script>';
		}
		else
		{
			echo "<script>alert('something went wrong please check it.')</script>";
			echo '<script>window.location="game.php"</script>';
		}*/
        
        
        
		/*$qry = "select * from register where u_id='$id';";
		$result = mysqli_query($con,$qry);
		$row = mysqli_num_rows($result);
		if($row>0)
		{
			//echo "duplicate";
			echo "<script>alert('User Already Add.')</script>";
			echo '<script>window.location="manage_user_add.php"</script>';
		}
		else
		{
			//echo "new";
			$qry1 = "INSERT INTO `register`(`u_id`, `u_name`, `u_password`, `u_type`, `u_bod`, `u_post`, `u_mobile`, `u_mail`) VALUES ('$id','$name','$password','$type','$bod','$post','$mobile','$mail')";
			$result1 = mysqli_query($con,$qry1);
			if($result1 )
			{*/
            $qry = "select * from batch where batch_name='$name';";
            $result = mysqli_query($con,$qry);
            $row = mysqli_num_rows($result);
        
            if($row>0)
            {
                //echo "duplicate";
                echo "<script>alert('batch name Already Add.')</script>";
                echo '<script>window.location="../admin/batch_details_add.php"</script>';
            }
            else
            {
                    $qry2 = "INSERT INTO `batch` VALUES  (NULL,'$name')";
			         $result2 = mysqli_query($con,$qry2);
                    if($result2)
                    { 
				        echo "<script>alert('batch Successfully Add.')</script>";
				        echo '<script>window.location="../admin/batch_details.php"</script>';
                    }
			         else
			         {
                        /*$query3 = "delete from register where u_id ='$id'; ";
		                $result3 = mysqli_query($con,$query3);*/
                     
				        echo "<script>alert('something went wrong to add batch please check it.')</script>";
				        echo '<script>window.location="../admin/batch_details_add.php"</script>';
                    }
            }
			/* }
             else
			 {
				echo "<script>alert('something went wrong to add User please check it.')</script>";
				echo '<script>window.location="manage_user_add.php"</script>';
             }	
		}*/
	}
	else
	{
		echo "<script>alert('Something went Wrong.')</script>";
	}
?>