<?php 
	$con = mysqli_connect("localhost","root","","sport");
	$output = '';
	if(isset($_POST["export_excel"]))
	{
		$sql = "select * from game";
		$result = mysqli_query($con,$sql);
		if(mysqli_num_rows($result) > 0)
		{
			$output .='<table border="1">
						<tr>
							<th colspan="5" color="red">Anveshan 2019</th>
						</tr>
						<tr>
							<th colspan="5" color="green">Result</th>
						</tr>
						<tr color="blue">
							<th>Id</th>
							<th>Game Name</th>
							<th>Max</th>
							<th>Type</th>
							<th>Year</th>
						</tr>
						
						';
						while($row = mysqli_fetch_array($result))
						{
							$output.='<tr>
										<td>'.$row["game_id"].'</td>
										<td>'.$row["gname"].'</td>
										<td>'.$row["max"].'</td>
										<td>'.$row["type"].'</td>
										<td>'.$row["year"].'</td>
									</tr>
									';
						}
						$output .='</table>';
						header("Content-Type: application/xls");
						header("Content-Disposition: attachment; filename=download.xls");
						echo $output;
		}
	}
?>