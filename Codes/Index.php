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
   <a href="#"><i class="fa fa-fw fa-envelope"></i> Contact</a>
   <a href="login.php"><i class="fa fa-fw fa-user"></i> Login</a>
   <a class="active" href="#"><i class="fa fa-fw fa-home"></i> Home</a>
</div>
<br></br>
<center>
<div class="SearchBar">
<form>
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
	<option value="15000">15K - 20K</option>
	<option value="20000">20K - 25K</option>
  	<option value="25000">25K - 30K</option>
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