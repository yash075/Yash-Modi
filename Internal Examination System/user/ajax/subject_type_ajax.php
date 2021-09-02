<?php

include '../connection.php';

if (isset($_POST['subject_id'])) {
	$id=$_POST['subject_id'];
	
	$query=mysqli_query($con,"select * from subject where sub_id='$id' order by sub_type;");
    echo "<option value='' selected disabled>select subject type</option>";
	while ($row=mysqli_fetch_assoc($query)) {
        $id=$row['sub_id'];
		$type=$row['sub_type'];
		      echo "<option value='$id'>$type</option>";
	}
}
?>