<?php 
	$con = mysqli_connect("localhost","root","","sport");
	//$t = 0;
	$output = '';
	
		//$g = $_POST['temp1'];
		$sql = "select * from team";
		$result = mysqli_query($con,$sql);
		if(mysqli_num_rows($result) > 0)
		{
			$output .='<table border="1">
						<tr>
							<th colspan="2"><h2>Department Of Computer Science</h2></th>
						</tr>
						<tr>
							<th colspan="2"><h3>Team List</h3></th>
						</tr>
						<tr>
							
							<th>Team Name</th>
							<th>Semester</th>
							
						</tr>
						
						';
						while($row = mysqli_fetch_array($result))
						{
							$output.='<tr>
											
										<td>'.$row["team_name"].'</td>
										<td>'.$row["sem"].'</td>
										
									</tr>
									';
						}
						$output .='</table>';
						header("Content-Type: application/xls");
						header("Content-Disposition: attachment; filename=Team List.xls");
						echo $output;
		}
	
?>