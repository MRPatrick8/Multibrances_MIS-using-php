<?php 
include('config.php');
include('session.control.php');

require_once('outlet.class.php');
$newOutlet = new outlet();

require_once('user.class.php');
$newUser = new user();

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
<link rel="stylesheet" type="text/css" href="css/user.cycle.css">
<!--===============================================================================================-->
<script src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
<!--===============================================================================================-->
<title>Tianis Direct - User call cycles setting</title>
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
<script type="text/javascript">
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if(restore) selObj.selectedIndex=0;
}
</script>
</head>
<body>

<!-- Simulate a smartphone / tablet -->
<div class="mobile-container"> 
  
  <!-- Top Navigation Menu -->
  <div class="topnav"> 
  <a href="dashboard3.php">Tianis Direct</a>
    <div id="myLinks"> 
    <a href="order.php"><i class="fas fa-receipt"></i>&nbsp;Orders</a> 
    <a href="product.php"><i class="fas fa-boxes"></i>&nbsp;Products</a> 
    <a href="outlet.php"><i class="fas fa-store-alt"></i>&nbsp;Outlets</a> 
    <a href="user.php" class="active"><i class="fas fa-user-cog"></i>&nbsp;Users</a> 
    <a href="diprad.php"><i class="fas fa-ad"></i>&nbsp;Promo</a> </div>
    <a href="javascript:void(0);" class="icon" onclick="myFunction()"> <i class="fa fa-bars"></i>&nbsp;</a> 
    </div>
    <p align="right" class="bText"><strong><i class="fa fa-user-alt"></i>&nbsp;<?php echo $cu_login; ?> (<?php echo $cu_type_name; ?>) | <a href="session.close.php">Logout <i class="fa fa-sign-out-alt"></i></a></strong></p>
    <h3><i class="fas fa-user-cog"></i>&nbsp;User call cycles setting</h3>
  
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
  <p> </p>
  <?php 
		}
  ?>
  <div style="padding:1px">
    <div class="input-group" align="center"> 
      <p> 
      <strong>
      <form name="form" id="form" method="post">
        <i class="far fa-user"></i>&nbsp;
        <select class="btn" name="cbx_location_outlet" onChange="MM_jumpMenu('parent',this,0)">
          <option value="?">All</option>
          <?php 
		  	$whereCritere = ' type_user = 3';
			$orderByCritere = ' firstname_user, lastname_user ';

            $arrUser = $newUser->getAllUser($whereCritere,$orderByCritere);
            
			if(!empty($arrUser))
                {
                $k=0; 
                while(!empty($arrUser[$k]))
                    { 
            ?>
          <option value="?user=<?php echo $arrUser[$k]->id; ?>" <?php if(!empty($_REQUEST['user']) && $_REQUEST['user'] == $arrUser[$k]->id){ echo 'selected';} ?>><?php echo $arrUser[$k]->firstname_user.' '.$arrUser[$k]->lastname_user; ?></option>
          <?php 
                    $k++;
                    }
                }
            ?>
        </select>
        <a href="?<?php if(!empty($_REQUEST['viewPage'])){ echo 'viewPage='.$_REQUEST['viewPage'];} ?><?php if(!empty($_REQUEST['location'])){ echo '&location='.$_REQUEST['location'];} ?>&c=3">
        <button class="btn" type="button"><i class="fas fa-pencil-alt"></i></button>
        </a>
      </form>
      </strong>
      </p>
    </div>
  </div>
  <form action="?" method="post">
    <table width="100%">
      <thead>
        <tr class="table100-head">
          <th class="column1">Location</th>
          <th class="column2">Outlet</th>
          <th class="column2">User</th>
          <th class="column2">Cycle</th>
          <th class="column2">Day</th>
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
if(!empty($_REQUEST['location']))
	{
	$whereCritere = " location_outlet = '".$newOutlet->formatData($_REQUEST['location'])."' " ;	
	}

$orderByCritere = ' location_outlet, name_outlet ';
$arrOutlet = $newOutlet->getAllOutlet($whereCritere,$orderByCritere,$viewPage,$viewLimit);

if(!empty($arrOutlet))
	{
	$i=0; 
	while(!empty($arrOutlet[$i]))
		{ 
		
		$whereCritere = ' type_user = 3 ';
		$orderByCritere = ' firstname_user, lastname_user ';
        $arrBusinessUsers = $newUser->getAllUser($whereCritere,$orderByCritere);

?>
        <tr>
          <td class="column1"><?php echo $arrOutlet[$i]->location_outlet; ?></td>
          <td class="column2"><?php echo $arrOutlet[$i]->name_outlet; ?></td>
          <td class="column2">Jules</td>
          <td class="column3"><?php 
		if(!empty($_REQUEST['c']) && $_REQUEST['c'] == 3)
		  	{ ?>
            <select class="btn" name="cbx_user">
              <option value=""></option>
              <option value="1">Week 1 & 3</option>
              <option value="2">Week 2 & 4</option>
            </select>
            <?php 
			} 
		else 
			{
			echo 'Week 1 & 3';	
			}
		?></td>
          <td class="column3"><?php 
		if(!empty($_REQUEST['c']) && $_REQUEST['c'] == 3)
		  	{ ?>
            <select name="select" id="select" class="btn">
              <option></option>
              <option value="1">Monday</option>
              <option value="2">Tuesday</option>
              <option value="3">Wednesday</option>
              <option value="4">Thursday</option>
              <option value="5">Friday</option>
            </select>
            <?php 
			} 
		else 
			{
			echo 'Monday';	
			}
		?></td>
        </tr>
        <?php
		$i++;
		}
	}
?>
      </tbody>
    </table>
    <?php if(!empty($_REQUEST['c']) && $_REQUEST['c'] == 3){ ?>
    <br>
    <div class="_whiteBox" align="center">
      <input name="txt_submit" type="submit" value="Update" class="btn">
      <a href="?<?php if(!empty($_REQUEST['viewPage'])){ echo 'viewPage='.$_REQUEST['viewPage'];} ?><?php if(!empty($_REQUEST['location'])){ echo '&location='.$_REQUEST['location'];} ?>&c=1">
      <button class="btn" type="button" title="Cancel">Cancel</button>
      </a> </div>
    <?php }?>
  </form>
  <br>
  <div class="_whiteBox" align="center"> <strong>
    <?php if($viewPage>1){ ?>
    <a href="?viewPage=<?php echo $viewPage - 1;if(!empty($_REQUEST['location'])){ echo '&location='.$_REQUEST['location'];} ?>"> <<&nbsp;&nbsp;Previous &nbsp;&nbsp;|</a>
    <?php }?>
    &nbsp;&nbsp; PAGE <?php echo $viewPage; ?> &nbsp;&nbsp;
    <?php if(!empty($i) && $i == $viewLimit){ ?>
    |&nbsp;&nbsp; <a href="?viewPage=<?php echo $viewPage + 1; if(!empty($_REQUEST['location'])){ echo '&location='.$_REQUEST['location'];}?>">Next&nbsp;&nbsp;>></a>
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
