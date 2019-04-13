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
 </div>

<form method="post" action="purchase.php">
<table>
<center>
<td>

    <div class="row">
  <div class="col-75">
    <div class="container">
        <div class="row">
          <div class="col-50">
            <label for="price">price</label><br></br>
            <input type="text" id="price" name="pricerange" ><br></br>
						
           <label for="vehicleid"> Vehicle Id </label><br></br>
		  <input type="text"  name="vehicleid" id="vehicleid"/><br></br>
		  

			<label for="purchasedate"> purchasedate</label><br></br>
            <input type="date" id="purchasedate" name="purchasedate" ><br></br>
            
			<h3>provide Billing Address</h3>
            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
            <input type="text" id="adr" name="address" ><br><br></br>
            <label for="city"><i class="fa fa-institution"></i> City</label>
            <input type="text" id="city" name="city" ><br><br></br>

            <div class="row">
              <div class="col-50">
                <label for="state">State</label>
                <input type="text" id="state" name="state" ><br></br>
              </div>
              <div class="col-50">
                <label for="zip">Zip</label>
                <input type="text" id="zip" name="zip" ><br></br>
              </div>
            </div>
          </div>

          <div class="col-50">
            <h3>Payment</h3>
            <label for="fname">Accepted Cards</label>
            <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-amex" style="color:blue;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
              <i class="fa fa-cc-discover" style="color:orange;"></i>
            </div>
            <label for="cname">Name on Card</label><br></br>
            <input type="text" id="cname" name="cardname" ><br></br>
            <label for="ccnum">Credit card number</label><br></br>
            <input type="text" id="ccnum" name="cardnumber" ><br></br>
            <label for="expmonth">Exp Month</label><br></br>
            <input type="text" id="expmonth" name="expmonth" ><br></br>

            <div class="row">
              <div class="col-50">
                <label for="expyear">Exp Year</label>
                <input type="text" id="expyear" name="expyear" ><br></br>
              </div>
              <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" >
              </div>
            </div>
          </div>

        </div>
        <label>
          <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
        </label><br>
        <input type="submit" value="confirm your payment" class="btn">
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
			   
			   $sql = "INSERT INTO purchase(pricerange,vehicle_id,purchasedate,address,city,state,zip,cardname,cardnumber,expmonth,expyear,cvv) 
               VALUES('$pricerange','$vehicleid','$purchasedate','$address','$city','$state','$zip','$cardname','$cardnumber','$expmonth','$expyear','$cvv')";
			   

   if ($conn->query($sql) === TRUE) {
    echo "Your purchase has been made successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
	}
	else
	{
   echo "<br><h2><center>Enter all values</center></h2>";
	}
			  
	?> 

