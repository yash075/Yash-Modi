<?php
	session_start();
	
	$s = $_SESSION["user"];
	
	if($s)
	{
		if(isset($_POST['submit']))
        {
            $id = $_GET['id'];
            $code = $_POST['f_code'];
            $name = $_POST['f_name'];
            $password = $_POST['f_password'];
            $type = $_POST['f_type'];
            $jod = $_POST['f_jod'];
            $post = $_POST['f_post'];
            $mobile = $_POST['f_mobile'];
            $mail = $_POST['f_mail'];
        
            include '../admin/connection.php';
            
            $qry = "select * from faculty where f_code='$code';"; //"select * from faculty where f_code='$code' and f_mail='$mail' and f_mobile='$mobile';";
            $result = mysqli_query($con,$qry);
            $row = mysqli_num_rows($result);
        
            if($row>0)
            {
                //echo "duplicate";
                echo "<script>alert('Faculty Code Already Add.')</script>";
                echo '<script>window.location="../admin/manage_user_update.php"</script>';
            }
            else
            {
            
            $query2 = "UPDATE `faculty` SET `f_code`='$code',`f_name`='$name',`f_password`='$password',`f_type`='$type',`f_jod`='$jod',`f_post`='$post',`f_mobile`='$mobile',`f_mail`='$mail' where f_id='$id';";
            $result2 = mysqli_query($con,$query2);

            if($result2)
            {
                echo "<script>alert('Successfully Changed user Details.')</script>";
                echo "<script>window.location='../admin/manage_user.php'</script>";
            }
            else
            {
                 echo "<script>alert('Something went wrong in Updating user in Faculty Table.')</script>";
                die('query error:'.mysqli_errno($con).'error is:'.mysqli_errno($con));
            }
            }
        }
        else
        {
             echo "<script>alert('Something went wrong in updating user in Faculty Table.')</script>";
        }
    }
	else
	{
		header('location:index.php');
	}
?>