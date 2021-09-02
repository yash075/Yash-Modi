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
				<td>Team Name</td>
				<td>Men Of The Match</td>
				<td>Men Of The Series</td>
				
			</tr>
				<?php 
					$sql = "select winner.game_id,winner.team_id,winner.man_series,winner.man_match,result.r_id from winner,result where winner.r_id=result.r_id";
					$res = mysqli_query($con,$sql);
						
					$t = 0;
						
					
				?>
				<?php 
					while($row = mysqli_fetch_assoc($res))
					{
				?>
				
			<tr>
				<td><?php echo $t = $t+1;?></td>
				<?php 
					$sql1 = "select * from game where game_id='".$row['game_id']."'";
					$res1 = mysqli_query($con,$sql1);
					while($row1 = mysqli_fetch_assoc($res1))
					{
				?>
				<td><?php echo $row1['gname'];?></td>
					<?php } ?>
				<?php 
					$sql2 = "select * from  team where team_id='".$row['team_id']."'";
					$res2 = mysqli_query($con,$sql2);
					while($row2 = mysqli_fetch_assoc($res2))
					{
				?>
				<td><?php echo $row2['team_name'];?></td>
					<?php } ?>
				<td><?php echo $row['man_match'];?></td>
				<td><?php echo $row['man_series'];?></td>
			</tr>
					<?php } ?>
		</table><br><br>
		<a href="excel/winner_all_excel.php"><button>Excel</button></a>
	</body>
</html>	
		<?php 
	}
	else
	{
		header('location:index.php');
	}
?>
	