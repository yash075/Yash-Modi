<!DOCTYPE html>
<html>
<head>
	<title>Registration system PHP and MySQL</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

	<div class="header">
		<h2>Login</h2>
	</div>
	
	<form method="post" action="loginval.php">


		<div class="input-group">
			<label>Email</label>
            <input type="text" name="uname" placeholder="Email" required>
		</div>
		<div class="input-group">
			<label>Password</label>
            <input type="password" name="password" placeholder="Password">
		</div>
		<div class="input-group">
           <!-- <input class="login100-form-btn" style="color:white;" type="submit" name="submit" value="Login">-->
			<button type="submit" class="btn" name="submit">Login</button>
		</div>
		<p>
          
			 <a href="register.php">Create new Account</a>
		</p>
	</form>


</body>
</html>