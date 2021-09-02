
<?php
	session_start();
	
	$s = $_SESSION["user"];;
	
	if($s)
	{
    
        
		 include 'include/connection.php';
        if(isset($_POST['del']))
        {
            if(isset($_POST['check'])){
            $checkbox = $_POST['check'];
            
            for($i=0;$i<count($checkbox);$i++)
            {
                $del_id = $checkbox[$i]; 
                mysqli_query($con,"delete from shop where shop_id ='$del_id'");
            }
           echo "<script>alert('shop Successfully Deleted.')</script>";
			echo "<script>window.location='displayshop.php'</script>";
            }
             else
	{
		header('location:displayshop.php');
	}
        }
        else
	{
		header('location:index.php');
	}
	
	}
	else
	{
		header('location:index.php');
	}
?>

