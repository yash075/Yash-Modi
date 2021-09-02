<?php

include '../connection.php';

if (isset($_POST['semester_id'])) {
	$id=$_POST['semester_id'];
	
	$query=mysqli_query($con,"select exam_schedule_theory.exam_sch_th_id,subject.sub_code,subject.sub_name from exam_schedule_theory inner join subject on subject.sub_id=exam_schedule_theory.sub_id where subject.sem_id='$id' group by subject.sub_name order by subject.sub_code;");
    echo "<option value='' selected disabled>select subject</option>";
	while ($row=mysqli_fetch_assoc($query)) {
        $id=$row['exam_sch_th_id'];
		$code=$row['sub_code'];
        $name=$row['sub_name'];
		      echo "<option value='$id'>$code - $name</option>";
	}
}
?>