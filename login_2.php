<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <link rel="stylesheet" type="text/css" href="styling.css">
  <img src="images/clglogo.jpeg" width=2300px;>
</head>
<body class="container">
  <div class="header">
  	<h2>Login</h2>
  </div>
  <form method="post" action="login_2.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  		<label>Username</label>
  		<input type="text" name="username" >
  	</div>
  	<div class="input-group" > 
  		<button type="submit" class="btn" name="exist_user" >Login</button>
  	</div>
  	<p>
  	 Please click on the below link to create an account<br> <a href="register.php">Sign up</a>
  	</p>
  </form>
</body>
</html>
