<?php 
	$con = mysqli_connect("localhost","root","","sport");
	//$t = 0;
	
	$t = $_GET['sem'];
	$g = $_GET['name'];
	$output = '';
	
		//$g = $_POST['temp1'];
		$sql = "select * from participant where team_id='".$t."' && game_id='".$g."'";
		$result = mysqli_query($con,$sql);
		if(mysqli_num_rows($result) > 0)
		{
			$output .='<table border="1">
						<tr>
							<th colspan="11"><h2>Department Of Computer Science</h2></th>
						</tr>
						<tr>
							<th colspan="11"><h3>Participant</h3></th>
						</tr>
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
				<td>Last Updated Date & Time</td> 
			</tr>
						
						';
						while($row = mysqli_fetch_array($result))
						{
							
					$sql1 = "select * from team where team_id='".$row['team_id']."'";
					$res1 = mysqli_query($con,$sql1);
					$row1 = mysqli_fetch_assoc($res1);
				
				
					$sql2 = "select * from game where game_id='".$row['game_id']."'";
					$res2 = mysqli_query($con,$sql2);
					$row2 = mysqli_fetch_assoc($res2);
			
							$output.='<tr>
											
										<td>'.$row['e_no'].'</td>
										<td>'.$row['p_name'].'</td>
										<td>'.$row['p_birth'].'</td>
										<td>'.$row['p_mobile'].'</td>
										<td>'.$row['p_email'].'</td>
										<td>'.$row['p_class'].'</td>
										<td>'.$row1['team_name'].'</td>
										<td>'.$row2['gname'].'</td>
										<td>'.$row['p_type'].'</td>
										<td>'.$row['r_date'].'</td>
										<td>'.$row['u_date'].'</td>
									</tr>
									';
						}
						$output .='</table>';
						header("Content-Type: application/xls");
						header("Content-Disposition: attachment; filename=Semester & Game Wise Participant.xls");
						echo $output;
		}
	
?>