<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Load an icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<head>
<style>
table, th, td {
    border: 1px solid black;
	  border-collapse: collapse;
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
<div class="navbar">
   <a class="active" href="managerview.php"><i class="fa fa-fw fa-home"></i>Home</a>
</div>
<form method="post" action="inventory.php">
<center>
<table>
<td><br>

            Vehicle_id: <input type="text" name="vehicleid"/><br><br>
            Make: <input type="text" name="make"/><br><br>	
            Model: <input type="text" name="model"/><br><br>
            Year: <input type="text" name="year"/><br><br>
            Color: <input type="text" name="color"/><br><br>
            Price: <input type="text" name="price"/><br><br>	
            Year Added To Inventory: <input type="text" name="yearaddedtoinventory"/><br><br>	
            Type: <input type="text" name="type"/><br><br>	
            Mileage: <input type="text" name="mileage"/><br><br>	
            Engine: <input type="text" name="engine"/><br><br>
            Transmission: <input type="text" name="Transmission"/><br><br>	
            Incentives: <input type="text" name="Incentives"/><br><br>	
			DownPayment: <input type="text" name="downpayment"/><br><br>
            InterestRate: <input type="text" name="interestrate"/><br><br>	  	
            <center><input type="submit" value="Add to Inventory"><br></center>			
</td>
</table>
		</center>
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
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
if (isset($_POST['vehicleid']) &&
    isset($_POST['make']) && 
    isset($_POST['model']) && 
	isset($_POST['year']) && 
	isset($_POST['color']) && 
	isset($_POST['price']) && 
	isset($_POST['yearaddedtoinventory']) && 
	isset($_POST['type']) && 
	isset($_POST['mileage']) && 
	isset($_POST['engine']) && 
	isset($_POST['Transmission']) && 
	isset($_POST['Incentives']) && 
	isset($_POST['downpayment']) && 
	isset($_POST['interestrate']))
	{
	$Vehicle_id = $_POST['vehicleid'];
	$Make = $_POST['make'];
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
	$downpayment = $_POST['downpayment'];
	$interestrate = $_POST['interestrate'];
	
$sql = "INSERT INTO CarInformation(vehicle_id,make,model,year,color,price,yearaddedtoinventory,type,mileage,engine,transmission,incentives,downpayment,interestrate) 
    VALUES('$Vehicle_id','$Make','$model','$year','$color','$price','$yearaddedtoinventory','$type', '$mileage','$engine','$Transmission', '$Incentives','$downpayment','$interestrate')";

   if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
	}
	else
	{
echo "<br><h2><center>Enter all values</center></h2>";
	}
?>