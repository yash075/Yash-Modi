<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['cvmsaid']==0)) {
  header('location:logout.php');
  } else{
$e_id=$_SESSION['cvmsaid'];
$s_v_id=$_GET['id'];
$check=mysqli_query($con,"select e_in from visit_record where sch_v_id='$s_v_id';");
$row=mysqli_fetch_assoc($check);
//die($row['e_in']);
$in=$row['e_in'];
if(isset($in)){
date_default_timezone_set("Asia/Kolkata");
$out=date("h:i:sa");
$query=mysqli_query($con,"UPDATE `visit_record` SET `e_out`='$out' where sch_v_id='$s_v_id';");

if ($query) {
    echo "<script>alert('visitor checked out.')</script>";
    echo "<script>window.location='manage-visit.php'</script>";
}
else
{
    echo "<script>alert('something went wrong.')</script>";
    echo "<script>window.location='manage-visit.php'</script>";
}
}else{
    echo "<script>alert('not yet checked in.')</script>";
    echo "<script>window.location='manage-visit.php'</script>";
}

?>
  <?php }  ?>