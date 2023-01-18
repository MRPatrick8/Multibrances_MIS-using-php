<?php 
include('config.php');
include('session.control.php');

require_once('order.class.php');
$newOrder = new order();
$newOrderDetails = new order();

require_once('outlet.class.php');
$newOutlet = new outlet();

require_once('user.class.php');
$newUser = new user();

if(!empty($_REQUEST['c']) && $_REQUEST['c']>=4)
	{
	if($_SESSION['cu_type'] != 1){$_REQUEST['c']=0;}	
	} 
	
$userType = array(
	1=>"Supervisor",
	2=>"Delivery Staff",
	3=>"Business Developer"
	);
	
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
<link rel="icon" type="image/png" href="images/icon/favicon-96x96.png"/>
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="css/main.css">
<link rel="stylesheet" type="text/css" href="css/order.css">
<!--===============================================================================================-->
<script src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
<!--===============================================================================================-->
<title>Tianis Direct - Orders</title>
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
</style>
</head>
<body>

<!-- Simulate a smartphone / tablet -->
<div class="mobile-container"> 
  
  <!-- Top Navigation Menu -->
  <div class="topnav"> 
  <a href="<?php if(!$cu_is_outlet){ ?>dashboard.php<?php } else {echo "order.bulk.php";}?>">Tianis Direct</a>
    <?php if(!$cu_is_outlet){ ?>
        <div id="myLinks"> 
        <a href="order.php" class="active"><i class="fas fa-receipt"></i>&nbsp;Orders</a> 
        <a href="product.php"><i class="fas fa-boxes"></i>&nbsp;Products</a> 
        <a href="outlet.php"><i class="fas fa-store-alt"></i>&nbsp;Outlets</a> 
        <a href="user.php"><i class="fas fa-user-cog"></i>&nbsp;Users</a> 
        <a href="diprad.php"><i class="fas fa-ad"></i>&nbsp;Promo</a> 
        </div>
    <a href="javascript:void(0);" class="icon" onclick="myFunction()"> <i class="fa fa-bars"></i>&nbsp;</a> 
	<?php }?>
  </div>
  <p align="right" class="bText"><strong><i class="fa fa-user-alt"></i>&nbsp;<?php echo $cu_login; ?> (<?php echo $cu_type_name; ?>) | <a href="session.close.php">Logout <i class="fa fa-sign-out-alt"></i></a></strong></p>
  <h3><i class="fas fa-receipt"></i>&nbsp;Orders</h3>
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
			$newOrder->getOrder($_REQUEST['id']);
			}				
	?>
  <p>
    <?php 
            }
        ?>
  </p>
  <div style="padding:1px">
    <div class="input-group">
      <form class="example" action="?">
        <a href="order.bulk.php">
        <button class="btn" title="New Order" type="button"><i class="fa fa-plus"></i>&nbsp;New Order</button>
        </a>
        <input name="txt_search" type="text" class="btn" placeholder="Search.." value="<?php if(isset($_REQUEST['txt_search']) && !empty($_REQUEST['txt_search'])){ echo $_REQUEST['txt_search'];}?>" required width="50%">
        <button class="btn" type="submit"><i class="fa fa-search"></i></button>
        <?php if(isset($_REQUEST['txt_search']) && !empty($_REQUEST['txt_search'])){ ?>
        <a href="user.php">
        <button class="btn" type="button">View All</button>
        </a>
        <?php }?>
      </form>
    </div>
  </div>
  <br>
  <table width="100%" cellpadding="10" cellspacing="0" bgcolor="#FFFFFF">
      <?php 
$whereCritere = '';

if($cu_is_outlet){ $whereCritere = " id_outlet = '".$cu_id."' "; }

if(isset($_REQUEST['txt_search']) && !empty($_REQUEST['txt_search']))
	{
	$whereCritere = " AND ( firstname_user = '".$newUser->formatData($_REQUEST['txt_search'])."' OR lastname_user = '".$newUser->formatData($_REQUEST['txt_search'])."' OR phone_user = '".$newUser->formatData($_REQUEST['txt_search'])."' OR email_user = '".$newUser->formatData($_REQUEST['txt_search'])."' OR login_user = '".$newUser->formatData($_REQUEST['txt_search'])."' ) " ;	
	}
