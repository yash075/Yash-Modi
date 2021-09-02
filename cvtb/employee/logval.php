<?php
    session_start();
    $username = $_POST['username'];
    $password =$_POST['password'];
	include('includes/dbconnection.php');
	if(isset($_POST['submit']))
	{
			$query = "SELECT e_id FROM `employee` WHERE `e_name`='$username' AND `password`='$password'";
			$results = mysqli_query($con, $query);
            //die($query);
			if (mysqli_num_rows($results) == 1) {
               // die("hello");
                $_SESSION['username'] = $username;
                while($row=mysqli_fetch_array($results)){
                    $id=$row['e_id'];
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