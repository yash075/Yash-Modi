<?php 
if(isset($_REQUEST['set'])){
	session_start();
	
	$s = $_SESSION["user"];
  $id1=$_SESSION["id"];

  //die($id);
	//if($s == TRUE)
	//{

include "../user/include/connection.php";

$sid = $_REQUEST['shop_id'];
$cid=$_REQUEST['cid'];

// Check entry within table
$query = "SELECT add_wish.*,wishlist.* FROM add_wish inner join wishlist on add_wish.w_id=wishlist.w_id 
WHERE add_wish.shop_id='$sid' and wishlist.cust_id='$id1'";

$result = mysqli_query($con,$query);
$a_w=mysqli_fetch_assoc($result);
$add=$a_w['a_w_id'];
$num=mysqli_num_rows($result);

$q=mysqli_query($con,"select w_id from wishlist where cust_id='$id1'");
$rea=mysqli_fetch_assoc($q);
$wish=$rea['w_id'];
//die($cid);
if($num < 1){
    $insertquery = "INSERT INTO `add_wish`(`a_w_id`, `w_id`, `shop_id`) VALUES (NULL,'$wish','$sid')";

    /*$insertquery = "INSERT INTO post_rating(userid,postid,rating) values(".$userid.",".$postid.",".$rating.")";*/
    mysqli_query($con,$insertquery);
}else {
    $deletequery = "DELETE FROM `add_wish` WHERE a_w_id='$add'";
    mysqli_query($con,$deletequery);
    echo "<script>alert('removed From Wishlist');</script>";
    if(isset($_REQUEST['wish'])){
    echo '<script>window.location="../user/wishlist.php?set=true"</script>';
    }else{
        //echo '<script>window.location="../user/viewshop.php?set=true"</script>';
        $visit=mysqli_query($con,"select visit from shop where shop_id='$sid'");
        $v=mysqli_fetch_array($visit);
        $n=$v['visit'];
        $n=$n-1;
        $visitupdate=mysqli_query($con,"update shop set visit='$n' where shop_id='$sid'");
        header("location:../user/shop-detail.php?set=true&sid=$sid&cid=$cid");
    }
}
echo "<script>alert('Added To Wishlist');</script>";
if(isset($_REQUEST['wish'])){
    echo '<script>window.location="../user/wishlist.php?set=true"</script>';
    }else{
        //echo '<script>window.location="../user/viewshop.php?set=true"</script>';
        $visit=mysqli_query($con,"select visit from shop where shop_id='$sid'");
        $v=mysqli_fetch_array($visit);
        $n=$v['visit'];
        $n=$n-1;
        $visitupdate=mysqli_query($con,"update shop set visit='$n' where shop_id='$sid'");
        header("location:../user/shop-detail.php?set=true&sid=$sid&cid=$cid");
    }
}else{
    echo "<script>alert('please login first ');</script>";
    echo '<script>window.location="../user/log_shop/indexuser.php"</script>';
}