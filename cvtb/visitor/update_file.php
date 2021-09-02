<?php
session_start();
	
$s = $_SESSION["username"];
include "connection.php";
if(isset($_POST['submit']))
{    
     
 $file = $_FILES['file']['name'];
    $file_loc = $_FILES['file']['tmp_name'];
 $file_size = $_FILES['file']['size'];
 $file_type = $_FILES['file']['type'];
 $error= $_FILES['file']['error'];
 $folder="cvms/visitor/uploads/";
 $servepath=$file_loc.$file;
 $path=$folder.$file;
if(!move_uploaded_file($servepath,$path)){
// echo "hello";
 echo $path;
 $sql="update visitor_log_detail set img='$path' where username='shiv';";
 mysqli_query($con,$sql); 
}else{
    die ($error."hi");
}
}
?>