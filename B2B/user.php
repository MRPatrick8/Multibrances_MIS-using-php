<?php 
include('config.php');
include('session.control.php');

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
<link rel="stylesheet" type="text/css" href="css/user.css">
<!--===============================================================================================-->
<script src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
<!--===============================================================================================-->
<title>Tianis Direct - Users</title>
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
  <div class="topnav"> <a href="dashboard.php">Tianis Direct</a>
    <div id="myLinks"> <a href="order.php"><i class="fas fa-receipt"></i>&nbsp;Orders</a> <a href="product.php"><i class="fas fa-boxes"></i>&nbsp;Products</a> <a href="outlet.php"><i class="fas fa-store-alt"></i>&nbsp;Outlets</a> <a href="user.php" class="active"><i class="fas fa-user-cog"></i>&nbsp;Users</a> <a href="diprad.php"><i class="fas fa-ad"></i>&nbsp;Promo</a> </div>
    <a href="javascript:void(0);" class="icon" onclick="myFunction()"> <i class="fa fa-bars"></i>&nbsp;</a> </div>
  <p align="right" class="bText"><strong><i class="fa fa-user-alt"></i>&nbsp;<?php echo $cu_login; ?> (<?php echo $cu_type_name; ?>) | <a href="session.close.php">Logout <i class="fa fa-sign-out-alt"></i></a></strong></p>
  <h3><i class="fas fa-user-cog"></i>&nbsp;Users</h3>
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
			$newUser->getUser($_REQUEST['id']);
			}				
	?>
  <p>
  
  <form action="user.sql.php?action=<?php echo $_REQUEST['c'];?><?php if(!empty($_REQUEST['id'])){echo "&id=".$_REQUEST['id'];}?>" method="post">
    <div class="_whiteBox" style="padding-top:20px;padding-bottom:5px">
      <input type="hidden" id="txt_id" name="txt_id" value="<?php if(!empty($_REQUEST['id'])){echo $_REQUEST['id'];} ?>" />
      <input type="hidden" name="redirect" value="<?php echo "http://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];?>" />
      <label for="txt_firstname"><b>Firstname</b></label>
      <input type="text" name="txt_firstname_user" class="formInput" required value="<?php if(!empty($_REQUEST['id'])){echo $newUser->firstname_user;} ?>" <?php if($_REQUEST['c']==4){echo 'readonly="1"'; }?>>
      <label for="txt_lastname"><b>Lastname</b></label>
      <input type="text" name="txt_lastname_user" class="formInput" required value="<?php if(!empty($_REQUEST['id'])){echo $newUser->lastname_user;} ?>" <?php if($_REQUEST['c']==4){echo 'readonly="1"'; }?>>
      <label for="txt_phone_user"><b>Phone</b></label>
      <input type="text" name="txt_phone_user" class="formInput" required value="<?php if(!empty($_REQUEST['id'])){echo $newUser->phone_user;} ?>" <?php if($_REQUEST['c']==4){echo 'readonly="1"'; }?>>
      <label for="txt_email_user"><b>Email</b></label>
      <input type="text" name="txt_email_user" class="formInput" required value="<?php if(!empty($_REQUEST['id'])){echo $newUser->email_user;} ?>" <?php if($_REQUEST['c']==4){echo 'readonly="1"'; }?>>
      <label for="txt_login_user"><b>Login</b></label>
      <input type="text" name="txt_login_user" class="formInput" required value="<?php if(!empty($_REQUEST['id'])){echo $newUser->login_user;} ?>" <?php if($_REQUEST['c']==4){echo 'readonly="1"'; }?>>
      <label for="txt_password_user"><b>Password</b></label>
      <input type="password" name="txt_password_user" class="formInput" required value="" <?php if($_REQUEST['c']==4){echo 'readonly="1"'; }?>>
      <label for="cbx_type_user"><b>Type user</b></label>
      <select name="cbx_type_user" required class="formInput" <?php if($_REQUEST['c']==4){echo 'readonly="1"'; }?>>
        <option></option>
        <option value="1" <?php if(!empty($_REQUEST['id']) && $newUser->type_user == 1){echo 'selected="selected"';} ?>>Supervisor</option>
        <option value="2" <?php if(!empty($_REQUEST['id']) && $newUser->type_user == 2){echo 'selected="selected"';} ?>>Delivery Staff</option>
        <option value="3" <?php if(!empty($_REQUEST['id']) && $newUser->type_user == 3){echo 'selected="selected"';} ?>>Business Developer</option>
      </select>
      <p>
        <button name="cmd_submit" class="btn" type="submit"><i class="fas fa-save"></i>&nbsp;<?php echo $dConfig["submit"]; ?> User</button>
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
      <form class="example" action="?">
        <a href="?c=2">
        <button class="btn" title="Add a new record" type="button"><i class="fa fa-plus"></i>&nbsp;New User</button>
        </a>
        <input name="txt_search" type="text" class="btn" placeholder="Search.." value="<?php if(isset($_REQUEST['txt_search']) && !empty($_REQUEST['txt_search'])){ echo $_REQUEST['txt_search'];}?>" required>
        <button class="btn" type="submit"><i class="fa fa-search"></i></button>
        <?php if(isset($_REQUEST['txt_search']) && !empty($_REQUEST['txt_search'])){ ?>
        <a href="user.php">
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
        <th class="column1">Firstname</th>
        <th class="column2">Lastname</th>
        <th class="column3">Phone</th>
        <th class="column4">Email</th>
        <th class="column5">Credentials</th>
        <th class="column6">Type</th>
        <th class="column6">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php 
$whereCritere = '';
if(isset($_REQUEST['txt_search']) && !empty($_REQUEST['txt_search']))
	{
	$whereCritere = " firstname_user = '".$newUser->formatData($_REQUEST['txt_search'])."' OR lastname_user = '".$newUser->formatData($_REQUEST['txt_search'])."' OR phone_user = '".$newUser->formatData($_REQUEST['txt_search'])."' OR email_user = '".$newUser->formatData($_REQUEST['txt_search'])."' OR login_user = '".$newUser->formatData($_REQUEST['txt_search'])."' " ;	
	}
$orderByCritere = ' type_user, firstname_user, lastname_user ';
$arrUser = $newUser->getAllUser($whereCritere,$orderByCritere);

if(!empty($arrUser))
	{
	$i=0; 
	while(!empty($arrUser[$i]))
		{ 
?>
      <tr>
        <td class="column1"><?php echo $arrUser[$i]->firstname_user; ?></td>
        <td class="column2"><?php echo $arrUser[$i]->lastname_user; ?></td>
        <td class="column3"><?php echo $arrUser[$i]->phone_user; ?></td>
        <td class="column4"><?php echo $arrUser[$i]->email_user; ?></td>
        <td class="column5"><?php echo $arrUser[$i]->login_user; ?> (******)</td>
        <td class="column6"><?php echo $userType[$arrUser[$i]->type_user]; ?></td>
        <td class="column7"><a href="?c=3&id=<?php echo $arrUser[$i]->id; ?>"><i class="fas fa-pencil-alt"></i></a>&nbsp;&nbsp;<a href="?c=4&id=<?php echo $arrUser[$i]->id; ?>"><i class="far fa-trash-alt"></i></a></td>
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
