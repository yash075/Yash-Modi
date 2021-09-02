<?php
	$con = mysqli_connect('localhost','root','','sport');
	
	//$id = $_POST['datapost'];
	$q = "select * from result where r_id='2'";
	$r = mysqli_query($con,$q);
	$row = mysqli_fetch_assoc($r);
	$t = $row['s_id'];
	//echo $t;
	
?>