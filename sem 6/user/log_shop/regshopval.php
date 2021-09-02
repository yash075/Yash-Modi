<?php
        if(isset($_POST['submit']))
        {
            $name = $_POST['name'];
		    $mobile = $_POST['mob'];
            $mail = $_POST['mail'];
			$pass = $_POST['pass'];
			$conpass=$_POST['conpass'];
            //echo $desc;
            //die($pass ." ".$conpass);
            if($pass!=$conpass){
                //die($pass ." ".$conpass."0");
                setcookie('namesc', $name, time() + (180));
                setcookie('mailsc', $mail, time() + (180));
                setcookie('mobsc', $mobile, time() + (180));
				header("location:regshop.php");
            }
            if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
                echo "<script>alert('only character are allowed in name.')</script>";
                echo '<script>window.location="regshop.php"</script>';
              }
            include 'connection.php';
            $qry = "select * from  member where m_mail='$mail' Or m_mob='$mobile' ;";
            $result = mysqli_query($con,$qry);
            $row = mysqli_num_rows($result);
            if($row>0)
            {
                //echo "duplicate";
                echo "<script>alert('Mail id Or Mobile no. Already exist.')</script>";
                echo '<script>window.location="regshop.php"</script>';
            }
            else
            {
                //echo "Add";
                $qry1 = "insert into member(`m_id`,`m_name`,`m_mob`,`m_mail`,`m_pass`) values (NULL,'$name','$mobile','$mail','$pass')";
                $result1 = mysqli_query($con,$qry1);
                
                if($result1 )
                {
                    echo "<script>alert('Account Created.')</script>";
                    echo '<script>window.location="indexshop.php"</script>';
                }
                else
                {
                    echo "<script>alert('something went wrong.')</script>";
                    /*echo $desc;*/
                  die('query error:'.mysqli_errno($con).'error is:'.mysqli_errno($con));
                    echo '<script>window.location="regshop.php"</script>';
                }
            }
        }
        else
        {
            echo "<script>alert('Something went Wrong plz check.')</script>";
           // die('query error:'.mysqli_errno($con).'error is:'.mysqli_errno($con));
            echo '<script>window.location="regshop.php"</script>';
        }
?>