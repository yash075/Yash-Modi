<?php

include '../connection.php';

if (isset($_POST['block_id'])) {
	$id=$_POST['block_id'];
	$rid=$_POST['room_id'];
	
	$query=mysqli_query($con,"select block_arrangement.*,exam_schedule_theory.*,subject.* from block_arrangement inner join exam_schedule_theory on
	exam_schedule_theory.exam_sch_th_id=block_arrangement.exam_sch_th_id join subject 
	on subject.sub_id=exam_schedule_theory.sub_id where b_arr_no='$id' And r_id='$rid'  group by sub_code order by sub_code;");
    echo "<option value='' selected disabled>select subject</option>";
	while ($row=mysqli_fetch_assoc($query)) {
        $id=$row['sub_id'];
		$code=$row['sub_code'];
        $name=$row['sub_name'];
		      echo "<option value='$id'>$code - $name</option>";
	}
}
?>