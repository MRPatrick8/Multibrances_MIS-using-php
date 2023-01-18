<?php 
include('config.php');
include('session.control.php');

require_once('outlet.class.php');
$newOutlet = new outlet();

require_once('user.class.php');
$newUser = new user();
$newUser2 = new user();

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
<link rel="stylesheet" type="text/css" href="css/outlet.user.css">
<!--===============================================================================================-->
<script src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
<!--===============================================================================================-->
<title>Tianis Direct - Call Circle day</title>
<style>
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
  <div class="topnav"> <a href="dashboard3.php">Tianis Direct</a>
    <div id="myLinks"> <a href="order.php"><i class="fas fa-receipt"></i>&nbsp;Orders</a> <a href="product.php"><i class="fas fa-boxes"></i>&nbsp;Products</a> <a href="outlet.php" class="active"><i class="fas fa-store-alt"></i>&nbsp;Outlets</a> <a href="user.php"><i class="fas fa-user-cog"></i>&nbsp;Users</a> <a href="diprad.php"><i class="fas fa-ad"></i>&nbsp;Promo</a> <a href="session.close.php" title="Log out"> <i class="glyphicon glyphicon-log-out"></i>&nbsp;Logout</a> </div>
    <a href="javascript:void(0);" class="icon" onclick="myFunction()"> <i class="fa fa-bars"></i>&nbsp;</a> </div>
  <p align="right" class="bText"><strong><i class="fa fa-user-alt"></i>&nbsp;<?php echo $cu_login; ?> (<?php echo $cu_type_name; ?>) | <a href="session.close.php">Logout <i class="fa fa-sign-out-alt"></i></a></strong></p>
  <h3><i class="fas fa-user-cog"></i>&nbsp; Users - call circles setting</h3>
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
		
  ?>
  <div class="_whiteBox" style="margin-bottom:5px">
    <form name="form" id="form" method="post">
      <p><strong>Location</strong>
        <select class="btn" name="cbx_location_outlet" onChange="MM_jumpMenu('parent',this,0)">
          <option value="?">All</option>
          <?php 
            $arrLocations = $newOutlet->getOutletLocations();
            
			if(!empty($arrLocations))
                {
                $k=0; 
                while(!empty($arrLocations[$k]))
                    { 
            ?>
          <option value="?location=<?php echo $arrLocations[$k]->location_outlet; ?>" <?php if(!empty($_REQUEST['location']) && $_REQUEST['location'] == $arrLocations[$k]->location_outlet){ echo 'selected';} ?>><?php echo $arrLocations[$k]->location_outlet; ?></option>
          <?php 
                    $k++;
                    }
                }
            ?>
        </select>
        <a href="?<?php if(!empty($_REQUEST['viewPage'])){ echo 'viewPage='.$_REQUEST['viewPage'];} ?><?php if(!empty($_REQUEST['location'])){ echo '&location='.$_REQUEST['location'];} ?>&c=3">
        <button class="btn" type="button"><i class="fas fa-pencil-alt"></i></button>
        </a></p>
      <p> 
        <input name="txt_search" type="text" class="btn" placeholder="Search.." value="<?php if(isset($_REQUEST['txt_search']) && !empty($_REQUEST['txt_search'])){ echo $_REQUEST['txt_search'];}?>" required>
        <button class="btn" type="submit"><i class="fa fa-search"></i></button>
        </p>
        <p>
        <a href="audit.calendar.php"><strong><i class="far fa-calendar-alt"></i>&nbsp;View call cycle calendar</strong></a>
        </p>
    </form>
  </div>
  <form action="user.sql.php?action=5<?php if(!empty($_REQUEST['viewPage'])){ echo '&viewPage='.$_REQUEST['viewPage'];} ?><?php if(!empty($_REQUEST['location'])){ echo '&location='.$_REQUEST['location'];} ?><?php if(!empty($_REQUEST['txt_search'])){ echo '&txt_search='.$_REQUEST['txt_search'];} ?>" method="post">
    <table width="100%">
      <thead>
        <tr class="table100-head">
          <th class="column1">Outlet</th>
          <th class="column2">User</th>
          <th class="column3">Cycle</th>
          <th class="column4">Day</th>
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
	$viewLimit = 100;	
	}
