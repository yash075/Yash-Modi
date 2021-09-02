<?php

include '../connection.php';

if (isset($_POST['course_id'])) {
	$id=$_POST['course_id'];
	
	$query=mysqli_query($con,"select * from semester where course_id='$id' AND sem_id NOT IN (select subject.sem_id from exam_schedule_practical inner join subject on subject.sub_id=exam_schedule_practical.sub_id join exam_generation on exam_generation.exam_id=exam_schedule_practical.exam_id where exam_generation.status=0 group by sem_id) order by sem_code;");
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