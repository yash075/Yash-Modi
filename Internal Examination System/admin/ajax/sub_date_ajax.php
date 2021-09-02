<?php

include '../connection.php';

if (isset($_POST['id'])) {
	$id=$_POST['id'];
	
	$query=mysqli_query($con,"select exam_schedule_theory.date from exam_schedule_theory where exam_schedule_theory.exam_sch_th_id='$id';");
	while ($row=mysqli_fetch_assoc($query)) {
        $date=date('d-m-Y',strtotime($row['date']));
		      echo "<option value='' >$date</option>";
	}
}
?>