if(isset($_REQUEST['txt_search']) && !empty($_REQUEST['txt_search']))
	{
	$whereCritere = " name_outlet LIKE '%".$newOutlet->formatData($_REQUEST['txt_search'])."%' OR phone_outlet LIKE '%".$newOutlet->formatData($_REQUEST['txt_search'])."%' OR email_outlet LIKE '%".$newOutlet->formatData($_REQUEST['txt_search'])."%' OR location_outlet LIKE '%".$newOutlet->formatData($_REQUEST['txt_search'])."%' OR login_outlet LIKE '%".$newOutlet->formatData($_REQUEST['txt_search'])."%' " ;	
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
		$userHasCircle = $newUser->getBusinessUser($arrOutlet[$i]->id);
?>
        <tr>
          <td><?php echo $arrOutlet[$i]->name_outlet.' ('.$arrOutlet[$i]->location_outlet.')'; ?></td>
          <td><?php 
		  if(!empty($_REQUEST['c']) && $_REQUEST['c'] == 3)
		  	{ ?>
            <input name="cbx_outlet[]" type="hidden" value="<?php echo $arrOutlet[$i]->id; ?>">
            <select name="cbx_user[]">
              <option value=""></option>
              <?php 
			if(!empty($arrBusinessUsers))
                {
                $k=0; 
                while(!empty($arrBusinessUsers[$k]))
                    { 
            ?>
              <option value="<?php echo $arrBusinessUsers[$k]->id; ?>" 
			  <?php if(($newUser2->getBusinessUser($arrOutlet[$i]->id)) && ($newUser2->id_user == $arrBusinessUsers[$k]->id)){ echo 'selected';} ?>
              ><?php echo $arrBusinessUsers[$k]->firstname_user.' '.$arrBusinessUsers[$k]->lastname_user; ?></option>
              <?php 
                    $k++;
                    }
                }
            ?>
            </select>
            <?php 
			} 
		else 
			{
			
			if($userHasCircle)
				{
				echo $newUser->firstname_user.' '.$newUser->lastname_user;
				}
			else
				{
				echo '-';
				}
			}
			
		?></td>
          <td><?php 
		if(!empty($_REQUEST['c']) && $_REQUEST['c'] == 3)
		  	{ ?>
            <select name="cbx_cycle[]">
              <option value=""></option>
              <option value="Week 1 and week 3" <?php if($userHasCircle && ($newUser->cycle_week == "Week 1 and week 3")){echo 'selected';}?>>Week 1 and week 3</option>
              <option value="Week 2 and week 4" <?php if($userHasCircle && ($newUser->cycle_week == "Week 2 and week 4")){echo 'selected';}?>>Week 2 and week 4</option>
            </select>
            <?php 
			} 
		else 
			{
			if($userHasCircle)
				{
				echo $newUser->cycle_week;
				}
			else
				{
				echo '-';
				}	
			}
		?></td>
          <td><?php 
		if(!empty($_REQUEST['c']) && $_REQUEST['c'] == 3)
		  	{ ?>
            <select name="cbx_day[]">
              <option></option>
              <option value="Monday" <?php if($userHasCircle && ($newUser->cycle_day == 'Monday')){echo 'selected';}?>>Monday</option>
              <option value="Tuesday" <?php if($userHasCircle && ($newUser->cycle_day == 'Tuesday')){echo 'selected';}?>>Tuesday</option>
              <option value="Wednesday" <?php if($userHasCircle && ($newUser->cycle_day == 'Wednesday')){echo 'selected';}?>>Wednesday</option>
              <option value="Thursday" <?php if($userHasCircle && ($newUser->cycle_day == 'Thursday')){echo 'selected';}?>>Thursday</option>
              <option value="Friday" <?php if($userHasCircle && ($newUser->cycle_day == 'Friday')){echo 'selected';}?>>Friday</option>
            </select>
            <?php 
			} 
		else 
			{
			if($userHasCircle)
				{
				echo $newUser->cycle_day;
				}
			else
				{
				echo '-';
				}	
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
    <div class="_whiteBox" align="center" style="padding:10px">
      <input type="hidden" name="redirect" value="<?php echo "http://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];?>" />
      <button name="cmd_submit" type="submit" class="btn"><i class="fas fa-pencil-alt"></i>&nbsp;Update</button>
      <a href="?<?php if(!empty($_REQUEST['viewPage'])){ echo 'viewPage='.$_REQUEST['viewPage'];} ?><?php if(!empty($_REQUEST['location'])){ echo '&location='.$_REQUEST['location'];} ?>&c=1">
      <button class="btn" type="button" title="Cancel">Cancel</button>
      </a> </div>
    <?php }?>
  </form>
  <div class="_whiteBox" align="center" style="padding:10px"> <strong>
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
