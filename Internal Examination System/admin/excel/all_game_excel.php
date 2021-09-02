<?php 
	$con = mysqli_connect("localhost","root","","sport");
	//$t = 0;
	$output = '';
	
		//$g = $_POST['temp1'];
		$sql = "select * from game";
		$result = mysqli_query($con,$sql);
		if(mysqli_num_rows($result) > 0)
		{
			$output .='<table border="1">
						<tr>
							<th colspan="4"><h2>Department Of Computer Science</h2></th>
						</tr>
						<tr>
							<th colspan="4"><h3>Game List</h3></th>
						</tr>
						<tr>
							
							<th>Game Name</th>
							<th>Max Participant</th>
							<th>Type</th>
							<th>Year</th>
						</tr>
						
						';
						while($row = mysqli_fetch_array($result))
						{
							$output.='<tr>
											
										<td>'.$row["gname"].'</td>
										<td>'.$row["max"].'</td>
										<td>'.$row["type"].'</td>
										<td>'.$row["year"].'</td>
									</tr>
									';
						}
						$output .='</table>';
						header("Content-Type: application/xls");
						header("Content-Disposition: attachment; filename=All Game.xls");
						echo $output;
		}
	
?>