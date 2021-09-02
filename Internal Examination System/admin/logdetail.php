<?php
//session_start();
	
//$s = $_SESSION["user"];
include '../admin/connection.php';
$qry = "select f_name from faculty where f_code='$s' or f_name='$s' or f_mobile='$s' or f_mail='$s';";
$result = mysqli_query($con,$qry);
while($row=mysqli_fetch_assoc($result))
{   
?> <ul class="navbar-nav my-lg-0">
 <li class="nav-item dropdown">
     <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         <img src="../assets/images/users/2.jpg" alt="user" class="profile-pic m-r-5" /><?php echo $row['f_name'];?>
         <a href="../admin/logout.php"><button class="btn btn-danger">Logout</button></a>
     </a>
 </li>
</ul>
<?php } ?>

