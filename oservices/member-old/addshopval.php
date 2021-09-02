<?php
    session_start();
	
    $s = $_SESSION["user"];
    $id1=$_SESSION["id"];
	if($s == TRUE)
	{
        if(isset($_POST['submit']))
        {
            $name = $_POST['name'];
            $subcat=$_POST['subcat_id'];
            //image1
            $img1=$s.$_FILES['img11']['name'];
            $locimg1 = $_FILES['img11']['tmp_name'];
            $folder1="../admin/uploads/";
            $servepathimg1=$locimg1;
            $pathimg1=$folder1.$img1;
           //image2
          $img2=$s.$_FILES['img2']['name'];
          $locimg2 = $_FILES['img2']['tmp_name'];
           $folder2="../admin/uploads/";
          $servepathimg2=$locimg2;
          $pathimg2=$folder2.$img2;

		    $mobile = $_POST['mobile'];
            $mail = $_POST['mail'];
            $add = $_POST['add'];
            $loc = $_POST['loc'];
            $desc = $_POST['desc'];
            //echo $desc;
            include 'include/connection.php';
                        
            $qry = "select shop.*,member.* from shop inner join member on member.m_id=shop.m_id where shop.name='$name' And member.m_id='$id1' And shop.s_c_id='$subcat' ;";
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
                if(isset($_FILES['img11'])){
                    $size=$_FILES['img11']['size'];
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
                   
                   
                    $qry1 = "insert into shop(`shop_id`,`s_c_id`, `name`, `address`, `image`, `img1`, `m_id`, `shop_mob`, `shop_mail`,`description`) values (NULL,'$subcat','$name','$add','$pathimg1','$pathimg2','$id1','$mobile','$mail','$desc')";
                    $result1 = mysqli_query($con,$qry1);
                   
                    
                    if($result1 )
                    {
                        echo "<script>alert('Shop Added Succesfully.')</script>";
                        echo '<script>window.location="displayshop.php"</script>';
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
    }
    else
    {
        header('location:logoutval.php');
    }
?>