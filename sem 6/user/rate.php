<?php 
if(isset($_REQUEST['set'])){
	session_start();
	
	$s = $_SESSION["user"];
  $id1=$_SESSION["id"];

  //die($id);
	//if($s == TRUE)
	//{

include "../user/include/connection.php";

$val = $_REQUEST['val'];
$sid = $_REQUEST['shop_id'];
$cid=$_REQUEST['cid'];
$date=date("y/m/d");
// Check entry within table
$query = "SELECT * FROM rate WHERE shop_id=$sid and cust_id=$id1";

$result = mysqli_query($con,$query);
$num=mysqli_num_rows($result);
//$fetchdata = mysqli_fetch_array($result);
//$count = $fetchdata['cntpost'];

//die($cid);
if($num < 1){
    $insertquery = "INSERT INTO `rate`(`r_id`, `shop_id`, `cust_id`, `rate`,`Date`) VALUES (NULL,'$sid','$id1','$val','$date')";

    /*$insertquery = "INSERT INTO post_rating(userid,postid,rating) values(".$userid.",".$postid.",".$rating.")";*/
    mysqli_query($con,$insertquery);
}else {
    $updatequery = "UPDATE rate SET rate=" . $val . " where cust_id=" . $id1 . " and shop_id=" . $sid;
    mysqli_query($con,$updatequery);
}
echo "<script>alert('Rating added');</script>";
$visit=mysqli_query($con,"select visit from shop where shop_id='$sid'");
        $v=mysqli_fetch_array($visit);
        $n=$v['visit'];
        $n=$n-1;
        $visitupdate=mysqli_query($con,"update shop set visit='$n' where shop_id='$sid'");
    header("location:../user/shop-detail.php?set=true&sid=$sid&cid=$cid");
}else{
    echo "<script>alert('please login first ');</script>";
    echo '<script>window.location="../user/log_shop/indexuser.php"</script>';
}