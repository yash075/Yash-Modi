<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['cvmsaid']==0)) {
  header('location:logout.php');
  } else{
$e_id=$_SESSION['cvmsaid'];
$s_v_id=$_GET['id'];
$check=mysqli_query($con,"select status from visit_record where sch_v_id='$s_v_id';");
$row=mysqli_fetch_assoc($check);
$status=$row['status'];
if($status>0){
date_default_timezone_set("Asia/Kolkata");
$in=date("h:i:sa");
$query=mysqli_query($con,"UPDATE `visit_record` SET `e_in`='$in' where sch_v_id='$s_v_id';");

if ($query) {
    echo "<script>alert('visitor checked in.')</script>";
    echo "<script>window.location='manage-visit.php'</script>";
}
else
{
    echo "<script>alert('something went wrong.')</script>";
    echo "<script>window.location='manage-visit.php'</script>";
}
}else{
    echo "<script>alert('something went wrong.')</script>";
    echo "<script>window.location='manage-visit.php'</script>";
}

?>
  <?php }  ?>