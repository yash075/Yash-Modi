<?php 
	session_start();
	
	$s = $_SESSION["user"];
  $id1=$_SESSION["id"];
  //die($id);
	if($s == TRUE)
	{
        include 'include/connection.php';
        if(isset($_POST['del']))
        {
            $checkbox = $_POST['check'];
            
            for($i=0;$i<count($checkbox);$i++)
            {
                $del_id = $checkbox[$i]; 
                mysqli_query($con,"delete from shop where shop_id='$del_id'");
            }
            echo "<script>alert('Shop Deleted.')</script>";
            echo "<script>window.location='displayshop.php'</script>";
        }
	}
	else
	{
		header('location:logoutval.php');
	}
?>