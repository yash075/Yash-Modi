<html>

<body>
<?php

$con = mysqli_connect('localhost','root','','sport');
$id=$_REQUEST['team2_id'];
  
  
$sql = "select * from team where team_id=".$id;
$result=mysqli_query($con,$sql);
?>
							
					
						<?php 
							
							while($row = mysqli_fetch_assoc($result)) 
							{?>
									<option value="<?php echo $row['team_id']; ?>"><?php echo $row['team_name']; ?></option>"; 
							<?php 
							}
							
							?>
							
					
						</body>
						</html>



