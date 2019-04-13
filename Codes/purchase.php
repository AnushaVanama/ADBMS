<?php 
  session_start(); 
 ?>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Load an icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<head>
<style>
table, th, td {
    border: 0.5px solid #92a8d1;
	text-align: left;
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
<center>
<div class="navbar">
 <a class="active" href="#">Place your Order here</a>
 </div><br>

<?php echo '<form method="post" action="purchase.php?vid='.$_GET['vid'].'">';?>
<center>
<table>
<td>	
           Price: <input type="text" id="price" name="pricerange" ><br></br>
		   Vehicle Id: <input name="vehicleid" value=<?php echo $_GET['vid'];?>><br></br>
		   Customer Name: <input name="username" value=<?php  if (isset($_SESSION['username'])) : ?>
          '<?php echo $_SESSION['username']; ?>'
           <?php endif ?></input><br><br>
           Purchasedate: <input type="date" id="purchasedate" name="purchasedate" ><br></br>
			<h3>Provide Billing Address</h3>
            <label for="adr"><i class="fa fa-address-card-o"></i>Address: </label>
            <input type="text" id="adr" name="address" ><br><br>
            <label for="city"><i class="fa fa-institution"></i>City: </label>
            <input type="text" id="city" name="city" ><br><br>
         State: <input type="text" id="state" name="state" ><br></br>
          Zip: <input type="text" id="zip" name="zip" ><br></br>
            <h3>Payment</h3>
            <label for="fname">Accepted Cards</label>
              <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-amex" style="color:blue;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
              <i class="fa fa-cc-discover" style="color:orange;"></i>
            </div>
         Name on Card: <input type="text" id="cname" name="cardname" ><br></br>
   Credit card number: <input type="text" id="ccnum" name="cardnumber" ><br></br>
            Exp Month: <input type="text" id="expmonth" name="expmonth" ><br></br>
             Exp Year: <input type="text" id="expyear" name="expyear" ><br></br>
               CVV: <input type="text" id="cvv" name="cvv"><br><br>
        <center><input type="submit" value="confirm your payment" class="btn"></center>
	</td>
    </table>
	</center>
	</form>
</body>
</html>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cardealership";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['pricerange']) && 
isset($_POST['vehicleid']) && 
isset($_POST['username']) &&
isset($_POST['purchasedate']) && 
isset($_POST['address']) &&
 isset($_POST['city']) &&
 isset($_POST['state']) &&
 isset($_POST['zip']) && 
 isset($_POST['cardname']) && 
  isset($_POST['cardnumber']) && 
 isset($_POST['expmonth']) && 
  isset($_POST['expyear']) && 
 isset($_POST['cvv']))
               {
			   $pricerange = $_POST['pricerange'];
			   $vehicleid = $_POST['vehicleid'];
			   $username = $_POST['username'];
               $purchasedate = $_POST['purchasedate'];
			   $address = $_POST['address'];			  
			   $city = $_POST['city'];
			   $state = $_POST['state'];
			   $zip = $_POST['zip'];
			   $cardname = $_POST['cardname'];
			   $cardnumber = $_POST['cardnumber'];
			   $expmonth = $_POST['expmonth'];
			   $expyear = $_POST['expyear'];
			   $cvv = $_POST['cvv'];
			   
			   $sql = "INSERT INTO purchase(pricerange,vehicle_id,username,purchasedate,address,city,state,zip,cardname,cardnumber,expmonth,expyear,cvv) 
               VALUES('$pricerange','$vehicleid','$username','$purchasedate','$address','$city','$state','$zip','$cardname','$cardnumber','$expmonth','$expyear','$cvv')";
			   

   if ($conn->query($sql) === TRUE) {
    echo "Your purchase has been made successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
	}
	else
	{
   echo "<br><h2><center></center></h2>";
	}
			  
	?> 

