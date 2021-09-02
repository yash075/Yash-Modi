<?php
	$con = mysqli_connect('localhost','root','','sport');
	
	$id = $_POST['datapost'];
	$q = "select team1,team2 from schedule where s_id='".$id."'";
	$r = mysqli_query($con,$q);
	
	while($row1 = mysqli_fetch_assoc($r))
	{
?>
<option selected disabled>Select Team Name</option> 
<?php 
	$q1 = "select * from team where team_id='".$row1['team1']."'";
	$r1 = mysqli_query($con,$q1);
	$ro1 = mysqli_fetch_assoc($r1);
?>
<option value="<?php echo $row1['team1'];?>"><?php echo $ro1['team_name'];?></option>
<?php 
	$q2 = "select * from team where team_id='".$row1['team2']."'";
	$r2 = mysqli_query($con,$q2);
	$ro2 = mysqli_fetch_assoc($r2);
?>
<option value="<?php echo $row1['team2'];?>"><?php echo $ro2['team_name'];?></option>
<?php 
	}
?>
