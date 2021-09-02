<?php
	$con = mysqli_connect('localhost','root','','sport');
	
	$team1id = $_POST['datapost'];
	$q = "select r_team1 from result where s_id='".$id."'";
	$r = mysqli_query($con,$q);
	$row = mysqli_fetch_assoc($r);
?>
<input type="text" name="t1" class="form-control" value="<?php echo $row['r_team1'];?>">