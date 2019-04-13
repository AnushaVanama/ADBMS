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
 <a class="active" href="#">Your Search Results</a>
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
	   
               if (isset($_POST['make']) && isset($_POST['model']))
               {
			   $make = $_POST['make'];
			   $model = $_POST['model'];
			   $sql = "select * from CarInformation where make='$make' and model='$model';";
               $res = mysqli_query($connection, $sql) or die("Query Failed: $sql");
               if ($res->num_rows > 0)
               {
			   echo "<center>";
			   echo "<table>";
               echo "<tr><br><h3><center>Results for make: $make and model: $model</center></h3></tr>";
			   echo "<tr><td>Total number of vehicles in stock</td><td>$res->num_rows</td></tr>";
		       $sql2= "select count(vehicle_id) as new from CarInformation where make='$make' and model='$model' and type= 'new';";
               $result2 =$connection->query($sql2);
               $new=mysqli_fetch_assoc($result2)["new"];
               echo "<tr><td>Number of new cars in stock </td><td>$new</td></tr>";
		       $sql3= "select count(vehicle_id) as used from CarInformation where make='$make' and model='$model' and type= 'used';";
               $result3 =$connection->query($sql3);
               $used=mysqli_fetch_assoc($result3)["used"];
               echo "<tr><td>Number of used cars in stock</td><td>$used</td></tr>";	
			   echo "</table>";
			   echo "</center><br>";
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
							 "Mileage: " . $row["mileage"] . "<br>" .
							 "Engine: " . $row["engine"] . "<br>" . 
							 "Transmission: " . $row["transmission"] . "<br>" .
							 "Incentives: " . $row["incentives"] . "<br>" .
							 "Interest Rate: " . $row["interestrate"] . "<br>" .
							 "Down Payment: " . $row["downpayment"] . "<br>" .
							 "</td>" .
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
			echo "</tr>";
             }
			
               echo "</table>";
			   echo "</center>";
			   
               }
               else
               {
               echo "There are no vehicles with this id";
               echo "<h3><a href = 'managerview.php'>Go back to search for another vehicle id</h3></a>";
               }	
              }
			  
 ?>