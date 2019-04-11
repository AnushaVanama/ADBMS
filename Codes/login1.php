<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<div class="dealer-logo">
<center>
<img class="dealer-logo" 
src="..\Images\Logo.png" alt="HTML5 Icon" style="width:auto;height:75px;"> 
<img src="..\Images\Name.png" alt="HTML5 Icon" style="display:inline-block;width:auto;height:75px;" > 
</center>
</div>
<div class="navbar">
 <a class="active" href="#"></a>
</div>
<head>
  
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Login</h2>
  </div>
  
  <form method="post" action="login1.php">
  	<?php include('errors.php'); ?>
	<?php
	if (isset($_GET['purchasingvid']))
	{
		$vid = $_GET['purchasingvid'];
		
	}
	else
	{
		$vid = $_GET['vid'];
	}
	?>
  	<div class="input-group">
  		<label>Username</label>
  		<input type="text" name="username" >
  	</div>
  	<div class="input-group">
  		<label>Password</label>
  		<input type="password" name="password">
  	</div>
  	<div class="input-group">
		<?php echo '<button name="purchase_user" type="submit" value='.$vid.'>Login</button>';?>
  	</div>
  	<p>
  		 Not yet a member? <?php echo '<a href="register1.php?value='.$vid.'">Sign up</a>';?>
  	</p>
	</form>
</body>
</html>