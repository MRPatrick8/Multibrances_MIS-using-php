<?php 
include('config.php');
include('session.control.php');

require_once('user.class.php');
$newUser = new user();

require_once('outlet.class.php');
$newOutlet = new outlet();

require_once('visit.class.php');
$newVisit = new visit();

require_once('visit.brand.class.php');
$newVisitBrand = new visitBrand();

if(!empty($_REQUEST['c']) && $_REQUEST['c']>=4)
	{
	if($_SESSION['cu_type'] != 1){$_REQUEST['c']=0;}	
	} 

if(isset($_REQUEST['select']))
	{
	$date=date_create($_REQUEST['select']);
	$_REQUEST['year'] = date_format($date,"o");
	$_REQUEST['week'] = date_format($date,"W");
	}

$dt = new DateTime;
if (isset($_REQUEST['year']) && isset($_REQUEST['week'])) {
    $dt->setISODate($_REQUEST['year'], $_REQUEST['week']);
} else {
    $dt->setISODate($dt->format('o'), $dt->format('W'));
}
$year = $dt->format('o');
$week = $dt->format('W');

if(!isset($_REQUEST['select']))
	{
	if($week == date('W') && $year == date('o'))
		{
		$_REQUEST['select'] = date('Y-m-d');
		}
	else
		{
		$_REQUEST['select'] = $dt->format('Y-m-d');
		}
	}

if(!$cu_is_outlet && $cu_type == 3)
	{
	$_REQUEST['user'] = $cu_id;
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
<title>Tianis Direct - Audit Report</title>
<script type="text/javascript">
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if(restore) selObj.selectedIndex=0;
}
</script>
<script src="https://api.mapbox.com/mapbox-gl-js/v1.12.0/mapbox-gl.js"></script>
<link href="https://api.mapbox.com/mapbox-gl-js/v1.12.0/mapbox-gl.css" rel="stylesheet" />
<style>
._1left {
	border-left: 1pt solid #000000;
}
._1right {
	border-right: 1pt solid #000000;
}
._1bottom {
	border-bottom: 1pt solid #000000;
}
._1top {
	border-top: 1pt solid #000000;
	background-color: #F2F4FF;
}
._2left {
	border-left: 2px solid #000000;
}
._2right {
	border-right: 2px solid #000000;
}
._2bottom {
	border-bottom: 2px solid #000000;
}
._2top {
	border-top: 2px solid #000000;
}
</style>
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
<style>
#map {
	width: 100%;
	height: 350px;
}
</style>
</head>
<body>

<!-- Simulate a smartphone / tablet -->
<div class="mobile-container"> 
  
  <!-- Top Navigation Menu -->
  <div class="topnav"> <a href="<?php if($cu_type==1){ ?>dashboard.php<?php }else{echo 'javascript:void(0);';} ?>" onclick="myFunction()">Tianis Direct</a>
    <div id="myLinks">
    <?php if($cu_type==1){ ?>
    <a href="order.php"><i class="fas fa-receipt"></i>&nbsp;Orders</a> 
    <a href="product.php"><i class="fas fa-boxes"></i>&nbsp;Products</a> 
    <a href="outlet.php" class="active"><i class="fas fa-store-alt"></i>&nbsp;Outlets</a>
    <a href="user.php"><i class="fas fa-user-cog"></i>&nbsp;Users</a>
    <a href="diprad.php"><i class="fas fa-ad"></i>&nbsp;Promo</a>
    <?php } elseif($cu_type==3){?>
    <a href="audit.map.php?select=<?php echo $_REQUEST['select']; ?>" class="active"><i class="far fa-comments"></i>&nbsp;Audit</a>
	<a href="audit.report.php?select=<?php echo $_REQUEST['select']; ?>"><i class="fas fa-print"></i>&nbsp;Availability</a>
	<a href="audit.calendar.php"><i class="far fa-calendar-alt"></i>&nbsp;Call Cycles</a>
    <a href="order.bulk.php"><i class="fas fa-receipt"></i>&nbsp;Order on behalf</a>
	<?php } ?>
    </div>
    <a href="javascript:void(0);" class="icon" onclick="myFunction()"> <i class="fa fa-bars"></i>&nbsp;</a> </div>
  <div style="padding:1px">
    <p align="right" class="bText"><strong><i class="fa fa-user-alt"></i>&nbsp;<?php echo $cu_login; ?> (<?php echo $cu_type_name; ?>) | <a href="session.close.php">Logout <i class="fa fa-sign-out-alt"></i></a></strong></p>
    <h3><strong><i class="far fa-comments"></i>&nbsp;Audit
      <?php if($cu_type == 1){ ?>
      by
      <select class="btn" onChange="MM_jumpMenu('parent',this,0)">
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
        <option value="?user=<?php echo $arrUser[$k]->id.'&week='.$week.'&year='.$year; if(!empty($_REQUEST['select'])){echo '&select='.$_REQUEST['select'];} ?>" <?php if(!empty($_REQUEST['user']) && $_REQUEST['user'] == $arrUser[$k]->id){ echo 'selected';} ?>><?php echo $arrUser[$k]->firstname_user.' '.$arrUser[$k]->lastname_user; ?></option>
        <?php 
                    $k++;
                    }
                }
            ?>
      </select>
      <?php } ?>
      </strong></h3>
    <div class="_whiteBox">
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="10%"><a href="<?php echo '?user='.$_REQUEST['user'].'&week='.($week-1).'&year='.$year; ?>" title="Previous Circle">
            <button type="button" class="btn"><i class="fas fa-chevron-left"></i></button>
            </a></td>
          <td width="80%" align="center"><h3><i class="far fa-calendar-alt"></i>&nbsp;
              <?php 
		  
		  echo 'Week '.$dt->format('Y M d'); 
		  $dt->modify('+6 days');
		  echo ' - '.$dt->format('M d');
		  $dt->modify('-6 days');
		  
		  
		  ?>
            </h3></td>
          <td width="10%" align="right"><a href="<?php echo '?user='.$_REQUEST['user'].'&week='.($week+1).'&year='.$year; ?>" title="Next Circle">
            <button type="button" class="btn"><i class="fas fa-chevron-right"></i></button>
            </a></td>
        </tr>
        <tr>
          <td colspan="3">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="3"><table width="100%" border="0" cellspacing="0" cellpadding="5">
              <tr>
                <td  class="_1bottom" align="center">&nbsp;</td>
                <?php 
			
