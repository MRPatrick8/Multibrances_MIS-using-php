<?php 
include('config.php');
include('session.control.php');

require_once('user.class.php');
$newUser = new user();

require_once('brand.class.php');
$newBrand = new brand();

require_once('outlet.class.php');
$newOutlet = new outlet();

require_once('visit.class.php');
$newVisit = new visit();

require_once('visit.brand.class.php');
$newVisitBrand = new visitBrand();

require_once('visit.response.class.php');
$newVisitResponse = new visitResponse();

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
<title>Tianis Direct</title>
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
	
SELECT COUNT(*) FROM b2b_audit_brand
SELECT * FROM b2b_visit_response r, b2b_visit_brand b, b2b_visit v WHERE b.id_visit = v.id AND r.id_visit_brand = b.id AND date(v.datetime_visit) = '2020-12-05' AND b.id_brand = 1

SELECT * FROM b2b_visit_response r, b2b_visit_brand b, b2b_visit v WHERE b.id_visit = v.id AND r.id_visit_brand = b.id AND date(v.datetime_visit) = '2020-12-05' AND b.id_brand = 1 AND r.id_question = 1


SELECT * FROM b2b_visit_brand b, b2b_visit v WHERE b.id_visit = v.id AND date(v.datetime_visit) = '2020-12-05' AND b.id_brand = 1

SELECT * FROM b2b_visit_response r, b2b_visit_brand b, b2b_visit v WHERE b.id_visit = v.id AND r.id_visit_brand = b.id AND date(v.datetime_visit) = '2020-12-05' AND b.id_brand = 1 AND r.id_question = 1 AND r.response = 'Yes'

SELECT * FROM b2b_user_outlet WHERE id_user = 3

SELECT COUNT(*) FROM b2b_user_outlet WHERE id_user = 3
	
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
      <a href="order.php"><i class="fas fa-receipt"></i>&nbsp;Orders</a> <a href="product.php"><i class="fas fa-boxes"></i>&nbsp;Products</a> <a href="outlet.php" class="active"><i class="fas fa-store-alt"></i>&nbsp;Outlets</a> <a href="user.php"><i class="fas fa-user-cog"></i>&nbsp;Users</a> <a href="diprad.php"><i class="fas fa-ad"></i>&nbsp;Promo</a>
      <?php } elseif($cu_type==3){?>
      <a href="audit.map.php?select=<?php echo $_REQUEST['select']; ?>"><i class="far fa-comments"></i>&nbsp;Audit</a> <a href="audit.report.php?select=<?php echo $_REQUEST['select']; ?>" class="active"><i class="fas fa-print"></i>&nbsp;Availability</a> <a href="audit.calendar.php"><i class="far fa-calendar-alt"></i>&nbsp;Call Cycles</a> <a href="order.bulk.php"><i class="fas fa-receipt"></i>&nbsp;Order on behalf</a>
      <?php } ?>
    </div>
    <a href="javascript:void(0);" class="icon" onclick="myFunction()"> <i class="fa fa-bars"></i>&nbsp;</a> </div>
  <div style="padding:1px">
    <p align="right" class="bText"><strong><i class="fa fa-user-alt"></i>&nbsp;<?php echo $cu_login; ?> (<?php echo $cu_type_name; ?>) | <a href="session.close.php">Logout <i class="fa fa-sign-out-alt"></i></a></strong></p>
    <h3><strong><i class="fas fa-print"></i>&nbsp;Brand availability report</strong></h3>
    <div class="_whiteBox">
      <table border="0" cellspacing="0" cellpadding="5">
        <?php if($cu_type == 1){ ?>
        <tr>
          <td align="right"><strong>Business<br>
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
              <option value="?user=<?php echo $arrUser[$k]->id.'&week='.$week.'&year='.$year; if(!empty($_REQUEST['select'])){echo '&select='.$_REQUEST['select'];} ?>" <?php if(!empty($_REQUEST['user']) && $_REQUEST['user'] == $arrUser[$k]->id){ echo 'selected';} ?>><?php echo $arrUser[$k]->firstname_user.' '.$arrUser[$k]->lastname_user; ?></option>
              <?php 
                    $k++;
                    }
                }
            ?>
            </select></td>
        </tr>
        <?php } ?>
        <tr>
          <td colspan="2" align="right">Active Customers: <strong>300</strong> | Active Rep(s): <strong>3</strong></td>
        </tr>
      </table>
    </div>
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
      <br>
      <table width="100%" border="0" cellspacing="5" cellpadding="0">
        <?php 

$whereCritere = '';
$orderByCritere = ' own_brand DESC, id ';
$arrBrand = $newBrand->getAllBrand($whereCritere,$orderByCritere);

if(!empty($arrBrand))
	{
	$i=0; 
	$brand_available=0;
	$groupText = "Own brands";
	while(!empty($arrBrand[$i]))
		{
		if(empty($_REQUEST['brand']))
			{
			$_REQUEST['brand']=$arrBrand[$i]->id;
			}
		$brand_available = $newVisitResponse->countBrandAvailability($arrBrand[$i]->id, $_REQUEST['select']);
		$percentage_available = $brand_available/127*100;
		?>
        <tr>
          <td><?php echo $i+1; ?></td>
          <td><?php echo $arrBrand[$i]->name_brand; ?></td>
          <td><?php echo number_format($percentage_available, 2); ?>%</td>
        </tr>
        <?php
		$i++;
		}
	}
?>
      </table>
      <br>
      <br>
      <!--      <table width="100%" border="0" cellpadding="0" cellspacing="5">
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
--> <br>
    </div>
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
</body>
</html>
