<?php
	if(isset($_POST['submit']))
    {
        include 'include/connection.php';
        
        
		$add = $_POST['address'];
        $lat = $_POST['lat'];
        $lng = $_POST['lng'];
        $city = $_POST['city'];
        $m_id = $_POST['m_id'];
        $s_name=$_POST['s_name'];
        $subcat_id=$_POST['subcat_id'];
        $m_no= $_POST['m_no'];
        $mail= $_POST['mail'];
        $desc = $_POST['desc'];
        
       
		
		include 'include/connection.php';
        
         $qry = "select * from member where m_id='$m_id';";
            $result = mysqli_query($con,$qry);
            $roww = mysqli_fetch_assoc($result);
            $s = $roww['m_name']; 
        
         //image1
            $img1=$s.$_FILES['img1']['name'];
            $locimg1 = $_FILES['img1']['tmp_name'];
            $folder1="../admin/uploads/";
            $servepathimg1=$locimg1;
            $pathimg1=$folder1.$img1;
           //image2
          $img2=$s.$_FILES['img2']['name'];
          $locimg2 = $_FILES['img2']['tmp_name'];
           $folder2="../admin/uploads/";
          $servepathimg2=$locimg2;
          $pathimg2=$folder2.$img2;
		//die($name);
            
		
	
            $qry = "select shop.*,member.* from shop inner join member on member.m_id=shop.m_id where shop.name='$s_name' And member.m_id='$m_id' And shop.s_c_id='$subcat_id' ;";
            $result = mysqli_query($con,$qry);
            $row = mysqli_num_rows($result);
            if($row>0)
            {
                //echo "duplicate";
                echo "<script>alert('Shop Already exist.')</script>";
                echo '<script>window.location="displayshop.php"</script>';
            }
            else
            {
                //echo "Add";
                //img1
                if(isset($_FILES['img1'])){
                    $size=$_FILES['img1']['size'];
                    if($size<=1){
                        $pathimg1="0";
                    }else{
                        move_uploaded_file($servepathimg1,$pathimg1);
                    }
                }
                //img2
                if(isset($_FILES['img2'])){
                    $size=$_FILES['img2']['size'];
                    if($size<=1){
                        $pathimg2="0";
                    }else{
                        move_uploaded_file($servepathimg2,$pathimg2);
                    }
                }
               // move_uploaded_file($servepathimg1,$pathimg1);
                //move_uploaded_file($servepathimg2,$pathimg2);
                   
                   
               
                    
                    $qry1 = "insert into shop(`shop_id`, `s_c_id`, `name`, `address`, `image`, `img1`, `m_id`, `city`, `shop_mob`, `shop_mail`, `latitude`, `longitude`, `description`) values (NULL,'$subcat_id','$s_name','$add','$pathimg1','$pathimg2','$m_id','$city','$m_no','$mail','$lat','$lng','$desc')";
                    $result1 = mysqli_query($con,$qry1);
                   
                    //echo $subcat_id.' , '.$s_name.' , '.$add.' , '.$pathimg1.' , '.$pathimg2.' , '.$m_id.' , '.$city.' , '.$m_no.' , '.$mail.' , '.$lat.' , '.$lng.' , '.$desc;
                    if($result1)
                    {
                        echo "<script>alert('Shop Added Succesfully.')</script>";
                       // echo '<script>window.location="displayshop.php"</script>';
                    }
                    else
                    {
                        echo "<script>alert('something went wrong while adding shop please check it.')</script>";
                        //echo $_POST['subcat_id'];
                        die('query error:'.mysqli_errno($con).'error is:'.mysqli_errno($con));
                        echo '<script>window.location="addshop.php"</script>';
                    }
               
            }
        }
        else
        {
            echo "<script>alert('Something went Wrong.')</script>";
            echo '<script>window.location="addshop.php"</script>';
        }
?>