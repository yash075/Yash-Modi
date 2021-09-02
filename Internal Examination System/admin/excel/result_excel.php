<?php 
	$con = mysqli_connect("localhost","root","","sport");
	//$t = 0;
	$g = $_GET['name'];
	$output = '';
	
		//$g = $_POST['temp1'];
		$sql = "SELECT game.gname,schedule.team1,schedule.team2,schedule.s_date,schedule.s_time,schedule.s_status,result.r_team1,result.r_team2,result.win_team_id from game,schedule,result where game.game_id=schedule.game_id and schedule.s_id=result.s_id and game.game_id='".$g."' order by gname";
		$result = mysqli_query($con,$sql);
		if(mysqli_num_rows($result) > 0)
		{
			$output .='<table border="1">
						<tr>
							<th colspan="9"><h2>Department Of Computer Science</h2></th>
						</tr>
						<tr>
							<th colspan="9"><h3>Result</h3></th>
						</tr>
						<tr>
				
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
						
						';
						while($row = mysqli_fetch_array($result))
						{
							
					$sql1 = "select * from team where team_id='".$row['team1']."'";
					$res1 = mysqli_query($con,$sql1);
					$row1 = mysqli_fetch_assoc($res1);
				
				
					$sql2 = "select * from team where team_id='".$row['team2']."'";
					$res2 = mysqli_query($con,$sql2);
					$row2 = mysqli_fetch_assoc($res2);
					
					$sql3 = "select * from team where team_id='".$row['win_team_id']."'";
					$res3 = mysqli_query($con,$sql3);
					$row3 = mysqli_fetch_assoc($res3);
							$output.='<tr>
											
										<td>'.$row['gname'].'</td>
										<td>'.$row1['team_name'].'</td>
										<td>'.$row2['team_name'].'</td>
										<td>'.$row['s_date'].'</td>
										<td>'.$row['s_time'].'</td>
										<td>'.$row['s_status'].'</td>
										<td>'.$row['r_team1'].'</td>
										<td>'.$row['r_team2'].'</td>
										<td>'.$row3['team_name'].'</td>
									</tr>
									';
						}
						$output .='</table>';
						header("Content-Type: application/xls");
						header("Content-Disposition: attachment; filename=Game Wise Result.xls");
						echo $output;
		}
	
?>