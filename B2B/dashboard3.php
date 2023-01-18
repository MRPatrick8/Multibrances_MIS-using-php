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
    <a href="product.php"><i class="fas fa-boxes"></i>&nbsp;Products</a> 
    <a href="diprad.php"><i class="fas fa-ad"></i>&nbsp;Promo</a>  </div>
    <a href="javascript:void(0);" class="icon" onclick="myFunction()"> <i class="fa fa-bars"></i>&nbsp;</a> </div>
  <div style="padding:1px">
    <h3><strong>Welcome <?php echo $cu_login; ?> (<?php echo $cu_type_name; ?>)</strong></h3>
    <p style="padding-top:10px;">Below is your dashboard and a list of tasks you can perform</p>
    
<!--<div class="_whiteBox">
      <h3>My Brand</h3>
      <p><i class="fas fa-tag"></i>&nbsp;All Brands and their prices</p>
      <p><a href="#"><i class="fas fa-ad"></i>&nbsp;Discounts, promo & ads</a></p>
    </div>
    <br>--> 
   <div class="_whiteBox">
      <h3><i class="far fa-comments"></i>&nbsp;Business Developper</h3>
      <p><a href="outlet.user.php"><i class="far fa-user"></i>&nbsp;User call cycles setting</a></p>
      <p><a href="audit.map.php"><i class="fas fa-plus"></i>&nbsp;Start a new audit from a map</a></p>
      <p><a href="audit.report.php"><i class="fas fa-print"></i>&nbsp;Brand availability report</a></p>
      <p><a href="audit.calendar.php"><i class="far fa-calendar-alt"></i>&nbsp;Call cycle calendar</a></p>
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
