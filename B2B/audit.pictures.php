<?php 
include('config.php');
include('session.control.php');

if(!empty($_REQUEST['c']) && $_REQUEST['c']>=4)
	{
	if($_SESSION['cu_type'] != 1){$_REQUEST['c']=0;}	
	} 

?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
<link rel="icon" type="image/png" href="images/icon/favicon-96x96.png"/>
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
<script src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
<!--===============================================================================================-->
<title>Tianis Direct</title>
<style>
.btn {
	padding: 10px 10px;
	font-size: 14px;
	cursor: pointer;
}
/*.map-responsive{
    overflow:hidden;
    padding-bottom:56.25%;
    position:relative;
    height:0;
}
.map-responsive iframe{
    left:0;
    top:0;
    height:100%;
    width:100%;
    position:absolute;
}*/
</style>
</head>
<body>

<!-- Simulate a smartphone / tablet -->
<div class="mobile-container"> 
  
  <!-- Top Navigation Menu -->
  <div class="topnav"> <a href="dashboard3.php">Tianis Direct</a>
    <div id="myLinks"> <a href="order.php"><i class="fas fa-receipt"></i>&nbsp;Orders</a> <a href="product.php"><i class="fas fa-boxes"></i>&nbsp;Products</a> <a href="outlet.php" class="active"><i class="fas fa-store-alt"></i>&nbsp;Outlets</a>
      <?php if($cu_type==1){ ?>
      <a href="user.php"><i class="fas fa-user-cog"></i>&nbsp;Users</a>
      <?php } ?>
      <a href="diprad.php"><i class="fas fa-ad"></i>&nbsp;Promo</a> </div>
    <a href="javascript:void(0);" class="icon" onclick="myFunction()"> <i class="fa fa-bars"></i>&nbsp;</a> </div>
  <div style="padding:1px">
    <p align="right" class="bText"><strong><i class="fa fa-user-alt"></i>&nbsp;<?php echo $cu_login; ?> (<?php echo $cu_type_name; ?>) | <a href="session.close.php">Logout <i class="fa fa-sign-out-alt"></i></a></strong></p>
    <h3><strong><i class="fas fa-images"></i>&nbsp;Upload pictures of Sawa Citi</strong></h3>
    <div class="_whiteBox">
      <p align="right"><a href="outlet.gps.php?id=2"><i class="fas fa-map-marker-alt"></i>&nbsp;Update GPS</a>&nbsp;&nbsp;&nbsp;<a href="audit.brands.all.php?id=2"><i class="far fa-comments"></i>&nbsp;Survey</a>&nbsp;&nbsp;&nbsp;<a href="order.bulk.php?id=2"><i class="fas fa-receipt"></i>&nbsp;New order</a></p>
      <p>Available pictures</p>
      <table width="100%" border="0" cellpadding="2" cellspacing="0">
        <tr>
          <td align="center"><i class="far fa-image" style="font-size:72px"></i></td>
          <td align="center"><i class="far fa-image" style="font-size:72px"></i></td>
          <td align="center"><i class="far fa-image" style="font-size:72px"></i></td>
        </tr>
      </table>
    </div>
    <br>
    <div class="_whiteBox">
      <form name="form" id="form">
        <h3><i class="fas fa-images"></i>&nbsp;<strong>Add new menu, table talkers, signage or outlet pictures</strong></h3>
        <p>
          <label for="fileField"><i class="far fa-image"></i></label>
          <input type="file" name="fileField" id="fileField" value="Select the file to import">
        </p>
        <p>
          <label for="fileField"><i class="far fa-image"></i></label>
          <input type="file" name="fileField" id="fileField" value="Select the file to import">
        </p>
        <p>
          <button class="btn" type="button" title="Cancel"><i class="fas fa-save"></i>&nbsp;Upload</button>
          <a href="audit.map.php">
          <button class="btn" type="button" title="Cancel">Cancel</button>
          </a>
        </p>
      </form>
    </div>
    <br>
    </p>
  </div>
  <p align="center" class="">Copyright &copy; 2020. All rights reserved</p>
  <br>
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
</div>
<!-- End smartphone / tablet look -->
</div>
</body>
</html>
