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
<link rel="stylesheet" type="text/css" href="css/client.css">
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

</style>
</head>
<body>

<!-- Simulate a smartphone / tablet -->
<div class="mobile-container"> 
  
  <!-- Top Navigation Menu -->
  <div class="topnav"> 
  	<a href="dashboard.php">Tianis Direct</a>
    <div id="myLinks"> 
    	<a href="order.php"><i class="fas fa-receipt"></i>&nbsp;Orders</a> 
    	<a href="product.php"><i class="fas fa-boxes"></i>&nbsp;Products</a> 
        <a href="outlet.php"><i class="fas fa-store-alt"></i>&nbsp;Outlets</a> 
    	<?php if($cu_type==1){ ?><a href="user.php"><i class="fas fa-user-cog"></i>&nbsp;Users</a><?php } ?> 
        <a href="diprad.php" class="active"><i class="fas fa-ad"></i>&nbsp;Promo</a> 
    </div>
    <a href="javascript:void(0);" class="icon" onclick="myFunction()"> <i class="fa fa-bars"></i>&nbsp;</a>
  </div>
  <div style="padding:1px">
    <p align="right" class="bText"><strong><i class="fa fa-user-alt"></i>&nbsp;<?php echo $cu_login; ?> (<?php echo $cu_type_name; ?>) | <a href="session.close.php">Logout <i class="fa fa-sign-out-alt"></i></a></strong></p>
    <h3><i class="fas fa-ad"></i>&nbsp;Discounts, Promo &amp; Ads</h3>
    
    <p>
    <div class="input-group">
        <form class="example" action="#">
          <a href="#">
          <button class="btn" title="Add a new record" type="button"><i class="fa fa-plus"></i>&nbsp;New Discount</button></a>
          <input name="search" type="text" class="btn" placeholder="Search..">
          <button class="btn" type="submit"><i class="fa fa-search"></i></button>
        </form>
      </div>
    </div>
    </p>
    <table width="100%">
      <thead>
        <tr class="table100-head">
          <th class="column1">Promo</th>
          <th class="column2">Period</th>
          <th class="column6">Action</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td class="column1">P1</td>
          <td class="column2">20201101 -20201205          </td>
          <td class="column6"><a href="#"><i class="fas fa-pencil-alt"></i></a>&nbsp;&nbsp;<a href="#"><i class="far fa-trash-alt"></i></a></td>
        </tr>
        <tr>
          <td class="column1">P2</td>
          <td class="column2">20201101 - 20210131</td>
          <td class="column6"><a href="#"><i class="fas fa-pencil-alt"></i></a>&nbsp;&nbsp;<a href="#"><i class="far fa-trash-alt"></i></a></td>
        </tr>
      </tbody>
    </table>
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