$orderByCritere = ' date_order DESC';
$arrOrder = $newOrder->getAllOrder($whereCritere,$orderByCritere);

if(!empty($arrOrder))
	{
	$i=0; 
	while(!empty($arrOrder[$i]))
		{ 
?>
      <tr>
        <td class="column3"><table width="100%" cellpadding="5" cellspacing="0">
            <tr>
              <td colspan="2"><strong><i class="fas fa-receipt"></i>&nbsp;REF: </strong><?php echo '#'.str_pad($arrOrder[$i]->id, 4, 0, STR_PAD_LEFT);?></td>
            </tr>
            <tr>
              <td colspan="2"><strong><i class="far fa-calendar-alt"></i>&nbsp;Date: </strong> <?php echo $arrOrder[$i]->date_order; ?></td>
            </tr>
            <tr>
              <td colspan="2"><strong><i class="fas fa-store-alt"></i>&nbsp;Outlet: </strong> 
			  <?php 
			  $newOutlet->getOutlet($arrOrder[$i]->id_outlet);
			  
			  echo $newOutlet->location_outlet.' - '.$newOutlet->name_outlet.' ('.$newOutlet->type_outlet.')'; ?></td>
            </tr>
            <tr>
              <td colspan="2"><strong><i class="fa fa-user-alt"></i>&nbsp;Sender: </strong> 
              <?php 
                if($arrOrder[$i]->id_user>0)
					{
					$newUser->getUser($arrOrder[$i]->id_user);
					echo $newUser->login_user.' ('.$userType[$newUser->type_user].')'; 
					}
                else
                	{
					echo 'Self';
					}
			  ?></td>
            </tr>
            <?php //echo nl2br($arrOrder[$i]->details_order); ?>
            <?php 
			$whereCritere = " id_order = '".$arrOrder[$i]->id."' ";
			$orderByCritere = " name_product ";
			$arrOrderDetails = $newOrderDetails->getAllOrderDetails($whereCritere,$orderByCritere);
			
			if(!empty($arrOrderDetails))
				{
				$k=0; 
				$total_order = 0;
				while(!empty($arrOrderDetails[$k]))
					{ 
					$price_display = $arrOrderDetails[$k]->price_offtrade_product;
					if($newOutlet->type_outlet == 'Ontrade')
						{
						$price_display = $arrOrderDetails[$k]->price_ontrade_product;
						}
					$total_order += $price_display;
					echo '<tr class="top row">
					<td>'.$arrOrderDetails[$k]->quantity_ordered.' X '.$arrOrderDetails[$k]->size_product.' '.$arrOrderDetails[$k]->name_product.'</td><td align="right">'.$price_display.'</td>
					</tr>';
					
					$k++;
					}
				}
			?>
            <tr class="top bottom row" bgcolor="#f1f1f1">
              <td><strong>Payable</strong></td>
              <td align="right"><strong><?php echo $total_order; ?></strong></td>
            </tr>
          </table>
          <br>
          <form method="post" action="?">
          <!--<textarea rows="3" placeholder="Add a comment" class="btn"></textarea>
          <br>-->
          <?php if($cu_is_outlet) { ?>
          <button class="btn" type="button">Send order on WhatsApp</button>
          <!--Served by: ????????-->
          <?php } else { ?>
          <strong>Order status: 
          </strong>
          <select name="cbx_status_order">
            <option>Pending</option>
            <option>In progress</option>
            <option>Delivered</option>
          </select>
          <a href="#"><button type="submit" name="cmd_submit"><i class="fas fa-save"></i>&nbsp;Save</button></a>
          <?php }?>
          <?php if($cu_type == 1) {?>
		  <a href="order.sql.php?cmd_submit=1&action=4<?php echo '&txt_id='.$arrOrder[$i]->id; ?>"><button type="submit" name="cmd_submit"><i class="far fa-trash-alt"></i>&nbsp;Delete</button></a>
		  <?php } ?>
          </form>
          <br>
        </td>
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
