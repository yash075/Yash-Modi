<?php

include '../connection.php';

if (isset($_POST['exam_id'])) {
	$eid=$_POST['exam_id'];
    
	$query=mysqli_query($con,"select * from student where sem_id IN (select subject.sem_id from block_arrangement inner join exam_schedule_theory on exam_schedule_theory.exam_sch_th_id=block_arrangement.exam_sch_th_id inner join subject on subject.sub_id=exam_schedule_theory.sub_id  where block_arrangement.b_arr_id='$eid') AND stud_status=1 AND stud_id NOT IN (select stud_id from assign_block where b_arr_id='$eid') order by stud_code;");
    echo "<option value='' selected disabled>select Student</option>";
	while ($row=mysqli_fetch_assoc($query)) {
        $id=$row['stud_id'];
		$code=$row['stud_code'];
        $name=$row['stud_name'];
		      echo "<option value='$id'>$code - $name</option>";
	}
}
?>