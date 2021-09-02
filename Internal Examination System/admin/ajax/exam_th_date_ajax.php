<?php

include '../connection.php';

if (isset($_POST['sem_id'])) {
	$id=$_POST['sem_id'];
	$query=mysqli_query($con,"select * from exam_schedule_theory inner join subject on subject.sub_id=exam_schedule_theory.sub_id where subject.sem_id='$id' group by date(date) order by date(date) ");
    echo "<option value='' selected disabled>select date</option>";
	while ($row=mysqli_fetch_assoc($query))
    {
        $sid=$row['exam_sch_th_id'];
		$date=date('d-m-Y',$row['date']);
        echo "<option value='$sid'>$date</option>";
	}
}
?>  