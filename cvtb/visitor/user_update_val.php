<?php
	session_start();
	
	$s = $_SESSION["cvmsaid"];
		if(isset($_POST['submit']))
        {
            //$id = $_GET['id'];
           
$mobnumber=$_POST['mobile'];
$email=$_POST['mail'];
$add=$_POST['adress'];
$desc=$_POST['desc'];
            
            include 'includes/dbconnection.php';
            
            $qry = "select * from visitor_log_detail where v_id='$s';";
            $result = mysqli_query($con,$qry);
            $row = mysqli_num_rows($result);
            //die($add.$desc);
             if($row>0){
                  //img
                if(isset($_FILES['img'])){
                    $size=$_FILES['img']['size'];
                    if($size<=1){
                        //$pathimg="0";
                        $q1=mysqli_query($con,"UPDATE `visitor_log_detail` SET `email`='$email',`mob`='$mobnumber',`address`='$add',`description`='desc'  WHERE v_id='$s'");
                    }else{
                         //image
     $img=$_FILES['img']['name'];
     $locimg = $_FILES['img']['tmp_name'];
     $folder="uploads/image/";
     $movei="C:/xampp/htdocs/cvtb/admin/uploads/image/".$img;
     $servepathimg=$locimg;
     $pathimg=$folder.$img;
     //die($movei." ".$pathimg);
                        move_uploaded_file($servepathimg,$movei);
                        $q1=mysqli_query($con,"UPDATE `visitor_log_detail` SET `email`='$email',`mob`='$mobnumber',`address`='$add',`description`='desc',`img`='$pathimg'  WHERE v_id='$s'");
                    }
                }
                //file
                if(isset($_FILES['file'])){
                    $size=$_FILES['file']['size'];
                    if($size<=1){
                        $q1=mysqli_query($con,"UPDATE `visitor_log_detail` SET `email`='$email',`mob`='$mobnumber',`address`='$add',`description`='desc'  WHERE v_id='$s'");
                    }else{
                            //file
    $file=$_FILES['file']['name'];
    $locfile= $_FILES['file']['tmp_name'];
    $folder="uploads/file/";
    $movef="C:/xampp/htdocs/cvtb/admin/uploads/file/".$file;
    $servepathfile=$locfile;
    $pathfile=$folder.$file;
                        move_uploaded_file($servepathfile,$movef);
                        $q1=mysqli_query($con,"UPDATE `visitor_log_detail` SET `email`='$email',`mob`='$mobnumber',`address`='$add',`description`='desc' ,`info`='$pathfile' WHERE v_id='$s'");
                    }
                 }
                 $q1=mysqli_query($con,"UPDATE `visitor_log_detail` SET `email`='$email',`mob`='$mobnumber',`address`='$add',`description`='$desc' WHERE v_id='$s'");
            if($q1){
                echo "<script>alert('updated.')</script>"; 
                //die();
                echo '<script>window.location="user.php"</script>';  
            }else{
                echo "<script>alert('error')</script>";
                echo '<script>window.location="user.php"</script>';
            }
          
        }
        else
        {
             echo "<script>alert('Something went wrong in updating user in Faculty Table.')</script>";
             echo '<script>window.location="user.php"</script>';
        }
    }

?>