do {	
	?>
                <td  class="<?php if($dt->format('Y-m-d') == $_REQUEST['select']){echo '_1left _1right _1top'; $cycleDay = $dt->format('l');}else{echo '_1bottom';} ?>" align="center"><a title="<?php echo $dt->format('Y-m-d'); ?>" href="<?php echo '?user='.$_REQUEST['user'].'&week='.$week.'&year='.$year.'&select='.$dt->format('Y-m-d'); ?>"><strong><?php echo $dt->format('D') ?></strong><br>
                  <?php echo $dt->format('d M') ?></a></td>
                <?php 
	$dt->modify('+1 day');
} while ($week == $dt->format('W'));

			?>
                <td  class="_1bottom" align="center">&nbsp;</td>
              </tr>
            </table></td>
        </tr>
      </table>
      <h3><i class="far fa-calendar-check"></i>&nbsp;Call circle progress report</h3>
      <table width="100%" border="0" cellpadding="2" cellspacing="0">
        <?php 
        $orderByCritere = ' location_outlet, name_outlet ';
		
		$cycleWeek = 'Week 1 and week 3';
		if($week % 2 == 0)
		  	{
			$cycleWeek = 'Week 2 and week 4';
			}
		
        $arrUserOutlet = $newUser->getUserCallCycle($_REQUEST['user'], $cycleWeek, $cycleDay, $orderByCritere);
		
		if(!empty($arrUserOutlet))
			{
			$k=0; 
			while(!empty($arrUserOutlet[$k]))
				{
					
					
				$brands_audited = 0;
				
				if($newVisit->getVisitUserOutlet($_REQUEST['user'], $arrUserOutlet[$k]->id_outlet, $_REQUEST['select']))
					{
					$brands_audited = $newVisitBrand->getBrandDoneCount($newVisit->id);
					}
				
				$total_brands = 21;
				$audit_progress = $brands_audited / $total_brands * 100;
			  ?>
        <tr>
          <td><br>
            <i class="fas fa-store-alt"></i>&nbsp;<a href="audit.brands.all.php?outlet=<?php echo $arrUserOutlet[$k]->id_outlet;?>&user=<?php echo $_REQUEST['user']; ?>&select=<?php echo $_REQUEST['select']; ?>"><?php echo $arrUserOutlet[$k]->name_outlet.' ('.$arrUserOutlet[$k]->location_outlet.')'; ?></a></td>
          <td align="right"><br>
            <?php echo number_format($audit_progress,0); ?>%</td>
        </tr>
        <tr>
          <td colspan="2"><progress value="<?php echo number_format($audit_progress,0); ?>" max="100" style="width:100%"><?php echo number_format($audit_progress,0); ?>%</progress></td>
        </tr>
        <?php
				$k++;
				}
			}
		else
			{
			echo '<p>No outlet to visit on this day.</p>';	
			}
        ?>
      </table>
      <br>
    </div>
    <br>
    <div class="_whiteBox" style="padding-bottom:15px">
      <h3><i class="fas fa-map-marker-alt"></i>&nbsp;Outlets geolocations</h3>
      <div id="map"></div>
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
<?php 

