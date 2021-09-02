<?php

include 'dbconnection.php';

if (isset($_POST['department_id'])) {
	$id=$_POST['department_id'];
	
	$query=mysqli_query($con,"select * from employee where d_id='$id';");
    echo "<option value='' selected disabled>--Select Employee--</option>";
	while ($row=mysqli_fetch_assoc($query)) {
        $eid=$row['e_id'];
        $name=$row['e_name'];
		$post=$row['post'];
		      echo "<option value='$eid'>$name - $post</option>";
	}
}
?>