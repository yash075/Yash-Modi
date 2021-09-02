<?php
	session_start();
	$u = $_POST['info'];
	$p = $_POST['pass'];
	
	if(isset($_POST['submit']))
	{
		
        include 'connection.php';
        
        $qry = "select * from customer where cust_mob='$u' OR cust_mail='$u';";
		$result = mysqli_query($con,$qry);
		$num = mysqli_num_rows($result);
	     //die($num);
		if($num>0)
		{
			  $qry1 = "select * from customer where (cust_mob='$u' AND cust_pass='$p') OR (cust_mail='$u' And cust_pass='$p');";
		      $result1 = mysqli_query($con,$qry1);
			  $num1 = mysqli_num_rows($result1);
			  while($row=mysqli_fetch_assoc($result1)){
				  $username=$row['cust_name'];
				  $id=$row['cust_id'];
			  }
            //die();
              if($num1 > 0)
		      {
				   $_SESSION["user"]=$username;
				   $_SESSION["id"]=$id;
            
                 
						echo '<script>alert("Welcome To Shop Serenity.")</script>';
			            echo '<script>window.location="../home.php?set=true"</script>';
                        //header("location:../admin/main.php");
                
		      }
		      else
		      {
			        echo '<script>alert("Invalid Password.")</script>';
                    echo '<script>window.location="/sem 6/user/log_shop/indexuser.php"</script>';
                    //header("location:../admin/index.php");
		      }
        }
        else
        {
            echo '<script>alert("Invalid Mobile no. Or Mail id.")</script>';
            echo '<script>window.location="/sem 6/user/log_shop/indexuser.php"</script>';
            //header("location:../admin/index.php");
        }
	}
	else
	{
        echo '<script>alert("Field Undefined..")</script>';
        echo '<script>window.location="/sem 6/user/log_shop/indexuser.php"</script>';
        //header("location:../admin/index.php");
	}
?>