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
  float: left;
  padding: 10px;
  color: white;
  text-decoration: none;
  font-size: 17px;
  text-align: left;
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
 <a class="active" href="#"></a>
</div>
<br>

<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cardealership";
// Create connection
$connection = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed");
echo '<center><form action="statistics.php" method="post">
	  From_Year: <input type="text" name="fromyear" required><br><br>
        To_Year: <input type="text" name="toyear" required><br></center>
		<center><input type="submit" value="search"><br></center>';
	
	if (isset($_POST['fromyear']) && isset($_POST['toyear']))
	{
		$From_Year = $_POST['fromyear'];
	    $To_Year = $_POST['toyear'];
        $sql = "select count(vehicle_id) as count from CarInformation where yearaddedtoinventory >= $From_Year and yearaddedtoinventory <= $To_Year;";
        $result=$connection->query($sql);
        $count=mysqli_fetch_assoc($result)["count"];
        echo "<center>";
	    echo "<table>";
		echo "<tr><td>". "Number of cars in the inventory for the selected period" . "</td><td>". $count . "</td><br>";
		echo "</td></tr>";
		
		$sql1= "update purchase set year = year(purchase.purchasedate);";
        $result1 =$connection->query($sql1);
		$sql2= "select count(vehicle_id) as shipped from purchase where year >= $From_Year and year <= $To_Year and status = 'Shipped';";
        $result2 =$connection->query($sql2);
        $shipped=mysqli_fetch_assoc($result2)["shipped"];
        echo "<tr><td>Number of cars shipped for the selected period </td><td>$shipped</td></tr>";
		
		$sql3= "select count(vehicle_id) as shipped from purchase where year >= $From_Year and year <= $To_Year and status = 'In process';";
        $result3 =$connection->query($sql3);
        $shipped=mysqli_fetch_assoc($result3)["shipped"];
        echo "<tr><td>Number of cars yet to be shipped for the selected period</td><td>$shipped</td></tr>";
		echo "</table>";
		echo "</center>";		
	}
		?>
		</html>
		