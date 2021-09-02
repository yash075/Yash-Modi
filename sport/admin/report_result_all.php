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
				<td>Team 1 Score</td>
				<td>Team 2 Score</td>
				<td>Winner Team Name</td>
			</tr>
				<?php 
					$sql = "SELECT game.gname,schedule.team1,schedule.team2,schedule.s_date,schedule.s_time,schedule.s_status,result.r_team1,result.r_team2,result.win_team_id from game,schedule,result where game.game_id=schedule.game_id and schedule.s_id=result.s_id order by gname";
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
					while($row1 = mysqli_fetch_assoc($res1))
					{
				?>
				<td><?php echo $row1['team_name'];?></td>
					<?php } ?>
				<?php 
					$sql2 = "select * from team where team_id='".$row['team2']."'";
					$res2 = mysqli_query($con,$sql2);
					while($row2 = mysqli_fetch_assoc($res2))
					{
				?>
				<td><?php echo $row2['team_name'];?></td>
					<?php } ?>
				<td><?php echo $row['s_date'];?></td>
				<td><?php echo $row['s_time'];?></td>
				<td><?php echo $row['s_status'];?></td>
				<td><?php echo $row['r_team1'];?></td>
				<td><?php echo $row['r_team2'];?></td>
				<?php 
					$sql3 = "select * from team where team_id='".$row['win_team_id']."'";
					$res3 = mysqli_query($con,$sql3);
					while($row3 = mysqli_fetch_assoc($res3))
					{
				?>
				<td><?php echo $row3['team_name'];?></td>
					<?php } ?>
			</tr>
					<?php } ?>
		</table>
		<br><br>
		<a href="excel/result_all_excel.php"><button>Excel</button></a>
	</body>
</html>	
<?php 
	}
	else
	{
		header('location:index.php');
	}
?>
	