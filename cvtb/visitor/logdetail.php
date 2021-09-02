<?php
	include('includes/dbconnection.php');
$qry = "select name from `visitor_log_detail` where v_id='$s';";
$result = mysqli_query($con,$qry);
while($row=mysqli_fetch_assoc($result))
{    echo "Hello !! ".$row['name'];
}
?>