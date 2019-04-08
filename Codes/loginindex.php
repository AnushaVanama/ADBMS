<?php 
  session_start(); 
  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>

<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Load an icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {font-family: Arial, Helvetica, sans-serif;}

.navbar {
  width: 100%;
  background-color: #216;
  overflow: auto;
  position: relative;
 
 }

.navbar a {
  float: right;
  padding: 10px;
  color: white;
  text-decoration: none;
  font-size: 17px;
}

.navbar a:hover {
  background-color: #225;
}

.active {
  background-color: #216;
}

@media only screen and (max-width: 1044px) {
  .navbar a {
    float: none;
    display: block;
  }
}

.dealer-logo{
    text-align: Left;
	background-color: transparent;
	text-decoration: none;
	padding: 1px;
  
}

.SearchBar {     
     top: 355px;
     left: 575px;
}

.SearchBar {
     height: 30px;
     width: 500px;
}

</style>
<body>
<div class="dealer-logo">
<center>
<img class="dealer-logo" 
src="..\Images\Logo.png" alt="HTML5 Icon" style="width:auto;height:75px;"> 
<img src="..\Images\Name.png" alt="HTML5 Icon" style="display:inline-block;width:auto;height:75px;" > 
</center>
</div>
<div class="navbar">
   <a style="text-decoration:underline" href="index.php">Log Out</a>
   <a href="#"><i class="fa fa-fw fa-envelope"></i> Contact</a>
   <a class="active" href="loginindex.php"><i class="fa fa-fw fa-home"></i>Home</a>
   <a href="#">Welcome <?php  if (isset($_SESSION['username'])) : ?>
    '<?php echo $_SESSION['username']; ?>'
    <?php endif ?></a>
</div>
<br></br>
<center>
<div class="SearchBar">
<form action="searchbar.php" method="get">
	<input type="text" name="searchterms" placeholder="Enter your vehicle ID to search" size="35" required>
	<input type="submit" value="Search">
</div>	
</form>
<br>
<form action="categorysearch.php" method="post">
	<select name="condition" required>
  	<option>New/Used</option>
  	<option value="new">New</option>
 	<option value="used">Used</option>
    </select>
	<select name="make" required>
  	<option>Select Make</option>
  	<option value="honda">Honda</option>
 	<option value="toyota">Toyota</option>
	</select>
	<select name="model" required>
  	<option>Select Model</option>
	<option value="camry">Toyota Camry</option>
	<option value="corolla">Toyota Corolla</option>
  	<option value="civic">Honda Civic</option>
	<option value="accord">Honda Accord</option>
	</select>
	<select name="pricerange" required>
  	<option>Select Price Range</option>
	<option value="0">Less than 15K</option>
	<option value="1">15K - 20K</option>
	<option value="2">20K - 25K</option>
  	<option value="3">25K - 30K</option>
	<option value="4">Above 30K</option>
	</select>
	<select name="color" required>
  	<option>Select Color</option>
	<option value="blue">Blue</option>
	<option value="red">Red</option>
  	<option value="white">White</option>
	</select>
	<input type="submit" value="Search"><br/>
	</form>
</center>
<br><br>
<div class="dealer-logo">
<center>
<img src="..\Images\camry.jpg" alt="HTML5 Icon" style="width:auto;height:125px;"> 
<img src="..\Images\corolla.jpg" alt="HTML5 Icon" style="width:auto;height:125px;">
<img src="..\Images\civic.jpg" alt="HTML5 Icon" style="width:auto;height:125px;">
<img src="..\Images\accord.jpg" alt="HTML5 Icon" style="width:auto;height:125px;"> 

</center>
</div>
</body>
</html> 

    
</body>
</html>