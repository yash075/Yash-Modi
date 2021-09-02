<?php
session_start();
	
$s = $_SESSION["user"];
if($s == TRUE)
	{
include '../user/connection.php';
$qry = "select f_name,f_type from faculty where f_code='$s' or 
f_name='$s' or f_mobile='$s' or f_mail='$s';";
$result = mysqli_query($con,$qry);
while($row=mysqli_fetch_assoc($result))
{   
?> <?php echo "Hello !! ".$row['f_name'];
    $type=$row['f_type'];
?>
<?php } 
}
else
{
    header('location:../index.html');
}?>

