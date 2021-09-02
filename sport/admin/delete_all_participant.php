<?php
	$con = mysqli_connect('localhost','root','','sport');
	
	$s = "delete * from participant";
	$r = mysqli_query($con,$s);
	
	if($r)
	{
		echo "<script>alert('All Record Are Deleted.')</script>";
		echo "<script>window.location='participant.php'</script>";
	}
	else
	{
		echo "<script>window.location='participant.php'</script>";
	}
?>