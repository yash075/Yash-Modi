<?php 
	$con = mysqli_connect("localhost","root","","sport");
	//$t = 0;
	$g=$_GET['name'];
	
	$output = '';
	
		//$g = $_POST['temp1'];
		$sql = "select winner.game_id,winner.team_id,winner.man_series,winner.man_match,result.r_id from winner,result where winner.r_id=result.r_id and winner.game_id='".$g."'";
		$result = mysqli_query($con,$sql);
		if(mysqli_num_rows($result) > 0)
		{
			$output .='<table border="1">
						<tr>
							<th colspan="4"><h2>Department Of Computer Science</h2></th>
						</tr>
						<tr>
							<th colspan="4"><h3>Winner</h3></th>
						</tr>
						<tr>
				
				<td>Game Name</td>
				<td>Team Name</td>
				<td>Men Of The Match</td>
				<td>Men Of The Series</td>
			</tr>
						
						';
						while($row = mysqli_fetch_array($result))
						{
							
					$sql1 = "select * from game where game_id='".$row['game_id']."'";
					$res1 = mysqli_query($con,$sql1);
					$row1 = mysqli_fetch_assoc($res1);
				
				
					$sql2 = "select * from  team where team_id='".$row['team_id']."'";
					$res2 = mysqli_query($con,$sql2);
					$row2 = mysqli_fetch_assoc($res2);
			
							$output.='<tr>
											
										<td>'.$row1['gname'].'</td>
										<td>'.$row2['team_name'].'</td>
										<td>'.$row['man_match'].'</td>
										<td>'.$row['man_series'].'</td>
										
									</tr>
									';
						}
						$output .='</table>';
						header("Content-Type: application/xls");
						header("Content-Disposition: attachment; filename=Game Wise Winner.xls");
						echo $output;
		}
	
?>