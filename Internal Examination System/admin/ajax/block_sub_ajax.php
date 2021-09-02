<?php

include '../connection.php';

if (isset($_POST['room_id'])) {
	$id=$_POST['room_id'];
	
	$query=mysqli_query($con,"select block_arrangement.b_arr_id,block_arrangement.b_arr_no,subject.sub_code,subject.sub_name from block_arrangement inner join exam_schedule_theory on exam_schedule_theory.exam_sch_th_id=block_arrangement.exam_sch_th_id inner join subject on subject.sub_id=exam_schedule_theory.sub_id where r_id='$id' order by exam_schedule_theory.date, subject.sub_code,block_arrangement.b_arr_no;");
    echo "<option value='' selected disabled>select subject</option>";
	while ($row=mysqli_fetch_assoc($query)) {
        $id=$row['b_arr_id'];
        $bname=$row['b_arr_no'];
		$code=$row['sub_code'];
        $name=$row['sub_name'];
		      echo "<option value='$id'>$bname - $code - $name</option>";
	}
}
?>