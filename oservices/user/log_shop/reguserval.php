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
                setcookie('namec', $name, time() + (180));
                setcookie('mailc', $mail, time() + (180));
                setcookie('mobc', $mobile, time() + (180));
				header("location:reguser.php");
            }
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
                $qry1 = "insert into customer(`cust_id`,`cust_name`,`cust_mail`,`cust_mob`,`cust_pass`) values (NULL,'$name','$mail','$mobile','$pass')";
                $result1 = mysqli_query($con,$qry1);
                
                if($result1 )
                {
                    $selectcust=mysqli_query($con,"select * from customer where cust_mob='$mobile'");
                    $res=mysqli_fetch_assoc($selectcust);
                    $custid=$res['cust_id'];
                    $q=mysqli_query($con,"insert into wishlist values (NULL,'$custid')");
                    echo "<script>alert('Account Created.')</script>";
                    echo '<script>window.location="indexuser.php"</script>';
                }
                else
                {
                    echo "<script>alert('something went wrong.')</script>";
                    /*echo $desc;*/
                   die('query error:'.mysqli_errno($con).'error is:'.mysqli_errno($con));
                    echo '<script>window.location="reguser.php"</script>';
                }
            }
        }
        else
        {
            echo "<script>alert('Something went Wrong plz check.')</script>";
            die('query error:'.mysqli_errno($con).'error is:'.mysqli_errno($con));
            echo '<script>window.location="reguser.php"</script>';
        }
?>