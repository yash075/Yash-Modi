<?php

include '../connection.php';

if (isset($_POST['semester_id'])) {
	$id=$_POST['semester_id'];
	$s=$_POST['sid'];
	$st=$_POST['sub_type'];
	$sql="select faculty_permission.*,faculty.*,subject.*,
	batch.*,semester.*,course.* from faculty_permission inner join faculty on 
	faculty.f_id=faculty_permission.f_id join subject on subject.sub_id=faculty_permission.sub_id inner join 
	semester on semester.sem_id=subject.sem_id join batch on batch.batch_id=faculty_permission.batch_id inner join 
	course on course.course_id=semester.course_id where faculty.f_code='$s' And semester.sem_id='$id' And subject.sub_type='$st'
	 order by faculty.f_code,subject.sub_code,batch.batch_name;";
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