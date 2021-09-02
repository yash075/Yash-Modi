<?php

include '../connection.php';

if (isset($_POST['course_id'])) {
    $id=$_POST['course_id'];
    $s=$_POST['sid'];
    $sql="select faculty_permission.fac_per_id,faculty.f_code,faculty.f_name,subject.sub_code,subject.sub_name,subject.sub_type,
    batch.batch_name,semester.*,course.* from faculty_permission inner join faculty on 
    faculty.f_id=faculty_permission.f_id join subject on subject.sub_id=faculty_permission.sub_id inner join 
    semester on semester.sem_id=subject.sem_id join batch on batch.batch_id=faculty_permission.batch_id inner join 
    course on course.course_id=semester.course_id where faculty.f_code='$s' AND  course.course_id='$id' group by semester.sem_code
     order by faculty.f_code,subject.sub_code,batch.batch_name;";
	$sql1="select * from semester where course_id=$id";
	$query=mysqli_query($con,$sql);
    echo "<option value='' selected disabled>select semester</option>";
    //echo "<option value='' disabled>".mysqli_num_rows($query)."</option>";
	while ($row=mysqli_fetch_array($query)) {
        $id=$row['sem_id'];
		$code=substr($row['sem_code'],2);
         if($code != 0)
         {
		      echo "<option value='$id'>$code</option>";
         }
	}
}
?>