$orderByCritere = ' gps_latitude_outlet, gps_longitude_outlet ';
$arrUserOutlet = $newUser->getUserCallCycle($_REQUEST['user'], $cycleWeek, $cycleDay, $orderByCritere);

?>
  <script>
	mapboxgl.accessToken = 'pk.eyJ1IjoiYm5peiIsImEiOiJja2ZiMTYxdjAxMWVqMnNxc3Y5bHUxaWs3In0.zP8ZKgm2qlaj_NTEZpyYkA';
	var map = new mapboxgl.Map({
		container: 'map',
		style: 'mapbox://styles/mapbox/streets-v11',
		center: [30.09232775585184, -1.9535209145376342],
		zoom: 11
	});


<?php 

if(!empty($arrUserOutlet))
	{
	$i=0; 
	while(!empty($arrUserOutlet[$i]))
		{ 
?>
    var marker = new mapboxgl.Marker()
        .setLngLat([<?php echo $arrUserOutlet[$i]->gps_longitude_outlet;?>, <?php echo $arrUserOutlet[$i]->gps_latitude_outlet;?>])
		.setPopup(new mapboxgl.Popup({ offset: 25 }).setHTML('<strong><i class="fas fa-store-alt"></i>&nbsp;<?php echo $arrUserOutlet[$i]->name_outlet.' ('.$arrUserOutlet[$i]->location_outlet.')';?></strong><br><a href="audit.brands.all.php?outlet=<?php echo $arrUserOutlet[$i]->id;?>"><i class="far fa-comments"></i>&nbsp;Start Audit</a><br>&nbsp;<a href="order.bulk.php?outlet=<?php echo $arrUserOutlet[$i]->id;?>"><i class="fas fa-receipt"></i>&nbsp;New order</a><br><a href="audit.pictures.php?outlet=<?php echo $arrUserOutlet[$i]->id;?>"><i class="fas fa-images"></i>&nbsp;Add pictures</a><br>&nbsp;<a href="outlet.gps.php?outlet=<?php echo $arrUserOutlet[$i]->id;?>"><i class="fas fa-map-marker-alt"></i>&nbsp;Update GPS</a>'))
        .addTo(map);
		
<?php 
		$i++;
		}	
?>

/* 	map.addControl(
		new MapboxGeocoder({
			accessToken: mapboxgl.accessToken,
			mapboxgl: mapboxgl
		})
	);

   var marker = new mapboxgl.Marker()
        .setLngLat([30.06091554759098, -1.946395915606118])
		.setPopup(new mapboxgl.Popup({ offset: 25 }).setHTML('<strong><i class="fas fa-store-alt"></i>&nbsp;Sawa Citi</strong><br><a href="audit.brands.all.php?id=2"><i class="far fa-comments"></i>&nbsp;Start audit</a><br>&nbsp;<a href="order.bulk.php?id=2"><i class="fas fa-receipt"></i>&nbsp;New order</a><br><a href="audit.pictures.php?id=2"><i class="fas fa-images"></i>&nbsp;Add pictures</a><br>&nbsp;<a href="outlet.gps.php?id=2"><i class="fas fa-map-marker-alt"></i>&nbsp;Update GPS</a>'))
        .addTo(map);
    var marker = new mapboxgl.Marker()
        .setLngLat([30.058834153395708, -1.9493339180368139])
		.setPopup(new mapboxgl.Popup({ offset: 25 }).setHTML('<a href="#">Outlet 3</a>'))
        .addTo(map);
    var marker = new mapboxgl.Marker()
        .setLngLat([30.055744248610523, -1.9457096661251967])
		.setPopup(new mapboxgl.Popup({ offset: 25 }).setHTML('<a href="#">Outlet 4</a>'))
        .addTo(map);
*/		
	// Add zoom and rotation controls to the map.
	map.addControl(new mapboxgl.NavigationControl());
	
	// Add geolocate control to the map.
	map.addControl(
		new mapboxgl.GeolocateControl({
			positionOptions: {
			enableHighAccuracy: true
			},
			trackUserLocation: true
		})
	);
<?php 	

	}

?>
	
</script> 
</div>
<!-- End smartphone / tablet look -->
</div>
</body>
</html>
