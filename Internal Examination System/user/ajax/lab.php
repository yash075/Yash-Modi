<?php

include '../connection.php';

if (isset($_POST['lab_id'])) {
	$id=$_POST['lab_id'];
	$sql="select exam_schedule_practical.*,subject.* from exam_schedule_practical inner join  subject on subject.sub_id=exam_schedule_practical.sub_id
	where exam_schedule_practical.lab_no=$id;";
	$query=mysqli_query($con,$sql);
    echo "<option value='' selected disabled>select subject</option>";
	while ($row=mysqli_fetch_assoc($query)) {
        $id=$row['sub_id'];
		$code=$row['sub_code'];
        $name=$row['sub_name'];
		      echo "<option value='$id'>$code - $name</option>";
	}
}
?>