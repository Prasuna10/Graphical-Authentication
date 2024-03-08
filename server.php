<?php
session_start();

// initializing variables
$username = "root";
$email    = "";
$errors = array();

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'test_sample');
// REGISTER USER

if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  // $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
  $color = mysqli_real_escape_string($db,$_POST['color']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($color)) { array_push($errors, "Pick one color"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  //if(!preg_match('/^[a-h[*$_]1-5]+$/i', $password_1)){
   // array_push($errors, "Password should contain a-h and a special symbol such as($ or * or _) then 1-5");
  //}
  // if ($password_1 != $password_2) {
	// array_push($errors, "The two passwords do not match");
  // }

  // first check the database to make sure
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);

  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database
    // $password = $password_1;
  	$query = "INSERT INTO users (username, email, password,color)
  			  VALUES('$username', '$email', '$password','$color')";
  	mysqli_query($db, $query);
  	// $_SESSION['username'] = $username;
  	// $_SESSION['success'] = "You are now logged in";
  	header('location: index.php');
  }
}

// ...
// ...

// LOGIN USER
if (isset($_POST['login_user'])) {
  
  $password = mysqli_real_escape_string($db, $_POST['password']);
  $id = $_GET['id'];
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }
  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM users WHERE id='$id' AND password='$password'";
  	$results = mysqli_query($db, $query);
    // print_r($id);
    // print_r($password);
    // print_r(mysqli_num_rows($results));
  	if (mysqli_num_rows($results) == 1) {
      $row = mysqli_fetch_array($results,MYSQLI_ASSOC);
  	  $_SESSION['username'] = $row['username'];
  	  $_SESSION['success'] = "You are now logged in";
      $_SESSION['wrong_attempts'] = 0;
  	  header('location: index.php');
  	}else {
      // $_SESSION['wrong_attempts'] = isset($_SESSION['wrong_attempts']) ? $_SESSION['wrong_attempts'] + 1 : $_SESSION['wrong_attempts'];
      if(isset($_SESSION['wrong_attempts']))
      {
        $_SESSION['wrong_attempts'] = $_SESSION['wrong_attempts'] + 1;
      }
      else{
        $_SESSION['wrong_attempts'] = 1;
      }
      // echo $_SESSION['wrong_attempts'];
      if($_SESSION['wrong_attempts'] > 5)
      {
        array_push($errors, "Your Account is Blocked.Please contact admin");
        $query = "UPDATE users SET block=1 where id='$id'";
  	    $results = mysqli_query($db, $query);
        unset($_SESSION['wrong_attempts']);
        header( "refresh:3; url=register.php" );
        
      }else{
        array_push($errors, "Wrong password".$_SESSION['wrong_attempts']);
      }
  	}
  }
}

if (isset($_POST['exist_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);

  if (empty($username)) {
  	array_push($errors, "Username is required");
  }

  if (count($errors) == 0) {
  	$query = "SELECT * FROM users WHERE username='$username'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
      $row = mysqli_fetch_array($results,MYSQLI_ASSOC);
      if($row['block'] == 1){
        array_push($errors, "Your Account is Blocked.Please contact admin");
      }else{
        header('location: login.php?id='.$row['id']);
      }
  	  
  	}else {
  		array_push($errors, "Username Not exist");
  	}
  }
}

?>
