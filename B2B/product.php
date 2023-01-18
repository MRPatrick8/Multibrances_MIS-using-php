<?php 
include('config.php');
include('session.control.php');

require_once('product.class.php');
$newProduct = new product();

if(!empty($_REQUEST['c']) && $_REQUEST['c']>=4)
	{
	if($_SESSION['cu_type'] != 1){$_REQUEST['c']=0;}	
	} 
	
$productCategory = array(
	1=>"Vodka",
	2=>"Scotch Whisky",
	3=>"Irish Whisky",
	4=>"Wines",
	5=>"London Gin",
	6=>"Cofee Liqueur",
	7=>"Rum",
	8=>"Coconut Liqueur",
	9=>"Cognac",
	10=>"Champagne",
	11=>"Tequila",
	12=>"Pastis",
	13=>"Single Malt Scotch Whisky",
	14=>"Indian Whisky"
	);
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
<link rel="icon" type="image/png" href="images/icon/favicon.ico"/>
<!--===============================================================================================-->
<link rel="apple-touch-icon" sizes="57x57" href="images/icon/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="images/icon/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="images/icon/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="images/icon/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="images/icon/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="images/icon/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="images/icon/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="images/icon/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="images/icon/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="images/icon/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="images/icon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="images/icon/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="images/icon/favicon-16x16.png">
<link rel="manifest" href="images/icon/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="images/icon/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="css/main.css">
<link rel="stylesheet" type="text/css" href="css/product.css">
<!--===============================================================================================-->
<script src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
<!--===============================================================================================-->
<title>Tianis Direct - Promo</title>
<style>
.btn {
	padding: 10px 10px;
	font-size: 14px;
	cursor: pointer;
}
.alertBox {
	padding: 20px;
	background-color: #f44336;
	color: white;
	opacity: 1;
	transition: opacity 0.6s;
	margin-bottom: 15px;
}
.alertBox.success {
	background-color: #4CAF50;
}
.alertBox.info {
	background-color: #2196F3;
}
.alertBox.warning {
	background-color: #ff9800;
}
.closebtn {
	margin-left: 15px;
	color: white;
	font-weight: bold;
	float: right;
	font-size: 22px;
	line-height: 20px;
	cursor: pointer;
	transition: 0.3s;
}
.closebtn:hover {
	color: black;
}
.productImg {
	float: left;
	padding-bottom: 5px;
	padding-top: 5px;
	padding-right: 10px;
}
</style>
</head>
<body>

