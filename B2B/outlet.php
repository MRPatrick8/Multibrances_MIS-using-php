<?php 
include('config.php');
include('session.control.php');

require_once('outlet.class.php');
$newOutlet = new outlet();

if(!empty($_REQUEST['c']) && $_REQUEST['c']>=4)
	{
	if($_SESSION['cu_type'] != 1){$_REQUEST['c']=0;}	
	} 
	
$outletType = array(
	1=>"On Trade Hotel",
	2=>"On Trade Restaurant",
	3=>"On Trade High Energy Bar",
	4=>"On Trade Low Energy Bar",
	5=>"On Trade NightClub",
	6=>"Off Trade Supermarket",
	7=>"Off Trade Liquor Store",
	8=>"Off Trade Wholesaler",
	9=>"On Trade",
	10=>"Off Trade"
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
<link rel="stylesheet" type="text/css" href="css/outlet.css">
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
  <div class="topnav"> <a href="dashboard.php">Tianis Direct</a>
    <div id="myLinks"> <a href="order.php"><i class="fas fa-receipt"></i>&nbsp;Orders</a> <a href="product.php"><i class="fas fa-boxes"></i>&nbsp;Products</a> <a href="outlet.php" class="active"><i class="fas fa-store-alt"></i>&nbsp;Outlets</a> <a href="user.php"><i class="fas fa-user-cog"></i>&nbsp;Users</a> <a href="diprad.php"><i class="fas fa-ad"></i>&nbsp;Promo</a> </div>
    <a href="javascript:void(0);" class="icon" onclick="myFunction()"> <i class="fa fa-bars"></i>&nbsp;</a> </div>
  <p align="right" class="bText"><strong><i class="fa fa-user-alt"></i>&nbsp;<?php echo $cu_login; ?> (<?php echo $cu_type_name; ?>) | <a href="session.close.php">Logout <i class="fa fa-sign-out-alt"></i></a></strong></p>
  <h3><i class="fas fa-store-alt"></i>&nbsp;Outlets</h3>
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
			$newOutlet->getOutlet($_REQUEST['id']);
			}				
	?>
  <p>
  
  <form action="outlet.sql.php?action=<?php echo $_REQUEST['c'];?><?php if(!empty($_REQUEST['id'])){echo "&id=".$_REQUEST['id'];}?>" method="post">
    <div class="_whiteBox" style="padding-top:20px;padding-bottom:5px">
      <input type="hidden" id="txt_id" name="txt_id" value="<?php if(!empty($_REQUEST['id'])){echo $_REQUEST['id'];} ?>" />
      <input type="hidden" name="redirect" value="<?php echo "http://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];?>" />
      <label for="txt_name_outlet"><b>Company name</b></label>
      <input type="text" name="txt_name_outlet" class="formInput" required value="<?php if(!empty($_REQUEST['id'])){echo $newOutlet->name_outlet;} ?>" <?php if($_REQUEST['c']==4){echo 'readonly="1"'; }?>>
      <label for="txt_manager_outlet"><b>Manager</b></label>
      <input type="text" name="txt_manager_outlet" class="formInput" required value="<?php if(!empty($_REQUEST['id'])){echo $newOutlet->manager_outlet;} ?>" <?php if($_REQUEST['c']==4){echo 'readonly="1"'; }?>>
      <label for="cbx_type_outlet"><b>Type outlet</b></label>
      <select name="cbx_type_outlet" required class="formInput" <?php if($_REQUEST['c']==4){echo 'readonly="1"'; }?>>
        <option></option>
        <option value="1" <?php if(!empty($_REQUEST['id']) && $newOutlet->type_outlet == 1){echo 'selected="selected"';} ?>>On Trade Hotel</option>
        <option value="2" <?php if(!empty($_REQUEST['id']) && $newOutlet->type_outlet == 2){echo 'selected="selected"';} ?>>On Trade Restaurant</option>
        <option value="3" <?php if(!empty($_REQUEST['id']) && $newOutlet->type_outlet == 3){echo 'selected="selected"';} ?>>On Trade High Energy Bar</option>
        <option value="4" <?php if(!empty($_REQUEST['id']) && $newOutlet->type_outlet == 4){echo 'selected="selected"';} ?>>On Trade Low Energy Bar</option>
        <option value="5" <?php if(!empty($_REQUEST['id']) && $newOutlet->type_outlet == 5){echo 'selected="selected"';} ?>>On Trade NightClub</option>
        <option value="6" <?php if(!empty($_REQUEST['id']) && $newOutlet->type_outlet == 6){echo 'selected="selected"';} ?>>Off Trade Supermarket</option>
        <option value="7" <?php if(!empty($_REQUEST['id']) && $newOutlet->type_outlet == 7){echo 'selected="selected"';} ?>>Off Trade Liquor Store</option>
        <option value="8" <?php if(!empty($_REQUEST['id']) && $newOutlet->type_outlet == 8){echo 'selected="selected"';} ?>>Off Trade Wholesaler</option>
        <option value="Ontrade" <?php if(!empty($_REQUEST['id']) && $newOutlet->type_outlet == 'Ontrade'){echo 'selected="selected"';} ?>>On Trade</option>
        <option value="Offtrade" <?php if(!empty($_REQUEST['id']) && $newOutlet->type_outlet == 'Offtrade'){echo 'selected="selected"';} ?>>Off Trade</option>
      </select>
      <label for="txt_phone_outlet"><b>Phone number</b></label>
      <input type="text" name="txt_phone_outlet" class="formInput" required value="<?php if(!empty($_REQUEST['id'])){echo $newOutlet->phone_outlet;} ?>" <?php if($_REQUEST['c']==4){echo 'readonly="1"'; }?>>
      <label for="txt_email_outlet"><b>Email</b></label>
      <input type="text" name="txt_email_outlet" class="formInput" required value="<?php if(!empty($_REQUEST['id'])){echo $newOutlet->email_outlet;} ?>" <?php if($_REQUEST['c']==4){echo 'readonly="1"'; }?>>
      <label for="txt_location_outlet"><b>Location</b></label>
      <input type="text" name="txt_location_outlet" class="formInput" required value="<?php if(!empty($_REQUEST['id'])){echo $newOutlet->location_outlet;} ?>" <?php if($_REQUEST['c']==4){echo 'readonly="1"'; }?>>
      <label for="txt_gps_longitude_outlet"><b>GPS Longitude</b></label>
      <input type="text" name="txt_gps_longitude_outlet" class="formInput" required value="<?php if(!empty($_REQUEST['id'])){echo $newOutlet->gps_longitude_outlet;} ?>" <?php if($_REQUEST['c']==4){echo 'readonly="1"'; }?>>
      <label for="txt_gps_latitude_outlet"><b>GPS Latitude</b></label>
      <input type="text" name="txt_gps_latitude_outlet" class="formInput" required value="<?php if(!empty($_REQUEST['id'])){echo $newOutlet->gps_latitude_outlet;} ?>" <?php if($_REQUEST['c']==4){echo 'readonly="1"'; }?>>
      <label for="txt_login_outlet"><b>Login</b></label>
      <input type="text" name="txt_login_outlet" class="formInput" required value="<?php if(!empty($_REQUEST['id'])){echo $newOutlet->login_outlet;} ?>" <?php if($_REQUEST['c']==4){echo 'readonly="1"'; }?>>
      <label for="txt_passcode_outlet"><b>Passcode</b></label>
      <input type="password" name="txt_passcode_outlet" class="formInput" required value="" <?php if($_REQUEST['c']==4){echo 'readonly="1"'; }?>>
      <p>
        <button name="cmd_submit" class="btn" type="submit"><i class="fas fa-save"></i>&nbsp;<?php echo $dConfig["submit"]; ?> Outlet</button>
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
    <div class="input-group" align="center">
      <form class="example" action="?"  method="post">
        <a href="?c=2">
        <button class="btn" title="Add a new record" type="button"><i class="fa fa-plus"></i>&nbsp;New Outlet</button>
        </a>
        <input name="txt_search" type="text" class="btn" placeholder="Search.." value="<?php if(isset($_REQUEST['txt_search']) && !empty($_REQUEST['txt_search'])){ echo $_REQUEST['txt_search'];}?>" required>
        <button class="btn" type="submit"><i class="fa fa-search"></i></button>
        <?php if(isset($_REQUEST['txt_search']) && !empty($_REQUEST['txt_search'])){ ?>
        <a href="outlet.php">
        <button class="btn" type="button">View All</button>
        </a>
        <?php }?>
      </form>
      <p> Location
        <select name="">
          <option>Remera</option>
          <option>Kimironko</option>
        </select>
        Channel
        <select name="">
          <option>On Trade</option>
          <option>Off Trade</option>
        </select>
      </p>
    </div>
  </div>
  <table width="100%">
    <thead>
      <tr class="table100-head">
        <th class="column1">Company name</th>
        <th class="column2">Manager</th>
        <th class="column2">Type</th>
        <th class="column7">Credentials</th>
        <th class="column8">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php 
