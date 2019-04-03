<?php
session_start();
// initializing variables
$FirstName = "";
$LastName    = "";
$DOB = "";
$SSN    = "";
$username = "";
$email    = "";
$errors = array(); 
// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'cardealership');
// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $FirstName = mysqli_real_escape_string($db, $_POST['FirstName']);
  $LastName = mysqli_real_escape_string($db, $_POST['LastName']);
  $DOB = mysqli_real_escape_string($db, $_POST['DOB']);
  $SSN = mysqli_real_escape_string($db, $_POST['SSN']);
  
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
   if (empty($FirstName)) { array_push($errors, "FirstName is required"); }
    if (empty($LastName)) { array_push($errors, "LastName is required"); }
	 if (empty($DOB)) { array_push($errors, "DOB is required"); }
	 if (empty($SSN)) { array_push($errors, "SSN is required"); }
	  
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }
  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM signup WHERE username='$username' OR email='$email' LIMIT 1";
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
  	$query = "INSERT INTO signup (FirstName, LastName, DOB, SSN, email, Password, Role, username) 
  			  VALUES('$FirstName','$LastName','$DOB','$SSN', '$email', '$password','$Role','$username')";
			  
  	mysqli_query($db, $query);
	echo "<you are registered successfully please login to proceed!</h5>";
	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are registered successfully please login";
	echo("<script>alert('You are registered successfully please login')</script>");
    //echo("<script>window.location = 'login.php';</script>");
  header('location: login.php');
		//echo "<you are registered successfully please login to proceed!</h5>";
  	
	//if ($db->query($query) === TRUE) {
                                 //   echo "<you are registered successfully!</h5>";
                                 //   echo "<h5><br><A href='login.php'>Return to login.</a></h5>";
                                //} else {
                                  //  echo "Error: " . $query . "<br>" . $db->error;
                               // }
                            }
  }
// LOGIN USER
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }
  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM signup WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) > 0) { 
      $_SESSION['username'] = $username;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: loginindex.php');
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}
?>
