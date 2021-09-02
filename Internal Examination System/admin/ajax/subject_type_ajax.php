<?php

include '../connection.php';

if (isset($_POST['subject_id'])) {
	$id=$_POST['subject_id'];
	
	$query=mysqli_query($con,"select * from subject where sub_id='$id' order by sub_type;");
    $eee = mysqli_fetch_assoc($query);
    $code = $eee['sub_code'];
    $name = $eee['sub_name'];
    
    $qry = "select * from subject where sub_code='$code' AND sub_name='$name';";
    $result=mysqli_query($con,$qry);
    
    echo "<option value='' selected disabled>select subject type</option>";
    while ($row=mysqli_fetch_assoc($result)) {
        $id=$row['sub_id'];
        $type=$row['sub_type'];
        echo "<option value='$id'>$type</option>";
    }
        
}
?>