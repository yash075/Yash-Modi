<?php
	session_start();
	$u = $_POST['uname'];
	$p = $_POST['password'];
	
	if(isset($_POST['submit']))
	{
		
        include '../admin/connection.php';
        
        $qry = "select * from register where u_id='$u';";
		$result = mysqli_query($con,$qry);
		$num = mysqli_num_rows($result);
	
		if($num)
		{
              $qry1 = "select * from register where u_id='$u' && u_password='$p';";
		      $result1 = mysqli_query($con,$qry1);
		      $num1 = mysqli_num_rows($result1);
            
              if($num1)
		      {
	               $data = mysqli_fetch_assoc($result);
                   $_SESSION["user"]=$u;
            
                   if($data['u_type'] == 'a')
                   {
                        echo '<script>alert("Welcome To DCS  Internal Examination System Admin user.")</script>';
			            echo '<script>window.location="../admin/main.php"</script>';
                        //header("location:../admin/main.php");
                    }
                    elseif($data['u_type'] == 'f')
                    {
                        echo '<script>alert("Welcome To DCS  Internal Examination System Fculty User.")</script>';
                    }
                    else
                    {
                        die('query error:'.mysqli_errno($con).'error is:'.mysqli_errno($con));
                    }
		      }
		      else
		      {
			        echo '<script>alert("Invalid Password.")</script>';
                    echo '<script>window.location="../admin/index.php"</script>';
                    //header("location:../admin/index.php");
		      }
        }
        else
        {
            echo '<script>alert("Invalid Username.")</script>';
            echo '<script>window.location="../admin/index.php"</script>';
            //header("location:../admin/index.php");
        }
	}
	else
	{
		echo "problem";
        echo '<script>window.location="../admin/index.php"</script>';
        //header("location:../admin/index.php");
	}
?>