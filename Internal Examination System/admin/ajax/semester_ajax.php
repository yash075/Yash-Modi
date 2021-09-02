<?php

include '../connection.php';

if (isset($_POST['course_id'])) {
	$id=$_POST['course_id'];
	
	$query=mysqli_query($con,"select * from semester where course_id='$id' order by sem_code;");
    echo "<option value='' selected disabled>select semester</option>";
	while ($row=mysqli_fetch_assoc($query)) {
        $id=$row['sem_id'];
		$code=substr($row['sem_code'],2);
         if($code != 0)
         {
		      echo "<option value='$id'>$code</option>";
         }
	}
}
?>