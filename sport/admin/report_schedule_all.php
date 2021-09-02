
<?php 

	
	$con = mysqli_connect('localhost','root','','sport');
	
?>
<?php 
	session_start();
	
	$s = $_SESSION["user"];
	
	if($s == TRUE)
	{
?>

	<html>
	<body>
		<table border="1px">
			<tr>
				<td>No.</td>
				<td>Game Name</td>
				<td>Team 1 Name</td>
				<td>Team 2 Name</td>
				<td>Date</td>
				<td>Time</td>
				<td>Status</td>
			</tr>
				<?php 
					$sql = "SELECT game.gname,schedule.team1,schedule.team2,schedule.s_date,schedule.s_time,schedule.s_status from game,schedule where game.game_id=schedule.game_id ";
					$res = mysqli_query($con,$sql);
					$t = 0;
				?>
				<?php 
					while($row = mysqli_fetch_assoc($res))
					{
				?>
			<tr>
				<td><?php echo $t = $t+1;?></td>
				<td><?php echo $row['gname'];?></td>
				<?php 
					$sql1 = "select * from team where team_id='".$row['team1']."'";
					$res1 = mysqli_query($con,$sql1);
					$row1 = mysqli_fetch_assoc($res1);
				?>
				<td><?php echo $row1['team_name'];?></td>
				<?php 
					$sql2 = "select * from team where team_id='".$row['team2']."'";
					$res2 = mysqli_query($con,$sql2);
					$row2 = mysqli_fetch_assoc($res2);
				?>
				<td><?php echo $row2['team_name'];?></td>
				<td><?php echo $row['s_date'];?></td>
				<td><?php echo $row['s_time'];?></td>
				<td><?php echo $row['s_status'];?></td>
			</tr>
					<?php } ?>
		</table>
		<br><br>
	<a href="excel/schedule_all_excel.php"><button>Excel</button></a>
	</body>
</html>	
	<?php 
	}
	else
	{
		header('location:index.php');
	}
?>