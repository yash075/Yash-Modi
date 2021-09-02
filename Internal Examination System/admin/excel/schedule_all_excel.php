<?php 
	$con = mysqli_connect("localhost","root","","sport");
	//$t = 0;
	$output = '';
	
		//$g = $_POST['temp1'];
		$sql = "SELECT game.gname,schedule.team1,schedule.team2,schedule.s_date,schedule.s_time,schedule.s_status from game,schedule where game.game_id=schedule.game_id";
		$result = mysqli_query($con,$sql);
		if(mysqli_num_rows($result) > 0)
		{
			$output .='<table border="1">
						<tr>
							<th colspan="6"><h2>Department Of Computer Science</h2></th>
						</tr>
						<tr>
							<th colspan="6"><h3>Schedule</h3></th>
						</tr>
						<tr>
				
				<td>Game Name</td>
				<td>Team 1 Name</td>
				<td>Team 2 Name</td>
				<td>Date</td>
				<td>Time</td>
				<td>Status</td>
			</tr>
						
						';
						while($row = mysqli_fetch_array($result))
						{
							
					$sql1 = "select * from team where team_id='".$row['team1']."'";
					$res1 = mysqli_query($con,$sql1);
					$row1 = mysqli_fetch_assoc($res1);
				
				
					$sql2 = "select * from team where team_id='".$row['team2']."'";
					$res2 = mysqli_query($con,$sql2);
					$row2 = mysqli_fetch_assoc($res2);
			
							$output.='<tr>
											
										<td>'.$row['gname'].'</td>
										<td>'.$row1['team_name'].'</td>
										<td>'.$row2['team_name'].'</td>
										<td>'.$row['s_date'].'</td>
										<td>'.$row['s_time'].'</td>
										<td>'.$row['s_status'].'</td>
									</tr>
									';
						}
						$output .='</table>';
						header("Content-Type: application/xls");
						header("Content-Disposition: attachment; filename=Schedule.xls");
						echo $output;
		}
	
?>