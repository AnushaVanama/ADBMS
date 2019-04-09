<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Load an icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<head>
<style>
table, th, td {
    border: 1px solid black;
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
   <a class="active" href="loginindex.php"><i class="fa fa-fw fa-home"></i>Home</a>
</div>
</html>
<?php

session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cardealership";

// Create connection

$connection = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed");
	   
               if (isset($_POST['condition']) && isset($_POST['make']) && isset($_POST['model']) && isset($_POST['color']) && isset($_POST['pricerange']))
               {
               $condition = $_POST['condition'];
			   $make = $_POST['make'];
			   $model = $_POST['model'];
			   $price = $_POST['pricerange'];
			   $color = $_POST['color'];
			   $lowval = 0;
			   $highval = 30000;
			   switch($price)
			   {
				   case 0:
						$lowval = 0;
						$highval = 15000;
						break;
				   case 1:
						$lowval = 15000;
						$highval = 20000;
						break;
				   case 2:
						$lowval = 20000;
						$highval = 25000;
						break;
				   case 3:
						$lowval = 25000;
						$highval = 30000;
						break;
				   case 4:
						$lowval = 30000;
						$highval = 500000;
						break;
			   }
               $sql = "SELECT * FROM CarInformation WHERE make = '$make' and
														  model = '$model' and
														  color = '$color' and
														  price >= '$lowval' and
														  price <= '$highval' and
               											  type = '$condition';";
               $res = mysqli_query($connection, $sql) or die("Query Failed: $sql");
               if ($res->num_rows > 0)
               {
               echo "<center><h2>Results: </center></h2>";
			   echo "<center>";
			   echo "<table>";
               while ($row = mysqli_fetch_assoc($res))
               {
               echo "<td>" . "Vehicle id: " . $row["vehicle_id"] . "<br>" . 
							 "Make: " . $row["make"] . "<br>" . 
							 "Model: " . $row["model"] . "<br>" . 
							 "Year: " . $row["year"] . "<br>" . 
							 "Color: " . $row["color"] . "<br>" .
							 "Price: " . $row["price"] . "<br>" . 
							 "Year added to Inventory: " . $row["yearaddedtoinventory"]. "   ". "<br>" . 
							 "Type: " . $row["type"] . "<br>" . 
							 "Mileage: " . $row["mileage"] . "</td>" .
							 "<td>";
							 switch($row["model"])
							 {
				   case "camry":
					    echo "<img src=\"..\Images\camry.jpg\" alt=\"HTML5 Icon\" style=\"width:auto;height:175px;\">";
						break;
				   case "civic":
						echo "<img src=\"..\Images\civic.jpg\" alt=\"HTML5 Icon\" style=\"width:auto;height:175px;\">" ;
						break;
				   case "accord":
				        echo "<img src=\"..\Images\accord.jpg\" alt=\"HTML5 Icon\" style=\"width:auto;height:175px;\">" ;
						break;
				   case "corolla":
				        echo "<img src=\"..\Images\corolla.jpg\" alt=\"HTML5 Icon\" style=\"width:auto;height:175px;\">" ;
						break;
				   }

			echo "</td>";
               }
               
               echo "</table>";
			   echo "</center>";
               }
               else
               {
               echo "There are no vehicles matching your criteria";
               echo "<h3><a href = 'index.php'>Go back to search for another vehicle</h3></a>";
               }	
               }
 ?>