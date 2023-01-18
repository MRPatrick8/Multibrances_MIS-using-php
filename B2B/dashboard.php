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
<title>Tianis Direct - Dashboard</title>
</head>
<body>

<!-- Simulate a smartphone / tablet -->
<div class="mobile-container"> 
  
  <!-- Top Navigation Menu -->
  <div class="topnav"> <a href="dashboard.php" class="active">Tianis Direct</a>
    <div id="myLinks"> <a href="order.php"><i class="fas fa-receipt"></i>&nbsp;Orders</a> <a href="product.php"><i class="fas fa-boxes"></i>&nbsp;Products</a> <a href="outlet.php"><i class="fas fa-store-alt"></i>&nbsp;Outlets</a>
      <?php if($cu_type==1){ ?>
      <a href="user.php"><i class="fas fa-user-cog"></i>&nbsp;Users</a>
      <?php } ?>
      <a href="diprad.php"><i class="fas fa-ad"></i>&nbsp;Promo</a> </div>
    <a href="javascript:void(0);" class="icon" onclick="myFunction()"> <i class="fa fa-bars"></i>&nbsp;</a> </div>
  <div>
    <p align="right" class="bText"><strong><i class="fa fa-user-alt"></i>&nbsp;<?php echo $cu_login; ?> (<?php echo $cu_type_name; ?>) | <a href="session.close.php">Logout <i class="fa fa-sign-out-alt"></i></a></strong></p>
    <p style="padding-top:10px;">Below is your dashboard and a list of tasks you can perform</p>
    <div class="_whiteBox">
      <h3><i class="fas fa-receipt"></i>&nbsp;Orders</h3>
      <p><a href="order.bulk.php"><i class="fas fa-plus"></i>&nbsp;Place an order
        <?php if(!$cu_is_outlet){  ?>
        on behalf of a client
        <?php }?>
        </a></p>
      <p><a href="order.php"><i class="fas fa-pencil-alt"></i>&nbsp;Confirm delivered orders (2)</a></p>
      <?php if($cu_type==1){ ?>
      <p class="redText"><a href="#"><i class="far fa-trash-alt"></i>&nbsp;Pending orders for more than 3 hours (1)</a></p>
      <?php } ?>
      <p><a href="#"><i class="far fa-user"></i>&nbsp;Today served orders (5)</a></p>
      <p><a href="#"><i class="far fa-calendar-check"></i>&nbsp;Orders served in last 7 days (13)</a></p>
    </div>
    <?php if($cu_type==1 || $cu_type==2){ ?>
    <div class="_whiteBox">
      <h3><i class="fas fa-boxes"></i>&nbsp;Products</h3>
      <p><a href="product.php?c=2"><i class="fas fa-plus"></i>&nbsp;Add new product</a></p>      
      <p><a href="product.php"><i class="fas fa-tag"></i>&nbsp;Manage products and their prices (15)</a></p>
      <p><i class="far fa-user"></i>&nbsp;Manage product categories</p>
      <p><a href="diprad.php?c=2"><i class="fas fa-ad"></i>&nbsp;Manage discounts, promo & ads</a></p>
    </div>
    <?php } ?>
    <div class="_whiteBox">
      <h3><i class="fas fa-store-alt"></i>&nbsp;Outlets</h3>
      <p><a href="outlet.php?c=2"><i class="fas fa-plus"></i>&nbsp;Add a new outlet</a></p>
      <p><i class="fas fa-arrow-right"></i>&nbsp;<a href="outlet.php">Manage outlets</a> (<a href="#">15</a>)</p>
      <p><i class="far fa-user"></i>&nbsp;<a href="outlet.user.php">Assign staff to outlet</a> </p>
      <p><a href="#"><i class="fas fa-file-import"></i>&nbsp;Import outlets</a></p>
      <p><i class="fas fa-key"></i>&nbsp;Generate and send passcode to outlet agent</p>
      <p><i class="fas fa-map-marker-alt"></i>&nbsp;View outlets on map </p>
    </div>
    <div class="_whiteBox">
      <h3><i class="far fa-comments"></i>&nbsp;Business Developer</h3>
      <p><a href="outlet.user.php"><i class="far fa-user"></i>&nbsp;User call cycles setting</a></p>
      <p><a href="audit.map.php"><i class="fas fa-plus"></i>&nbsp;Start a new audit from a map</a></p>
      <p><a href="audit.report.php"><i class="fas fa-print"></i>&nbsp;Brand availability report</a></p>
      <p><a href="audit.calendar.php"><i class="far fa-calendar-alt"></i>&nbsp;Call cycle calendar</a></p>
    </div>
    <?php if($cu_type==1){ ?>
    <div class="_whiteBox" style="padding-top:2px">
      <h3><i class="fas fa-user-cog"></i>&nbsp;Users</h3>
      <p><i class="fas fa-plus"></i>&nbsp;<a href="user.php?c=2">Add new user</a></p>
      <p><i class="fas fa-arrow-right"></i>&nbsp;<a href="user.php">Manage users</a> (<a href="#">15</a>)</p>
      <p><i class="far fa-user"></i>&nbsp;View outlets by users</p>
    </div>
    <?php } ?>
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
