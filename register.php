<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Signup</title>
  <link rel="stylesheet" type="text/css" href="styling1.css">
  <img src="images/clglogo.jpeg" width=2300px;>
</head>
<body class="container">
  <div class="header">
  	<h2>Register</h2>
  </div>

  <form method="post" action="register.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  	  <label>Username</label>
  	  <input type="text" name="username" value="" style="position : relative; left :50px;">
  	</div>
  	<div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="email" value="" style="position : relative; left :135px;">
  	</div>
  	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" name="password_1" style="position : relative; left :65px;"> <label style="font-size:32px; position : relative; top :25px;"><br>Password Combination ** | (a-h & $ or _ or * & 1-5 )</label>
  	</div>
  	<!-- <div class="input-group">
  	  <label>Confirm password</label>
  	  <input type="password" name="password_2">
  	</div> -->
	<div class="input-group" style="position : relative; top :25px;">
  	  <label>Select Color</label>
		<!-- <input type="password" name="password_2"> -->
		<select name="color" id="color" onchange="myFunction()" style="position : relative; left :25px;">
			<option value="Black" selected>Black</option>
			<option value="Red">Red</option>
			<option value="Lavender">Lavender</option>
			<option value="Orange">Orange</option>
			<option value="Yellow">Yellow</option>
			<option value="Green">Green</option>
			<option value="Pink">Pink</option>
			<option value="Blue">Blue</option>
		</select>
  	</div>
	<div style="background-color: black " id="color_value"><br>
	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Register</button>
  	</div>
  	<p>
  		Already have an account <a href="login.php">Sign in</a>
  	</p>
  </form>
  <script type="text/javascript">
	function myFunction() {
		var color = document.getElementById("color").value;
		console.log(color);
		document.getElementById("color_value").style.backgroundColor=color;
		// if(x==='min')
		
	}
    // window.onload = function() {
    //     var eSelect = document.getElementById('color');
    //     eSelect.onchange = function() {
    //         if(eSelect.selectedIndex === 2) {
    //             document.getElementById("MyHeader").style.backgroundColor='red';
    //         } else {
    //             document.getElementById("MyHeader").style.backgroundColor='red';
    //         }
    //     }
    // }
  </script>
</body>
</html>