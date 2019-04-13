<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration system </title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Register</h2>
  </div>
	
  <form method="post" action="register1.php">
  	<?php include('errors.php'); ?>
		<div class="input-group">
  	  <label>First Name</label>
  	  <input type="text" name="FirstName" value="<?php echo $FirstName; ?>">
  	</div>
	<div class="input-group">
  	  <label>Last Name</label>
  	  <input type="text" name="LastName" value="<?php echo $LastName; ?>">
  	</div>
	<div class="input-group">
  	  <label>Date Of Birth</label>
  	  <input type="text" name="DOB" value="<?php echo $DOB; ?>">
  	</div>
	<div class="input-group">
  	  <label>SSN</label>
  	  <input type="text" name="SSN" value="<?php echo $SSN; ?>">
  	</div>
	
  	<div class="input-group">
  	  <label>Username</label>
  	  <input type="text" name="username" value="<?php echo $username; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="email" value="<?php echo $email; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" name="password_1">
  	</div>
  	<div class="input-group">
  	  <label>Confirm password</label>
	  <input type="password" name="password_2">
  	</div>
  	<div class="input-group">
	<?php  if (isset($_GET['value']))
	{
		$vid = $_GET['value'];
		
	}
	  echo '<button name="purchas_user" class="btn" type="submit" value='.$vid.'>Register</button>';?>
  	</div>
  	<p>
  		Already a member? <a href="login1.php">Sign in</a>
  	</p>
  </form>
</body>
</html>