<?php 
	$con = mysqli_connect('localhost','root','','sport');
	$t = $_POST['sm'];
	$g = $_POST['gna'];
?>
<?php 
	session_start();
	
	$s = $_SESSION["user"];
	
	if($s == TRUE)
	{
?>
<?php 
	
	if(isset($_POST['submit']))
	{
		?>
<html>
	<body>
		<table border="1px">
			<tr>
				<td>Enrollment No.</td>
				<td>Name</td>
				<td>Birth Date</td>
				<td>Mobile No.</td>
				<td>Email Id</td>
				<td>Class</td>
				<td>Team Name</td>
				<td>Game Name</td>
				<td>Player Type</td>
				<td>Registration Date & Time</td>
				<td>Last Updated Date & Time 
			</tr>
			<?php 
				
				$sql = "select * from participant where team_id='".$t."' && game_id='".$g."'";
				$res = mysqli_query($con,$sql);
				while($row = mysqli_fetch_assoc($res))
				{
			?>
			<tr>
				
				<td><?php echo $row['e_no'];?></td>
				<td><?php echo $row['p_name'];?></td>
				<td><?php echo $row['p_birth'];?></td>
				<td><?php echo $row['p_mobile'];?></td>
				<td><?php echo $row['p_email'];?></td>
				<td><?php echo $row['p_class'];?></td>
				<?php 
					$sql1 = "select * from team where team_id='".$row['team_id']."'";
					$res1 = mysqli_query($con,$sql1);
					$row1 = mysqli_fetch_assoc($res1);
				?>
				<td><?php echo $row1['team_name'];?></td>
				<?php 
					$sql2 = "select * from game where game_id='".$row['game_id']."'";
					$res2 = mysqli_query($con,$sql2);
					$row2 = mysqli_fetch_assoc($res2);
				?>
				<td><?php echo $row2['gname'];?></td>
				<td><?php echo $row['p_type'];?></td>
				<td><?php echo $row['r_date'];?></td>
				<td><?php echo $row['u_date'];?></td>
			</tr>
				<?php } ?>
		</table><br><br>
		<?php echo "<a href='excel/participant_excel.php?name=".$g."&sem=".$t."'><button>Excel</button></a>"?>
	</body>
</html>	
<?php 
	
	}
	else
	{
		echo "<script>alert('Something Went Wrong.')</script>";
	}
?>
<?php 
	}
	else
	{
		header('location:index.php');
	}
?>