if(empty($_REQUEST['viewPage']))
	{
	$viewPage = 1;
	}
else
	{
	$viewPage = $_REQUEST['viewPage'];
	}

$nextViewPage = $viewPage + 1;

if(empty($viewLimit))
	{
	$viewLimit = 10;
	}


$whereCritere = '';
if(isset($_REQUEST['txt_search']) && !empty($_REQUEST['txt_search']))
	{
	$whereCritere = " name_outlet LIKE '%".$newOutlet->formatData($_REQUEST['txt_search'])."%' OR phone_outlet LIKE '%".$newOutlet->formatData($_REQUEST['txt_search'])."%' OR email_outlet LIKE '%".$newOutlet->formatData($_REQUEST['txt_search'])."%' OR location_outlet LIKE '%".$newOutlet->formatData($_REQUEST['txt_search'])."%' OR login_outlet LIKE '%".$newOutlet->formatData($_REQUEST['txt_search'])."%' " ;	
	}

$orderByCritere = ' location_outlet, type_outlet, name_outlet ';
$arrOutlet = $newOutlet->getAllOutlet($whereCritere,$orderByCritere,$viewPage,$viewLimit);

if(!empty($arrOutlet))
	{
	$i=0; 
	while(!empty($arrOutlet[$i]))
		{ 
?>
      <tr>
        <td class="column1"><?php echo '<strong style="padding-bottom:3px">'.$arrOutlet[$i]->name_outlet.'</strong> ('.$arrOutlet[$i]->location_outlet.')'; ?><br>
          <a href="outlet.gps.php?id=<?php echo $arrOutlet[$i]->id; ?><?php if(!empty($_REQUEST['viewPage'])){ echo '&viewPage='.$_REQUEST['viewPage'];} ?>"><i class="fas fa-map-marker-alt" style="margin-top:5px"></i>&nbsp;<?php echo number_format($arrOutlet[$i]->gps_longitude_outlet,10).','.number_format($arrOutlet[$i]->gps_latitude_outlet,10); ?></a></td>
        <td class="column2"><?php echo $arrOutlet[$i]->manager_outlet; ?><br>
          <?php echo $arrOutlet[$i]->phone_outlet; ?> &nbsp; <?php echo $arrOutlet[$i]->email_outlet; ?></td>
        <td class="column3"><?php echo $arrOutlet[$i]->type_outlet; ?></td>
        <td class="column8"><?php echo $arrOutlet[$i]->login_outlet; ?><br>
          <a href="#" title="Generate Passcode"><i class="fas fa-key"></i>&nbsp;(******)</a></td>
        <td class="column9"><h3><a href="?c=3&id=<?php echo $arrOutlet[$i]->id; ?>">
            <button type="button" name="cmd_submit"><i class="fas fa-pencil-alt"></i>&nbsp;Update</button>
            </a>&nbsp;&nbsp;<a href="?c=4&id=<?php echo $arrOutlet[$i]->id; ?>">
            <button type="button" name="cmd_submit"><i class="far fa-trash-alt"></i>&nbsp;Delete</button>
            </a></h3></td>
      </tr>
      <?php
		$i++;
		}
	}
?>
    </tbody>
  </table>
  <br>
  <div class="_whiteBox" align="center"> <strong>
    <?php if($viewPage>1){ ?>
    <a href="?viewPage=<?php echo $viewPage - 1; ?>"> <<&nbsp;&nbsp;Previous &nbsp;&nbsp;|</a>
    <?php }?>
    &nbsp;&nbsp; PAGE <?php echo $viewPage; ?> &nbsp;&nbsp;
    <?php if(!empty($i) && $i == $viewLimit){ ?>
    |&nbsp;&nbsp; <a href="?viewPage=<?php echo $viewPage + 1; ?>">Next&nbsp;&nbsp;>></a>
    <?php }?>
    </strong> </div>
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
