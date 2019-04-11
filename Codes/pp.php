<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Load an icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<head>
<style>
table, th, td {
    border: 1px solid black;
	text-align: left;
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

    <div class="input-group">
  	  <label>Purchase ID</label>
  	  <input type="text" name="purchaseid" ><br></br>
  	</div>
	<div class="input-group">
  	  <label>Cid</label>
  	  <input type="text" name="cid"  ><br></br>
  	</div>
	
	
	<div class="input-group">
  	  <label>Mid</label>
  	  <input type="text" name="mid" ><br></br>
  	</div>
	
	<div class="input-group">
  	  <label>vehicle_id</label>
  	  <input type="text" name="vehicle_id" ><br></br>
  	</div>
	
	<div class="input-group">
  	  <label>purchasedate</label>
  	  <input type="date" name="purchasedate" ><br></br>
  	</div>
	
	<div class="input-group">
  	  <label>Shipping Address</label>
  	  <input type="text" name="shippingaddress" ><br></br>
  	</div>
	<div class="input-group">
  	  <label>Purchase status</label>
  	  <input type="text" name="purchasestatus" ><br></br>
  	</div>
	
	<div class="input-group">
  	  <label>price</label>
  	  <input type="text" name="price" ><br></br>
  	</div>
	
	<div class="input-group">
  	  <label>Payment Method</label>
	  <input type="radio" name="paymentmethod" value="credit card">creditcard<br>
	   <input type="radio" name="paymentmethod" value="debit card"> debitcard<br></br>
  	</div>
	
	</td>
	</center>
	</table>
	
	</form>
</body>
</html>