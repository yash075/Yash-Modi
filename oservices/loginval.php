<?php
	session_start();
	$u = $_POST['uname'];
	$p = $_POST['password'];
	
	if(isset($_POST['submit']))
	{
		
        include 'connection.php';
        
        $qry = "select * from user_info where u_email='$u';";
		$result = mysqli_query($con,$qry);
		$num = mysqli_num_rows($result);
	
		if($num)
		{
              $qry1 = "select * from user_info where u_email='$u' && u_password='$p';";
		      $result1 = mysqli_query($con,$qry1);
		      $num1 = mysqli_num_rows($result1);
            
              if($num1)
		      {
	               $data = mysqli_fetch_assoc($result);
                   $_SESSION["user"]=$u;
                   $_SESSION["id"]=$data['u_id'];
            
                   if($data['u_type'] == "A")
                   {
                        echo '<script>alert("Welcome To Admin.")</script>';
			            echo '<script>window.location="admin/index.php"</script>';
                        //header("location:../admin/main.php");
                    }
                    elseif($data['u_type'] == "S")
                    {
                        echo '<script>alert("Welcome To Shop.")</script>';
                         echo '<script>window.location="member-old/index.php"</script>';
                    }
                    elseif($data['u_type'] == "U")
                    {
                        echo '<script>alert("Welcome To Customer.")</script>';
                         echo '<script>window.location="user/index.php"</script>';
                    }
                    else
                    {
                        die('query error:'.mysqli_errno($con).'error is:'.mysqli_errno($con));
                    }
		      }
		      else
		      {
			        echo '<script>alert("Invalid Password.")</script>';
                    echo '<script>window.location="index.php"</script>';
                    //header("location:../admin/index.php");
		      }
        }
        else
        {
            echo '<script>alert("Invalid Email.")</script>';
            echo '<script>window.location="index.php"</script>';
            //header("location:../admin/index.php");
        }
	}
	else
	{
		echo "problem";
        echo '<script>window.location="index.php"</script>';
        //header("location:../admin/index.php");
	}
?>