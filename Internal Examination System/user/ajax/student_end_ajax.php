<?php

include '../connection.php';

if (isset($_POST['stud_id'])) {
	$id=$_POST['stud_id'];
    
    $query=mysqli_query($con,"select * from student where stud_id='$id';");
    $row=mysqli_fetch_assoc($query);
    $sem_id = $row['sem_id'];
    $code = $row['stud_code'];
    
	$query=mysqli_query($con,"select * from student where sem_id='$sem_id' AND stud_code>'$code' AND stud_status=1 AND stud_id NOT IN (select stud_id from assign_student_in_batch) order by stud_code;");
    echo "<option value='' selected disabled>select subject</option>";
	while ($row=mysqli_fetch_assoc($query)) {
        $id=$row['stud_id'];
		$code=$row['stud_code'];
        $name=$row['stud_name'];
		      echo "<option value='$id'>$code - $name</option>";
	}
}
?>