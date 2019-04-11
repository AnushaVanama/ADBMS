<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Load an icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<head>
<style>
table, th, td {
    border: 0px solid black;
}
</style>
</head>
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
</div>
<form method="post" action="inventory.php">
<table>
<center>
<td>
    <div class="row">
  <div class="col-75">
    <div class="container">
      <form action="/action_page.php">

        <div class="row">
          <div class="col-50">
            <label for="Make">Make</label><br></br>
            <input type="text" id="Make" name="Make" ><br></br
            <label for="model"> Model</label><br></br>
            <input type="text" id="model" name="model" ><br></br>
			
			<label for="year"> Year</label><br></br>
            <input type="text" id="year" name="year" ><br></br>
            
			           <label for="color"> Color</label><br></br>
            <input type="text" id="color" name="color" ><br></br>
            <label for="price"> price</label><br></br>
            <input type="text" id="price" name="price" ><br></br>

            <div class="row">
              <div class="col-50">
                <label for="yearaddedtoinventory">Year Added To Inventory</label><br></br>
                <input type="text" id="yearaddedtoinventory" name="yearaddedtoinventory" ><br></br>
              </div>
              <div class="col-50">
                <label for="type">Type</label><br></br>
                <input type="text" id="type" name="type" ><br></br>
              </div>
            </div>
          </div>

          <div class="col-50">
           
            
            <label for="mileage">Mileage</label><br></br>
            <input type="text" id="mileage" name="mileage" ><br></br>
            <label for="engine">Engine</label><br></br>
            <input type="text" id="engine" name="engine" ><br></br>
            <label for="Transmission">Transmission</label><br></br>
            <input type="text" id="Transmission" name="Transmission" ><br></br>

            <div class="row">
              <div class="col-50">
                <label for="Incentives">Incentives</label><br></br>
                <input type="text" id="Incentives" name="Incentives" ><br></br>
              </div>
              <div class="col-50">
                <label for="interestrate">InterestRate</label><br></br>
                <input type="text" id="interestrate" name="interestrate" ><br></br>
              </div>
			  <div class="col-50">
                <label for="downpayment">DownPayment</label><br></br>
                <input type="text" id="downpayment" name="downpayment" >
              </div>
            </div>
          </div>

        </div>
        
        <input type="submit" value="Add to inventory" class="btn">
      </form>
    </div>
  </div>  

	</td>
	</center>
	</table>
	
	</form>
</body>
</html>

<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cardealership";
// Create connection
$connection = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed");
if ( isset( $_POST['Make'] && isset($_POST['model']) && isset($_POST['year']) && isset($_POST['color']) && isset($_POST['price']) && isset($_POST['yearaddedtoinventory']) && isset($_POST['type']) && isset($_POST['mileage']) && isset($_POST['engine']) && isset($_POST['Transmission']) && isset($_POST['Incentives']) && isset($_POST['interestrate']) && isset($_POST['downpayment']) ) ) {
	$Make = $_POST['Make'];
	$model = $_POST['model'];
	$year = $_POST['year'];
	$color = $_POST['color'];
	$price = $_POST['price'];
	$yearaddedtoinventory = $_POST['yearaddedtoinventory'];
	$type = $_POST['type'];
	$mileage = $_POST['mileage'];
	$engine = $_POST['engine'];
	$Transmission = $_POST['Transmission'];
	$Incentives = $_POST['Incentives'];
	$interestrate = $_POST['interestrate'];
	$downpayment = $_POST['downpayment'];
	
}
$sql = "INSERT INTO carinformation (make,model,year,color,price,yearaddedtoinventory,type,mileage,engine,transmission,incentives,interestrate,downpayment) 
  			  VALUES('$Make','$model','$year','$color', '$email', '$price','$yearaddedtoinventory','$type', '$mileage','$engine','$Transmission', '$Incentives','$interestrate','$downpayment')";
               $res = mysqli_query($connection, $sql) or die("Query Failed: $sql");
echo "<br><h2><center>$Make</center></h2>";
?>