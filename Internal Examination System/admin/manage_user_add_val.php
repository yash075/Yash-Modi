<?php
    session_start();
	
	$s = $_SESSION["user"];
	
	if($s == TRUE)
	{
        if(isset($_POST['submit']))
        {
            $code = $_POST['f_code'];
            $name = $_POST['f_name'];
            $password = $_POST['f_password'];
            $type = $_POST['f_type'];
		    $jod = $_POST['f_jod'];
            $post = $_POST['f_post'];
            $mobile = $_POST['f_mobile'];
            $mail = $_POST['f_mail'];
            
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
            
            $qry = "select * from faculty where f_code='$code';";
            $result = mysqli_query($con,$qry);
            $row = mysqli_num_rows($result);
            if($row>0)
            {
                //echo "duplicate";
                echo "<script>alert('User Already Add.')</script>";
                echo '<script>window.location="../admin/manage_user_add.php"</script>';
            }
            else
            {
                //echo "Add";
                $qry1 = "INSERT INTO `faculty`(`f_id`,`f_code`, `f_name`, `f_password`, `f_type`, `f_jod`, `f_post`, `f_mobile`, `f_mail`) VALUES (NULL,'$code','$name','$password','$type','$jod','$post','$mobile','$mail')";
                $result1 = mysqli_query($con,$qry1);
                
                if($result1 )
                {
                    echo "<script>alert('User Successfully Add.')</script>";
                    echo '<script>window.location="../admin/manage_user.php"</script>';
                }
                else
                {
                    echo "<script>alert('something went wrong to add User please check it.')</script>";
                    echo '<script>window.location="../admin/manage_user_add.php"</script>';
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