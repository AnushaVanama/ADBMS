<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Load an icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<head>
<style>
table, td, th {
    border: 1px solid black;
	  border-collapse: collapse;
}
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
</head>
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
			   
			   $query_condition = "";
			   if($condition != "cond") { $query_condition = " type =" . "'$condition'"; }
			   if($make != "mk") { $query_condition = $query_condition . " and make =" . "'$make'"; }
			   if($model != "mdl") { $query_condition = $query_condition . " and model =" . "'$model'"; }
			   if($color != "clr") { $query_condition = $query_condition . " and color =" . "'$color'"; }
			    
			//echo $query_condition;
			   
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
			   if($price != "pr") { $query_condition = $query_condition . " and price >=" . "'$lowval'" . " and price <=" . "'$highval'"; }
			   
			   $arr = explode(' ',trim($query_condition));
			   if($arr[0] == 'and')
			   {
				   $query_condition = substr(strstr($query_condition," "),5);
			   }
			   if($query_condition == "") $sql = "SELECT * FROM CarInformation;";
			   else $sql = "SELECT * FROM CarInformation WHERE". " $query_condition;";
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
			
			echo '<td> <form action="login1.php" method="get">';
            echo '<button name="purchasingvid" type="submit" value='.$row["vehicle_id"].'>Purchase</button> </form> </td>';
    
			
			echo "</tr>";
			
			
			
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
</body>
</html>