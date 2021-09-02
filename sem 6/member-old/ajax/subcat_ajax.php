<?php

include 'connection.php';

if (isset($_POST['category_id'])) {
	$id=$_POST['category_id'];
	
	$query=mysqli_query($con,"select * from sub_category where c_id='$id' order by s_c_name;");
    echo "<option value='' selected disabled>--Select Subcategory--</option>";
	while ($row=mysqli_fetch_assoc($query)) {
        $id=$row['s_c_id'];
		$name=$row['s_c_name'];
		      echo "<option value='$id'>$name</option>";
         
	}
}
?>