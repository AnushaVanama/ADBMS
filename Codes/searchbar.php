<html>
<head>
<style>
table, th, td {
    border: 1px solid black;
}
</style>
</head>
</html>
<?php

session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cardealership";

// Create connection

$connection = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed");
	   
               if (isset($_GET['searchterms']))
               {
               $vid = $_GET['searchterms'];
               $sql = "select * from CarInformation where vehicle_id='$vid';";
               $res = mysqli_query($connection, $sql) or die("Query Failed: $sql");
               if ($res->num_rows > 0)
               {
               echo "Results for vehicle id  '$vid'";
               echo "<table><tr><th>vehicle_id</th><th>make</th><th>model</th><th>year</th><th>color</th><th>price</th><th>yearaddedtoinventory</th>
			   <th>type</th><th>mileage</th>
			   </tr>";
               while ($row = mysqli_fetch_assoc($res))
               {
               echo "<tr><td>" . $row["vehicle_id"] . "</td><td>" . $row["make"] . "</td><td>" . $row["model"] . "</td><td>" . $row["year"] . "</td><td>" . $row["color"] . "</td><td>" . $row["price"] . "</td><td>" . $row["yearaddedtoinventory"] . "</td><td>" . $row["type"] . "</td><td>" . $row["mileage"] . "</td></tr>";
               }
               
               echo "</table>";
               }
               else
               {
               echo "There are no vehicles with this id";
               echo "<h3><a href = 'index.php'>Go back to search for another vehicle id</h3></a>";
               }	
               }
 ?>