<?php
        if(isset($_POST['submit']))
        {
            $name = $_POST['name'];
		    $mobile = $_POST['mob'];
            $mail = $_POST['mail'];
			
            //echo $desc;
            //die($pass ." ".$conpass);
            if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
                echo "<script>alert('only character are allowed in name.')</script>";
                echo '<script>window.location="reguser.php"</script>';
              }
            include 'connection.php';
            $qry = "select * from  customer where cust_mail='$mail' Or cust_mob='$mobile' ;";
            $result = mysqli_query($con,$qry);
            $row = mysqli_num_rows($result);
            if($row>0)
            {
                //echo "duplicate";
                echo "<script>alert('Mail id Or Mobile no. Already exist.')</script>";
                echo '<script>window.location="reguser.php"</script>';
            }
            else
            {
                //echo "Add";
                $qry1 = "update customer set cust_name='$name',cust_mail='$mail',cust_mob='$mobile')";
                $result1 = mysqli_query($con,$qry1);
                
                if($result1 )
                {
                    echo "<script>alert('Account Update.')</script>";
                    echo '<script>window.location="../user/home.php?set=true"</script>';
                }
                else
                {
                    echo "<script>alert('something went wrong.')</script>";
                    /*echo $desc;*/
                   //die('query error:'.mysqli_errno($con).'error is:'.mysqli_errno($con));
                    echo '<script>window.location="userdetail.php"</script>';
                }
            }
        }
        else
        {
            echo "<script>alert('Something went Wrong plz check.')</script>";
            //die('query error:'.mysqli_errno($con).'error is:'.mysqli_errno($con));
            echo '<script>window.location="userdetail.php"</script>';
        }
?>