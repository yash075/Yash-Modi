<?php

include '../connection.php';

if (isset($_POST['semester_id'])) {
	$id=$_POST['semester_id'];
	
	$query=mysqli_query($con,"select * from subject where sem_id='$id' group by sub_code order by sub_code;");
    echo "<option value='' selected disabled>select subject</option>";
	while ($row=mysqli_fetch_assoc($query)) {
        $id=$row['sub_id'];
		$code=$row['sub_code'];
        $name=$row['sub_name'];
		      echo "<option value='$id'>$code - $name</option>";
	}
}
?>