<!-- Simulate a smartphone / tablet -->
<div class="mobile-container"> 
  
  <!-- Top Navigation Menu -->
  <div class="topnav"> <a href="dashboard.php">Tianis Direct</a>
    <div id="myLinks"> <a href="order.php"><i class="fas fa-receipt"></i>&nbsp;Orders</a> <a href="product.php" class="active"><i class="fas fa-boxes"></i>&nbsp;Products</a> <a href="outlet.php"><i class="fas fa-store-alt"></i>&nbsp;Outlets</a> <a href="user.php"><i class="fas fa-user-cog"></i>&nbsp;Users</a> <a href="diprad.php"><i class="fas fa-ad"></i>&nbsp;Promo</a> </div>
    <a href="javascript:void(0);" class="icon" onclick="myFunction()"> <i class="fa fa-bars"></i>&nbsp;</a> </div>
  <p align="right" class="bText"><strong><i class="fa fa-user-alt"></i>&nbsp;<?php echo $cu_login; ?> (<?php echo $cu_type_name; ?>) | <a href="session.close.php">Logout <i class="fa fa-sign-out-alt"></i></a></strong></p>
  <h3><i class="fas fa-boxes"></i>&nbsp;Products</h3>
  <?php 
	echo $dConfig["info"]; 
	//print_r($dConfig); die();
	if(!empty($_REQUEST['message']))
		{
		$alertColor='success';
		if(strpos($_REQUEST['message'], "nok") !== false){$alertColor='warning';}
		echo '<div class="alertBox '.$alertColor.'">
				<span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span>  
				'.$dConfig["message"][$_REQUEST['message']].
			 '</div>';
		}
		
	if(in_array($_REQUEST['c'], array(2,3,4)))
		{
		if(!empty($_REQUEST['id']))
			{
			$newProduct->getProduct($_REQUEST['id']);
			}				
	?>
  <p>
  
  <form action="product.sql.php?action=<?php echo $_REQUEST['c'];?><?php if(!empty($_REQUEST['id'])){echo "&id=".$_REQUEST['id'];}?>" method="post">
    <div class="_whiteBox" style="padding-top:20px;padding-bottom:5px">
      <input type="hidden" id="txt_id" name="txt_id" value="<?php if(!empty($_REQUEST['id'])){echo $_REQUEST['id'];} ?>" />
      <input type="hidden" name="redirect" value="<?php echo "http://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];?>" />
      <label for="txt_name_product"><b>Product  name</b></label>
      <input type="text" name="txt_name_product" class="formInput" required value="<?php if(!empty($_REQUEST['id'])){echo $newProduct->name_product;} ?>" <?php if($_REQUEST['c']==4){echo 'readonly="1"'; }?>>
      <label for="cbx_category_product"><b>Category</b></label>
      <select name="cbx_category_product" required class="formInput" <?php if($_REQUEST['c']==4){echo 'readonly="1"'; }?>>
        <option></option>
        <option value="1" <?php if(!empty($_REQUEST['id']) && $newProduct->category_product == 1){echo 'selected="selected"';} ?>>Vodka</option>
        <option value="2" <?php if(!empty($_REQUEST['id']) && $newProduct->category_product == 2){echo 'selected="selected"';} ?>>Scotch Whisky</option>
        <option value="3" <?php if(!empty($_REQUEST['id']) && $newProduct->category_product == 3){echo 'selected="selected"';} ?>>Irish Whisky</option>
        <option value="4" <?php if(!empty($_REQUEST['id']) && $newProduct->category_product == 4){echo 'selected="selected"';} ?>>Wines</option>
        <option value="5" <?php if(!empty($_REQUEST['id']) && $newProduct->category_product == 5){echo 'selected="selected"';} ?>>London Gin</option>
        <option value="6" <?php if(!empty($_REQUEST['id']) && $newProduct->category_product == 6){echo 'selected="selected"';} ?>>Cofee Liqueur</option>
        <option value="7" <?php if(!empty($_REQUEST['id']) && $newProduct->category_product == 7){echo 'selected="selected"';} ?>>Rum</option>
        <option value="8" <?php if(!empty($_REQUEST['id']) && $newProduct->category_product == 8){echo 'selected="selected"';} ?>>Coconut Liqueur</option>
        <option value="9" <?php if(!empty($_REQUEST['id']) && $newProduct->category_product == 9){echo 'selected="selected"';} ?>>Cognac</option>
        <option value="10" <?php if(!empty($_REQUEST['id']) && $newProduct->category_product == 10){echo 'selected="selected"';} ?>>Champagne</option>
        <option value="11" <?php if(!empty($_REQUEST['id']) && $newProduct->category_product == 11){echo 'selected="selected"';} ?>>Tequila</option>
        <option value="12" <?php if(!empty($_REQUEST['id']) && $newProduct->category_product == 12){echo 'selected="selected"';} ?>>Pastis</option>
        <option value="13" <?php if(!empty($_REQUEST['id']) && $newProduct->category_product == 13){echo 'selected="selected"';} ?>>Single Malt Scotch Whisky</option>
        <option value="14" <?php if(!empty($_REQUEST['id']) && $newProduct->category_product == 14){echo 'selected="selected"';} ?>>Indian Whisky</option>
      </select>
      <label for="txt_size_product"><b>Size</b></label>
      <input type="text" name="txt_size_product" class="formInput" required value="<?php if(!empty($_REQUEST['id'])){echo $newProduct->size_product;} ?>" <?php if($_REQUEST['c']==4){echo 'readonly="1"'; }?>>
      <label for="txt_carton_product"><b>Carton</b></label>
      <input type="text" name="txt_carton_product" class="formInput" required value="<?php if(!empty($_REQUEST['id'])){echo $newProduct->carton_product;} ?>" <?php if($_REQUEST['c']==4){echo 'readonly="1"'; }?>>
      <label for="txt_serial_product"><b>Serial number</b></label>
      <input type="text" name="txt_serial_product" class="formInput" required value="<?php if(!empty($_REQUEST['id'])){echo $newProduct->serial_product;} ?>" <?php if($_REQUEST['c']==4){echo 'readonly="1"'; }?>>
      <label for="txt_price_ontrade_product"><b>Price on trade</b></label>
      <input type="text" name="txt_price_ontrade_product" class="formInput" required value="<?php if(!empty($_REQUEST['id'])){echo $newProduct->price_ontrade_product;} ?>" <?php if($_REQUEST['c']==4){echo 'readonly="1"'; }?>>
      <label for="txt_price_offtrade_product"><b>Price off trade</b></label>
      <input type="text" name="txt_price_offtrade_product" class="formInput" required value="<?php if(!empty($_REQUEST['id'])){echo $newProduct->price_offtrade_product;} ?>" <?php if($_REQUEST['c']==4){echo 'readonly="1"'; }?>>
      <p>
        <button name="cmd_submit" class="btn" type="submit"><i class="fas fa-save"></i>&nbsp;<?php echo $dConfig["submit"]; ?> Product</button>
        <a href="?c=1">
        <button class="btn" type="button" title="Cancel">Cancel</button>
        </a> </p>
      </p>
    </div>
  </form>
  <?php 
            }
        ?>
  </p>
  <div style="padding:1px">
    <div class="input-group">
      <form class="example" action="?"  method="post">
        <a href="?c=2">
        <button class="btn" title="Add a new record" type="button"><i class="fa fa-plus"></i>&nbsp;New Product</button>
        </a>
        <input name="txt_search" type="text" class="btn" placeholder="Search.." value="<?php if(isset($_REQUEST['txt_search']) && !empty($_REQUEST['txt_search'])){ echo $_REQUEST['txt_search'];}?>" required>
        <button class="btn" type="submit"><i class="fa fa-search"></i></button>
        <?php if(isset($_REQUEST['txt_search']) && !empty($_REQUEST['txt_search'])){ ?>
        <a href="product.php">
        <button class="btn" type="button">View All</button>
        </a>
        <?php }?>
      </form>
    </div>
    </p>
  </div>
  <table width="100%">
    <thead>
      <tr class="table100-head">
        <th class="column1">Product details</th>
        <th class="column5">On Trace Price</th>
        <th class="column6">Off Trade Price</th>
        <th class="column7">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php 
