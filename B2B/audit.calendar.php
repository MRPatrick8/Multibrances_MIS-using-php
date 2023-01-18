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

if(!isset($_REQUEST['cycleDay']))
	{
	$_REQUEST['cycleDay'] = date('l');
	}

if(!isset($_REQUEST['cycleWeek']))
	{
	$_REQUEST['cycleWeek'] = 1;
	}

if(!$cu_is_outlet && $cu_type == 3)
	{
	$_REQUEST['user'] = $cu_id;
	}	
if(!isset($_REQUEST['select']))
	{
	$_REQUEST['select'] = date('Y-m-d');
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
<link rel="stylesheet" type="text/css" href="css/caleandar.css"/>
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
<div class="topnav"> <a href="<?php if($cu_type==1){ ?>dashboard.php<?php }else{echo 'javascript:void(0);';} ?>" onclick="myFunction()">Tianis Direct</a>
  <div id="myLinks">
    <?php if($cu_type==1){ ?>
    <a href="order.php"><i class="fas fa-receipt"></i>&nbsp;Orders</a> <a href="product.php"><i class="fas fa-boxes"></i>&nbsp;Products</a> <a href="outlet.php" class="active"><i class="fas fa-store-alt"></i>&nbsp;Outlets</a> <a href="user.php"><i class="fas fa-user-cog"></i>&nbsp;Users</a> <a href="diprad.php"><i class="fas fa-ad"></i>&nbsp;Promo</a>
    <?php } elseif($cu_type==3){?>
    <a href="audit.map.php?select=<?php echo $_REQUEST['select']; ?>"><i class="far fa-comments"></i>&nbsp;Audit</a> <a href="audit.report.php?select=<?php echo $_REQUEST['select']; ?>"><i class="fas fa-print"></i>&nbsp;Availability</a> <a href="audit.calendar.php" class="active"><i class="far fa-calendar-alt"></i>&nbsp;Call Cycles</a> <a href="order.bulk.php"><i class="fas fa-receipt"></i>&nbsp;Order on behalf</a>
    <?php } ?>
  </div>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()"> <i class="fa fa-bars"></i>&nbsp;</a> </div>
<div style="padding:1px">
<p align="right" class="bText"><strong><i class="fa fa-user-alt"></i>&nbsp;<?php echo $cu_login; ?> (<?php echo $cu_type_name; ?>) | <a href="session.close.php">Logout <i class="fa fa-sign-out-alt"></i></a></strong></p>
<h3><i class="far fa-calendar-alt"></i>&nbsp;Call cycles calendar</h3>
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
<div class="_whiteBox" align="left">
  <table border="0" cellspacing="0" cellpadding="5" style="min-width:360px">
    <?php if($cu_type == 1){ ?>
    <tr>
      <td align="right" nowrap="nowrap"><strong>Business<br>
        Developer</strong></td>
      <td><select class="btn" onChange="MM_jumpMenu('parent',this,0)">
          <?php 
		  	$whereCritere = ' type_user = 3';
			$orderByCritere = ' firstname_user, lastname_user ';

            $arrUser = $newUser->getAllUser($whereCritere,$orderByCritere);
            
			if(!empty($arrUser))
                {
                $k=0; 
                while(!empty($arrUser[$k]))
                    {
					if(empty($_REQUEST['user']))
						{
						$_REQUEST['user'] = $arrUser[$k]->id;
						}
            ?>
          <option value="?user=<?php echo $arrUser[$k]->id; ?>" <?php if(!empty($_REQUEST['user']) && $_REQUEST['user'] == $arrUser[$k]->id){ echo 'selected';} ?>><?php echo $arrUser[$k]->firstname_user.' '.$arrUser[$k]->lastname_user; ?></option>
          <?php 
                    $k++;
                    }
                }
            ?>
        </select>
        <a href="outlet.user.php"><button class="btn" type="button"><i class="fas fa-pencil-alt"></i></button></a>
        </td>
    </tr>
    <?php } ?>
    <tr>
      <td align="right" nowrap="nowrap"><strong>Cycle week</strong></td>
      <td width="75%"><?php 
            $thisWeek = 'Week 1 and week 3';
            $nextWeek = 'Week 2 and week 4';
            if(date("W") % 2 == 0)
                {
                $thisWeek = 'Week 2 and week 4';
                $nextWeek = 'Week 1 and week 3';
            }	
            ?>
        <select class="btn" onChange="MM_jumpMenu('parent',this,0)">
          <option value="?user=<?php echo$_REQUEST['user']; ?>&cycleWeek=1&cycleDay=<?php echo$_REQUEST['cycleDay']; ?>" <?php if($_REQUEST['cycleWeek']==1){echo ' selected="selected"';}?>>This week call cycles</option>
          <option value="?user=<?php echo$_REQUEST['user']; ?>&cycleWeek=2&cycleDay=<?php echo$_REQUEST['cycleDay']; ?>" <?php if($_REQUEST['cycleWeek']==2){echo ' selected="selected"';}?>>Next week call cycles</option>
          <option value="?user=<?php echo$_REQUEST['user']; ?>&cycleWeek=3&cycleDay=<?php echo$_REQUEST['cycleDay']; ?>" <?php if($_REQUEST['cycleWeek']==3){echo ' selected="selected"';}?>>All call cycles</option>
        </select></td>
    </tr>
    <tr>
      <td align="right" nowrap="nowrap"><strong>Week days</strong></td>
      <td><select class="btn" onChange="MM_jumpMenu('parent',this,0)">
          <option value="?user=<?php echo$_REQUEST['user']; ?>&cycleWeek=<?php echo$_REQUEST['cycleWeek']; ?>&cycleDay=0" <?php if($_REQUEST['cycleDay']==0){echo ' selected="selected"';}?>>All days</option>
          <option value="?user=<?php echo$_REQUEST['user']; ?>&cycleWeek=<?php echo$_REQUEST['cycleWeek']; ?>&cycleDay=Monday" <?php if($_REQUEST['cycleDay']=='Monday'){echo ' selected="selected"';}?>>Monday</option>
          <option value="?user=<?php echo$_REQUEST['user']; ?>&cycleWeek=<?php echo$_REQUEST['cycleWeek']; ?>&cycleDay=Tuesday" <?php if($_REQUEST['cycleDay']=='Tuesday'){echo ' selected="selected"';}?>>Tuesday</option>
          <option value="?user=<?php echo$_REQUEST['user']; ?>&cycleWeek=<?php echo$_REQUEST['cycleWeek']; ?>&cycleDay=Wednesday" <?php if($_REQUEST['cycleDay']=='Wednesday'){echo ' selected="selected"';}?>>Wednesday</option>
          <option value="?user=<?php echo$_REQUEST['user']; ?>&cycleWeek=<?php echo$_REQUEST['cycleWeek']; ?>&cycleDay=Thursday" <?php if($_REQUEST['cycleDay']=='Thursday'){echo ' selected="selected"';}?>>Thursday</option>
          <option value="?user=<?php echo$_REQUEST['user']; ?>&cycleWeek=<?php echo$_REQUEST['cycleWeek']; ?>&cycleDay=Friday" <?php if($_REQUEST['cycleDay']=='Friday'){echo ' selected="selected"';}?>>Friday</option>
          <option value="?user=<?php echo$_REQUEST['user']; ?>&cycleWeek=<?php echo$_REQUEST['cycleWeek']; ?>&cycleDay=Saturday" <?php if($_REQUEST['cycleDay']=='Saturday'){echo ' selected="selected"';}?>>Saturday</option>
          <option value="?user=<?php echo$_REQUEST['user']; ?>&cycleWeek=<?php echo$_REQUEST['cycleWeek']; ?>&cycleDay=Sunday" <?php if($_REQUEST['cycleDay']=='Sunday'){echo ' selected="selected"';}?>>Sunday</option>
        </select></td>
    </tr>
  </table>
</div>
<div class="_whiteBox" align="left">

<?php 
	
	$whereCritere = ' type_user = 3';
	if(isset($_REQUEST['user']))
		{
		$whereCritere .= ' AND id = '.$_REQUEST['user'];
		}
	$orderByCritere = ' firstname_user, lastname_user ';

	$arrUser = $newUser->getAllUser($whereCritere,$orderByCritere);
	
	$orderByCritere = ' cycle_week, SortWeekday, location_outlet, name_outlet ';
	
	if(!empty($arrUser))
		{
		$k=0; 
		while(!empty($arrUser[$k]))
			{
			if(!$cu_is_outlet && $cu_type == 1)
				{
				echo '<h3><strong><i class="far fa-user"></i>&nbsp; '.$arrUser[$k]->firstname_user.' '.$arrUser[$k]->lastname_user.'</strong></h3>';
				}
		
			$whereCritere= " id_user = '".$arrUser[$k]->id."' ";
			if(!empty($_REQUEST['cycleDay']))
				{
				$whereCritere .= " AND cycle_day = '".$_REQUEST['cycleDay']."' ";
				}
			
			if($_REQUEST['cycleWeek']==1)
				{
				$whereCritere .= " AND cycle_week = '".$thisWeek."' ";
				}
			elseif($_REQUEST['cycleWeek']==2)
				{
				$whereCritere .= " AND cycle_week = '".$nextWeek."' ";
				}
			
			$arrUserOutlet = $newUser->getAllUserOutlet($whereCritere, $orderByCritere);
			
			$cycle_week = '';
			$cycle_day = '';
			if(!empty($arrUserOutlet))
				{
				$m=0; 
				while(!empty($arrUserOutlet[$m]))
					{
					if($_REQUEST['cycleWeek']==3 && $arrUserOutlet[$m]->cycle_week != $cycle_week)
						{
						$cycle_week = $arrUserOutlet[$m]->cycle_week;
						echo '<p><strong>&raquo; '.$cycle_week.'</strong> </p>';	
						$cycle_day = '';
						}
					
					if($arrUserOutlet[$m]->cycle_day != $cycle_day)
						{
						$cycle_day = $arrUserOutlet[$m]->cycle_day;
						echo '<p><strong><i class="far fa-calendar-check"></i>&nbsp;'.$cycle_day.'</strong> </p>';	
						}
					
					echo ($m+1).'.&nbsp;&nbsp;<i class="fas fa-store-alt"></i>&nbsp;'.$arrUserOutlet[$m]->location_outlet.' - '.$arrUserOutlet[$m]->name_outlet.' <br>';
					
	
			
					$m++;
					}
				}
			else
				{
				echo '<p>No call cycle on this day.</p>';	
				}
			$k++;
			}
		}

	
	
	?>
<br>
</div>
<!--<div  class="_whiteBox">
    <div id="caleandar"> </div>
  </div>-->

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
<script type="text/javascript" src="js/caleandar.js"></script> 
<script type="text/javascript">
    var element = document.getElementById('caleandar');
var events = [
  {'Date': new Date("2020-11-02"), 
  'Title': 'Outlet 1<br>Outlet 2<br>Outlet 3<br>Outlet 4<br>Outlet 5<br>Outlet 6', 
  'Link': '<?php echo "http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']); ?>/audit.map.php'},
  {'Date': new Date("November 3, 2020"), 
  'Title': 'Outlet 1<br>Outlet 2<br>Outlet 3<br>Outlet 4<br>Outlet 5<br>Outlet 6', 
  'Link': '<?php echo "http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']); ?>/audit.map.php'},
  {'Date': new Date("November 4, 2020"), 
  'Title': 'Outlet 1<br>Outlet 2<br>Outlet 3<br>Outlet 4<br>Outlet 5<br>Outlet 6', 
  'Link': '<?php echo "http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']); ?>/audit.map.php'},
  {'Date': new Date("November 5, 2020"), 
  'Title': 'Outlet 1<br>Outlet 2<br>Outlet 3<br>Outlet 4<br>Outlet 5<br>Outlet 6', 
  'Link': '<?php echo "http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']); ?>/audit.map.php'},
  {'Date': new Date("November 6, 2020"), 
  'Title': 'Outlet 1<br>Outlet 2<br>Outlet 3<br>Outlet 4<br>Outlet 5<br>Outlet 6', 
  'Link': '<?php echo "http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']); ?>/audit.map.php'},
  {'Date': new Date("November 7, 2020"), 
  'Title': 'Outlet 1<br>Outlet 2<br>Outlet 3<br>Outlet 4<br>Outlet 5<br>Outlet 6', 
  'Link': '<?php echo "http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']); ?>/audit.map.php'},
  {'Date': new Date("November 9, 2020"), 
  'Title': 'Outlet 1<br>Outlet 2<br>Outlet 3<br>Outlet 4<br>Outlet 5<br>Outlet 6', 
  'Link': '<?php echo "http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']); ?>/audit.map.php'},
  {'Date': new Date("November 10, 2020"), 
  'Title': 'Outlet 1<br>Outlet 2<br>Outlet 3<br>Outlet 4<br>Outlet 5<br>Outlet 6', 
  'Link': '<?php echo "http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']); ?>/audit.map.php'},
  {'Date': new Date("November 11, 2020"), 
  'Title': 'Outlet 1<br>Outlet 2<br>Outlet 3<br>Outlet 4<br>Outlet 5<br>Outlet 6', 
  'Link': '<?php echo "http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']); ?>/audit.map.php'},
  {'Date': new Date("November 12, 2020"), 
  'Title': 'Outlet 1<br>Outlet 2<br>Outlet 3<br>Outlet 4<br>Outlet 5<br>Outlet 6', 
  'Link': '<?php echo "http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']); ?>/audit.map.php'},
  {'Date': new Date("November 13, 2020"), 
  'Title': 'Outlet 1<br>Outlet 2<br>Outlet 3<br>Outlet 4<br>Outlet 5<br>Outlet 6', 
  'Link': '<?php echo "http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']); ?>/audit.map.php'},
  {'Date': new Date("November 16, 2020"), 
  'Title': 'Outlet 1<br>Outlet 2<br>Outlet 3<br>Outlet 4<br>Outlet 5<br>Outlet 6', 
  'Link': '<?php echo "http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']); ?>/audit.map.php'},
  {'Date': new Date("November 17, 2020"), 
  'Title': 'Outlet 1<br>Outlet 2<br>Outlet 3<br>Outlet 4<br>Outlet 5<br>Outlet 6', 
  'Link': '<?php echo "http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']); ?>/audit.map.php'},
  {'Date': new Date("November 18, 2020"), 
  'Title': 'Outlet 1<br>Outlet 2<br>Outlet 3<br>Outlet 4<br>Outlet 5<br>Outlet 6', 
  'Link': '<?php echo "http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']); ?>/audit.map.php'},
  {'Date': new Date("November 19, 2020"), 
  'Title': 'Outlet 1<br>Outlet 2<br>Outlet 3<br>Outlet 4<br>Outlet 5<br>Outlet 6', 
  'Link': '<?php echo "http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']); ?>/audit.map.php'},
  {'Date': new Date("November 20, 2020"), 
  'Title': 'Outlet 1<br>Outlet 2<br>Outlet 3<br>Outlet 4<br>Outlet 5<br>Outlet 6', 
  'Link': '<?php echo "http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']); ?>/audit.map.php'},
  {'Date': new Date("November 23, 2020"), 
  'Title': 'Outlet 1<br>Outlet 2<br>Outlet 3<br>Outlet 4<br>Outlet 5<br>Outlet 6', 
  'Link': '<?php echo "http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']); ?>/audit.map.php'},
  {'Date': new Date("November 24, 2020"), 
  'Title': 'Outlet 1<br>Outlet 2<br>Outlet 3<br>Outlet 4<br>Outlet 5<br>Outlet 6', 
  'Link': '<?php echo "http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']); ?>/audit.map.php'},
  {'Date': new Date("November 25, 2020"), 
  'Title': 'Outlet 1<br>Outlet 2<br>Outlet 3<br>Outlet 4<br>Outlet 5<br>Outlet 6', 
  'Link': '<?php echo "http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']); ?>/audit.map.php'},
  {'Date': new Date("November 26, 2020"), 
  'Title': 'Outlet 1<br>Outlet 2<br>Outlet 3<br>Outlet 4<br>Outlet 5<br>Outlet 6', 
  'Link': '<?php echo "http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']); ?>/audit.map.php'},
  {'Date': new Date("November 27, 2020"), 
  'Title': 'Outlet 1<br>Outlet 2<br>Outlet 3<br>Outlet 4<br>Outlet 5<br>Outlet 6', 
  'Link': '<?php echo "http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']); ?>/audit.map.php'},
  ];
var settings = {
	EventTargetWholeDay: true, DisabledDays: []}; //0,6
caleandar(element, events, settings);
</script>
</body>
</html>
