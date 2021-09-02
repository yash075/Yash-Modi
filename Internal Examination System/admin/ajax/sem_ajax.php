<?php

include '../connection.php';

if (isset($_POST['course_id'])) {
	$id=$_POST['course_id'];
	
	$query=mysqli_query($con,"select semester.sem_id,semester.sem_code from exam_schedule_theory inner join subject on subject.sub_id=exam_schedule_theory.sub_id inner join semester on semester.sem_id=subject.sem_id where semester.course_id='$id' group by semester.sem_code order by semester.sem_code;");
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