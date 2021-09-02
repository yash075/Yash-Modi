<?php
	if(isset($_POST['Update']))
    {
        include 'include/connection.php';
        
        $shop_id=$_GET['shop_id'];
		$add = $_POST['address'];
        $lat = $_POST['lat'];
        $lng = $_POST['lng'];
        $city = $_POST['city'];
        
        
       
		
		include 'include/connection.php';
        
        
                    
                    $qry1 = "UPDATE shop SET shop.address='$add', shop.latitude='$lat',shop.longitude='$lng',shop.city='$city' WHERE shop.shop_id='$shop_id'";
                    $result1 = mysqli_query($con,$qry1);
                   
                    //echo $subcat_id.' , '.$s_name.' , '.$add.' , '.$pathimg1.' , '.$pathimg2.' , '.$m_id.' , '.$city.' , '.$m_no.' , '.$mail.' , '.$lat.' , '.$lng.' , '.$desc;
                    if($result1)
                    {
                        echo "<script>alert('Shop map Update Succesfully.')</script>";
                        echo '<script>window.location="displayshop.php"</script>';
                    }
                    else
                    {
                        echo "<script>alert('something went wrong while adding shop please check it.')</script>";
                        //echo $_POST['subcat_id'];
                        die('query error:'.mysqli_errno($con).'error is:'.mysqli_errno($con));
                        echo '<script>window.location="displayshop.php"</script>';
                    }
               
          
        }
        else
        {
            echo "<script>alert('Something went Wrong.')</script>";
            echo '<script>window.location="addshop.php"</script>';
        }
?>