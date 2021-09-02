<?php

include '../connection.php';

if (isset($_POST['room_id'])) {
	$id=$_POST['room_id'];
	//select * from semester where course_id='$id' order by sem_code;
	$sql="select * from block_arrangement  where r_id='$id' group by b_arr_no order by b_arr_no;";
	
	$query=mysqli_query($con,$sql);
    echo "<option value='' selected disabled>Select Block</option>";
	while ($row=mysqli_fetch_assoc($query)) {
        $id=$row['b_arr_no'];
		$code=$row['b_arr_no'];
         if($code != 0)
         {
		      echo "<option value='$id'>$code</option>";
         }
	}
}
?>