<?php include('server.php') ?>
<?php
if(isset($_GET['id']))
{
	$id = $_GET['id'];
	$query = "SELECT * FROM users WHERE id='$id'";
  	$results = mysqli_query($db, $query);
	$row = mysqli_fetch_array($results,MYSQLI_ASSOC);
	$color = $row['color'];
	
?>
<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <link rel="stylesheet" type="text/css" href="styling2.css">
  <img src="images/clglogo.jpeg" width="2275px" height="150px">
</head>
<body class="container">
	<div class="header">
  	<h2>Login</h2>
    </div>
	<form method="post" action="" style="background: white; height:800px;">
	<?php include('errors.php'); ?>
	<div class="col-md-12" style="display:table-cell; vertical-align:middle; text-align:center">
		<img src="images/r0.png" id="select_image"  width="auto" height="350px" style="position : relative; left:70px">
	</div>
	<p style="visibility: hidden;display:none" id="i_value">0</p>
	<p style="visibility: hidden;display:none" id="img_value">0</p>
	<div class="row">
		<div class="col-md-6" style="display:table-cell; vertical-align:middle; text-align:center">
			
			<img src="images/aclock.png" alt="password_image" width="60px" height="auto" onclick="rotate_image('plus')" style="position : relative; left:70px">
			<hr>
			<label style="font-size:25px">Anti-Clockwise Rotation</label><br>
			<button type="button" class="btn btn-info" onclick="outer_click()">Outer orbit</button>
		</div>
		<div class="col-md-6" style="display:table-cell; vertical-align:middle; text-align:center">
			<img src="images/clock.png" alt="password_image" width="60px" height="auto" onclick="rotate_image('minus')" style="position : relative; left:150px">
			<hr>
			<label style="font-size:25px; position:relative; left:45px">Clockwise Rotation</label><br>
			<button type="button" class="btn btn-info" onclick="inner_click()">Inner orbit</button>
		</div>
	</div>
	<hr>
  	<div class="input-group">
  		<label>Password</label>
  		<input type="password" name="password" id="password">
		
  	</div>
	  	<input type="checkbox" onclick="showPassword()"> <p style="display:inline; font-size:20px; top:3px;">Show Password</p>
  	<div class="input-group" >
		  
  		<button type="submit" class="btn" name="login_user" style="position:relative; left:150px; top:-40px">Login</button>
  	</div>
  	<p style="position:relative; top:-50px" >
  		Create an account  <a href="register.php">Sign up</a>
  	</p>
  </form>
  <script type="text/javascript">
	function showPassword() {
		var x = document.getElementById("password");
		if (x.type === "password") {
			x.type = "text";
		} else {
			x.type = "password";
		}
	}
	(function() {
		document.getElementById("i_value").innerHTML = 0;

})();
	function rotate_image(data) {
		console.log("data"+data);
		var i_value = document.getElementById('i_value').textContent;
		console.log("i_value"+i_value);
		var update_i_value = 0;
		if(data == 'plus'){
			update_i_value = Number(i_value) + 1;
			document.getElementById("i_value").innerHTML = update_i_value;
		}
		else{
			update_i_value = Number(i_value) - 1;
			document.getElementById("i_value").innerHTML = update_i_value;
		}
		console.log("update_i_value"+update_i_value);
		var image_value = 0;
		if(update_i_value % 8 < 0){
			image_value = 8 + (update_i_value % 8);

		}else{
			image_value = update_i_value % 8;
		}
		console.log("image_value"+image_value);
		document.getElementById("img_value").innerHTML = image_value;
		document.getElementById("select_image").src="images/r"+image_value+".png";
		
		
	}
	function outer_click(){
		const Black = [[1,'a'],[2,'b'],[3,'c'],[4,'d'],[5,'e'],['*','f'],['_','g'],['$','h']];
		const Red = [['$','h'],[1,'a'],[2,'b'],[3,'c'],[4,'d'],[5,'e'],['*','f'],['_','g']];
		const Lavender = [['_','g'],['$','h'],[1,'a'],[2,'b'],[3,'c'],[4,'d'],[5,'e'],['*','f']];
		const Orange = [['*','f'],['_','g'],['$','h'],[1,'a'],[2,'b'],[3,'c'],[4,'d'],[5,'e']];
		const Yellow=[[5,'e'],['*','f'],['_','g'],['$','h'],[1,'a'],[2,'b'],[3,'c'],[4,'d']];
		const Green=[[4,'d'],[5,'e'],['*','f'],['_','g'],['$','h'],[1,'a'],[2,'b'],[3,'c']];
		const Pink=[[3,'c'],[4,'d'],[5,'e'],['*','f'],['_','g'],['$','h'],[1,'a'],[2,'b']];
		const Blue=[[2,'b'],[3,'c'],[4,'d'],[5,'e'],['*','f'],['_','g'],['$','h'],[1,'a']];
		var img_value = document.getElementById('img_value').textContent;
		var color = '<?php echo $color; ?>';
		var password = document.getElementById("password").value;
		if(color == 'Black')
		{
			password = password+''+Black[img_value][0];
		}
		else if(color == 'Red')
		{
			password = password+''+Red[img_value][0];
		}
		else if(color == 'Lavender')
		{
			password = password+''+Lavender[img_value][0];
		}
		else if(color == 'Orange')
		{
			password = password+''+Orange[img_value][0];
		}
		else if(color == 'Yellow')
		{
			password = password+''+Yellow[img_value][0];
		}
		else if(color == 'Green')
		{
			password = password+''+Green[img_value][0];
		}
		else if(color == 'Pink')
		{
			password = password+''+Pink[img_value][0];
		}
		else{
			password = password+''+Blue[img_value][0];
		}
		
		console.log("password"+password);
		document.getElementById("password").value = password;
	}
	function inner_click(){
		const Black = [[1,'a'],[2,'b'],[3,'c'],[4,'d'],[5,'e'],['*','f'],['_','g'],['$','h']];
		const Red = [['$','h'],[1,'a'],[2,'b'],[3,'c'],[4,'d'],[5,'e'],['*','f'],['_','g']];
		const Lavender = [['_','g'],['$','h'],[1,'a'],[2,'b'],[3,'c'],[4,'d'],[5,'e'],['*','f']];
		const Orange = [['*','f'],['_','g'],['$','h'],[1,'a'],[2,'b'],[3,'c'],[4,'d'],[5,'e']];
		const Yellow=[[5,'e'],['*','f'],['_','g'],['$','h'],[1,'a'],[2,'b'],[3,'c'],[4,'d']];
		const Green=[[4,'d'],[5,'e'],['*','f'],['_','g'],['$','h'],[1,'a'],[2,'b'],[3,'c']];
		const Pink=[[3,'c'],[4,'d'],[5,'e'],['*','f'],['_','g'],['$','h'],[1,'a'],[2,'b']];
		const Blue=[[2,'b'],[3,'c'],[4,'d'],[5,'e'],['*','f'],['_','g'],['$','h'],[1,'a']];
		var img_value = document.getElementById('img_value').textContent;
		var color = '<?php echo $color; ?>';
		console.log(color[0]);
		var password = document.getElementById("password").value;
		if(color == 'Black')
		{
			password = password+''+Black[img_value][1];
		}
		else if(color == 'Red')
		{
			password = password+''+Red[img_value][1];
		}
		else if(color == 'Lavender')
		{
			password = password+''+Lavender[img_value][1];
		}
		else if(color == 'Orange')
		{
			password = password+''+Orange[img_value][1];
		}
		else if(color == 'Yellow')
		{
			password = password+''+Yellow[img_value][1];
		}
		else if(color == 'Green')
		{
			password = password+''+Green[img_value][1];
		}
		else if(color == 'Pink')
		{
			password = password+''+Pink[img_value][1];
		}
		else{
			password = password+''+Blue[img_value][1];
		}
		console.log("password"+password);
		document.getElementById("password").value = password;
	}
  </script>
</body>
</html>
<?php
}
else{
	// header('location: index.php');
}
?>