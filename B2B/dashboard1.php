<?php 
include('config.php');
include('session.control.php');

?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
<link rel="icon" type="image/png" href="images/icon/favicon-96x96.png"/>
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="css/main.css">
<link rel="stylesheet" type="text/css" href="css/client.css">
<!--===============================================================================================-->
<script src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
<!--===============================================================================================-->
<title>Tianis Direct</title>
</head>
<body>

<!-- Simulate a smartphone / tablet -->
<div class="mobile-container"> 
  
  <!-- Top Navigation Menu -->
  <div class="topnav"> 
  <a href="dashboard.php" class="active">Tianis Direct</a>
    <div id="myLinks"> 
    <a href="order.php"><i class="fas fa-receipt"></i>&nbsp;Orders</a>
    <a href="product.php"><i class="fas fa-boxes"></i>&nbsp;Products</a> 
    <a href="outlet.php"><i class="fas fa-store-alt"></i>&nbsp;Outlets</a> 
    <?php if($cu_type==1){ ?>
    	<a href="user.php"><i class="fas fa-user-cog"></i>&nbsp;Users</a>
    <?php } ?>
    <a href="diprad.php"><i class="fas fa-ad"></i>&nbsp;Promo</a>  
    </div>
    <a href="javascript:void(0);" class="icon" onclick="myFunction()"> <i class="fa fa-bars"></i>&nbsp;</a> 
  </div>
  <div style="padding:1px">
    <p align="right" class="bText"><strong><i class="fa fa-user-alt"></i>&nbsp;<?php echo $cu_login; ?> (<?php echo $cu_type_name; ?>) | <a href="session.close.php">Logout <i class="fa fa-sign-out-alt"></i></a></strong></p>
  	<p style="padding-top:10px;">Below is your dashboard and a list of tasks you can perform</p>
    
    <div class="_whiteBox">
      <h3>Brands</h3>
      <p><i class="fas fa-tag"></i>&nbsp;All Brands and their prices</p>
      <p><i class="fas fa-ad"></i>&nbsp;My discounts, promo & ads</p>
    </div>
    <br>
    <div class="_whiteBox">
      <h3><i class="fas fa-receipt"></i>&nbsp;Orders</h3>
      <p><a href="order.bulk.php"><i class="fas fa-plus"></i>&nbsp;Place a new order</a></p>
      <p><i class="far fa-user"></i>&nbsp;My orders placed today </p>
      <p><i class="far fa-calendar-check"></i>&nbsp;Orders made in the last 7 days (13)</p>
    </div>
    <br>
    <p align="center" class="">Copyright &copy; 2020. All rights reserved</p>
    <br>
  </div>
  <!-- End smartphone / tablet look --> 
</div>
<script>
function myFunction() {
  var x = document.getElementById("myLinks");
  if(x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
}
</script>
</body>
</html>
