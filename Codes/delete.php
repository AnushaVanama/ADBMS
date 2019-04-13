<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Load an icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<head>
<style>
table, td {
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
</html>

<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cardealership";
// Create connection
$connection = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed");
$sql = "select vehicle_id from purchase where status ='In process';";
$res = mysqli_query($connection, $sql) or die("Query Failed: $sql");
               if ($res->num_rows > 0)
               {
				   while ($row = mysqli_fetch_assoc($res))
				   {
				    $x = $row["vehicle_id"];
					$sql1 = "delete from CarInformation where vehicle_id ='$x';";
                    $res1 = mysqli_query($connection, $sql1) or die("Query Failed: $sql1");
					$sql2 = "update purchase set status = 'Shipped' where vehicle_id ='$x' ;";
                    $res2 = mysqli_query($connection, $sql2) or die("Query Failed: $sql2");
				 
				   }
				 echo "All the purchased cars are shipped";
				
			   }	   
			   
				   
?>