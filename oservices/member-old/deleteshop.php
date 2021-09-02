<?php 
	session_start();
	
	$s = $_SESSION["user"];
  $id1=$_SESSION["id"];
  //die($id);
	if($s == TRUE)
	{
        $d = $_GET['id'];
        
		include 'include/connection.php';
        
        $query = "delete from shop where shop_id ='$d'; ";
        $result = mysqli_query($con,$query);
            
        if($result)
        {
            echo "<script>alert('shop Deleted.')</script>";
            echo "<script>window.location='displayshop.php'</script>";
        }
        else
        {            
            echo "<script>alert('Something went wrong.')</script>";     
            die('query error:'.mysqli_errno($con).'error is:'.mysqli_errno($con));
        }	
	}
	else
	{
		header('location:logoutval.php');
	}
?>