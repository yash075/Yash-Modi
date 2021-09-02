<?php

include '../connection.php';
if (isset($_POST['sem_id'])) {
	$id=$_POST['sem_id'];
	
	$query=mysqli_query($con,"select exam_sch_th_id,time from exam_schedule_theory inner join subject on subject.sub_id=exam_schedule_theory.sub_id where exam_sch_th_id in (select exam_sch_th_id from block_arrangement ) AND subject.sem_id='$id'  group by time order by time;");
    
    echo "<option value='' selected disabled>select Time</option>";
	while ($row=mysqli_fetch_assoc($query)) {
        $id=$row['exam_sch_th_id'];
		$time=$row['time'];
		      echo "<option value='$id'>$time</option>";
	}
}
?>