<?php
	session_start();
	$u = $_POST['info'];
	$p = $_POST['pass'];
	
	if(isset($_POST['submit']))
	{
		
        include 'include/connection.php';
        
        $qry = "select * from member where m_mail='$u' OR m_mob='$u';";
		$result = mysqli_query($con,$qry);
		$num = mysqli_num_rows($result);
	
		if($num)
		{
			  $qry1 = "select * from member where (m_mail='$u' And m_pass='$p') OR (m_mob='$u' And m_pass='$p');";
		      $result1 = mysqli_query($con,$qry1);
			  $num1 = mysqli_num_rows($result1);
			  while($row=mysqli_fetch_assoc($result1)){
				  $username=$row['m_name'];
				  $id=$row['m_id'];
			  }
            
              if($num1 > 0)
		      {
	               $data = mysqli_fetch_assoc($result);
				   $_SESSION["user"]=$username;
				   $_SESSION["id"]=$id;
            
                 
                        echo '<script>alert("Welcome To Shop Serenity System.")</script>';
			            echo '<script>window.location="/sem 6/member-old/index.php"</script>';
                        //header("location:../admin/main.php");
                
		      }
		      else
		      {
			        echo '<script>alert("Invalid Password.")</script>';
                    echo '<script>window.location="/sem 6/user/log_shop/indexshop.php"</script>';
                    //header("location:../admin/index.php");
		      }
        }
        else
        {
            echo '<script>alert("Invalid Username.")</script>';
            echo '<script>window.location="/sem 6/user/log_shop/indexshop.php"</script>';
            //header("location:../admin/index.php");
        }
	}
	else
	{
		echo "problem";
        echo '<script>window.location="/sem 6/user/log_shop/indexshop.php"</script>';
        //header("location:../admin/index.php");
	}
?>