$whereCritere = '';
if(isset($_REQUEST['txt_search']) && !empty($_REQUEST['txt_search']))
	{
	$whereCritere = " name_product = '".$newProduct->formatData($_REQUEST['txt_search'])."' OR serial_product = '".$newProduct->formatData($_REQUEST['txt_search'])."' OR price_ontrade_product = '".$newProduct->formatData($_REQUEST['txt_search'])."' OR price_offtrade_product = '".$newProduct->formatData($_REQUEST['txt_search'])."' OR carton_product = '".$newProduct->formatData($_REQUEST['txt_search'])."' OR login_product = '".$newProduct->formatData($_REQUEST['txt_search'])."' " ;	
	}

$orderByCritere = ' category_product, serial_product, name_product ';
$arrProduct = $newProduct->getAllProduct($whereCritere,$orderByCritere);

if(!empty($arrProduct))
	{
	$i=0; 
	while(!empty($arrProduct[$i]))
		{$k=$i+1; 
?>
      <tr>
        <td class="column1"><img src="images/product/<?php echo $arrProduct[$i]->serial_product; ?>.jpg" height="100" class="productImg"> <?php echo '<br>'. $k .' '. $productCategory[$arrProduct[$i]->category_product].'<br><br><b>'.$arrProduct[$i]->size_product.' '.$arrProduct[$i]->name_product.'</b><br><br>'.$arrProduct[$i]->carton_product.' / '.$arrProduct[$i]->serial_product.'<br><br>'; ?></td>
        <td class="column5"><?php echo $arrProduct[$i]->price_ontrade_product; ?></td>
        <td class="column6"><?php echo $arrProduct[$i]->price_offtrade_product; ?></td>
        <td class="column7"><a href="?c=3&id=<?php echo $arrProduct[$i]->id; ?>">
          <button type="button" name="cmd_submit"><i class="fas fa-pencil-alt"></i>&nbsp;Update</button>
          </a>&nbsp;&nbsp;<a href="?c=4&id=<?php echo $arrProduct[$i]->id; ?>">
          <button type="button" name="cmd_submit"><i class="far fa-trash-alt"></i>&nbsp;Delete</button>
          </a></td>
      </tr>
      <?php
		$i++;
		}
	}
?>
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
