
<!DOCTYPE html>
<html>
<head>
	<title>Registration system PHP and MySQL</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="header">
		<h2>Register</h2>
	</div>
	
	<form method="post" action="server.php">

	
        <div class="input-group">
			<label>Name</label>
			<input type="text" name="name" required>
		</div>
		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username" required>
		</div>
		<div >
			<label>Gender</label><br>
			<input type="radio" name="gender" value="Female" required>Female &nbsp;
			<input type="radio" name="gender" value="Male" required>Male &nbsp;
			<input type="radio" name="gender" value="trans" required>Transgender &nbsp;
		</div>
		<div class="input-group">
			<label>Email</label>
			<input type="email" name="email" required>
		</div>
		<div class="input-group">
			<label>Mobile no.</label>
			<input type="text" name="mobile" required>
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password" required>
		</div>
		
		<div class="input-group">
			<button type="submit" class="btn" name="reg_user">Register</button>
		</div>
		
	</form>
</body>
</html>