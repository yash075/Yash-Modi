<?php
    session_start();
    $username = $_POST['username'];
    $password =$_POST['password'];
//echo $username." - ".$password;
	include('includes/dbconnection.php');
	if(isset($_POST['submit']))
	{
			$query = "SELECT a_id FROM `admin` WHERE `a_mail` LIKE '$username' AND `a_pass` LIKE '$password'";
			$results = mysqli_query($con, $query);
            //die($query);
			if (mysqli_num_rows($results) == 1) {
               // die("hello");
                $_SESSION['username'] = $username;
                while($row=mysqli_fetch_array($results)){
                    $id=$row['a_id'];
                }
                $_SESSION['cvmsaid']=$id;
				//$_SESSION['success'] = "You are now logged in";
				echo '<script>window.location="dashboard.php"</script>';
			}else {
               // die("hi");
                $msg="Invalid Details.";
                echo '<script>window.location="index.php"</script>';
			}
		}
?>