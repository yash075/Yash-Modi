<?php
    session_start();
    $cvmsaid=$_SESSION['cvmsaid'];
    include('includes/dbconnection.php'); 
    $desc=$_POST['description'];
    $id=$_GET['id'];
    //image
     $img=$_FILES['fileimg']['name'];
     $locimg = $_FILES['fileimg']['tmp_name'];
     $folder="uploads/image/";
     $servepathimg=$locimg;
     $pathimg=$folder.$img;
    //file
    $file=$_FILES['filerem']['name'];
    $locfile= $_FILES['filerem']['tmp_name'];
    $folder="uploads/file/";
    $servepathfile=$locfile;
    $pathfile=$folder.$file;
    if(isset($_POST['submit']))
    { 
       // echo $servepath;
        move_uploaded_file($servepathimg,$pathimg);
        move_uploaded_file($servepathfile,$pathfile);
        $sql="update visitor_log_detail set description='$desc',info='$pathfile',img='$pathimg' where v_id='$id';";
        mysqli_query($con,$sql); 
       // echo "<script>alert('vsitor added successfully')</script>";
        header("location:sch-visitor.php?addid=$id");
    }
?>