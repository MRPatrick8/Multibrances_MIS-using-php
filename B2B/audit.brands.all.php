<?php 
include('config.php');
include('session.control.php');

require_once('user.class.php');
$newUser = new user();

require_once('outlet.class.php');
$newOutlet = new outlet();

require_once('brand.class.php');
$newBrand = new brand();

require_once('visit.class.php');
$newVisit = new visit();

require_once('visit.brand.class.php');
$newVisitBrand = new visitBrand();
$newVisitBrand2 = new visitBrand();

require_once('question.class.php');
$newQuestion = new question();

require_once('visit.response.class.php');
$newVisitResponse = new visitResponse();

if(!empty($_REQUEST['outlet']))
	{
	$newOutlet->getOutlet($_REQUEST['outlet']);
	}
	
if(!empty($_REQUEST['c']) && $_REQUEST['c']>=4)
	{
	if($_SESSION['cu_type'] != 1){$_REQUEST['c']=0;}	
	} 

if(empty($_REQUEST['visit']))
	{
	$_REQUEST['visit'] = '';
	}

if(empty($_REQUEST['brand']) || $_REQUEST['brand'] > 21)
	{
	$_REQUEST['brand'] = 1;
	}

if(!$cu_is_outlet && $cu_type == 3)
	{
	$_REQUEST['user'] = $cu_id;
	}
if(!isset($_REQUEST['select']))
	{
	$_REQUEST['select'] = date('Y-m-d');
	}
//print_r($_REQUEST);die()

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
      <a href="audit.map.php?select=<?php echo $_REQUEST['select']; ?>" class="active"><i class="far fa-comments"></i>&nbsp;Audit</a> <a href="audit.report.php?select=<?php echo $_REQUEST['select']; ?>"><i class="fas fa-print"></i>&nbsp;Availability</a> <a href="audit.calendar.php"><i class="far fa-calendar-alt"></i>&nbsp;Call Cycles</a> <a href="order.bulk.php"><i class="fas fa-receipt"></i>&nbsp;Order on behalf</a>
      <?php } ?>
    </div>
    <a href="javascript:void(0);" class="icon" onclick="myFunction()"> <i class="fa fa-bars"></i>&nbsp;</a> </div>
  <div style="padding:1px">
    <p align="right" class="bText"><strong><i class="fa fa-user-alt"></i>&nbsp;<?php echo $cu_login; ?> (<?php echo $cu_type_name; ?>) | <a href="session.close.php">Logout <i class="fa fa-sign-out-alt"></i></a></strong></p>
    <h3><strong><a href="audit.map.php?select=<?php echo $_REQUEST['select']; ?>"><i class="far fa-calendar-check"></i>&nbsp;<?php echo $_REQUEST['select']; ?></a>&nbsp;&raquo;&nbsp;<i class="far fa-comments"></i>&nbsp; Audit
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
        <option value="?outlet=<?php echo $_REQUEST['outlet']; ?>&user=<?php echo $arrUser[$k]->id; ?>" <?php if(!empty($_REQUEST['user']) && $_REQUEST['user'] == $arrUser[$k]->id){ echo 'selected';} ?>><?php echo $arrUser[$k]->firstname_user.' '.$arrUser[$k]->lastname_user; ?></option>
        <?php 
                    $k++;
                    }
                }
            ?>
      </select>
      <?php } ?>
      </strong></h3>
    <?php 

	if(!empty($_REQUEST['message']))
		{
		$alertColor='success';
		if(strpos($_REQUEST['message'], "nok") !== false){$alertColor='warning';}
		echo '<div class="alertBox '.$alertColor.'">
				<span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span>  
				'.$dConfig["message"][$_REQUEST['message']].
			 '</div>';
		}


$brands_audited = 0;

if($newVisit->getVisitUserOutlet($_REQUEST['user'], $_REQUEST['outlet'], $_REQUEST['select']))
	{
	$_REQUEST['visit'] = $newVisit->id;
	$newVisitBrand->getVisitBrandId($_REQUEST['visit'], $_REQUEST['brand']);
	$brands_audited = $newVisitBrand2->getBrandDoneCount($_REQUEST['visit']);
	}

$total_brands = 21;
$audit_progress = $brands_audited / $total_brands * 100;

?>
    <div class="_whiteBox">
      <p align="right"><a href="outlet.gps.php?outlet=<?php echo $_REQUEST['outlet']; ?>"><i class="fas fa-map-marker-alt"></i>&nbsp;Update GPS</a>&nbsp;&nbsp;&nbsp;<a href="audit.pictures.php?outlet=<?php echo $_REQUEST['outlet']; ?>" title="Any new menu visibility, table talkers or signage to share with us?"><i class="fas fa-images"></i>&nbsp;Add pictures</a>&nbsp;&nbsp;&nbsp;<a href="order.bulk.php?outlet=<?php echo $_REQUEST['outlet']; ?>"><i class="fas fa-receipt"></i>&nbsp;New order</a></p>
    </div>
    <br>
    <div class="_whiteBox">
      <form action="visit.sql.php?action=23" method="post">
        <h3> <strong><i class="fas fa-store-alt"></i></strong>&nbsp;
          <?php if(!empty($_REQUEST['outlet'])){echo $newOutlet->name_outlet.' ('.$newOutlet->location_outlet.')';} ?>
          <input type="hidden" name="txt_user" value="<?php if(!empty($_REQUEST['user'])){echo $_REQUEST['user'];} ?>" required>
        </h3>
        <table width="100%" border="0" cellpadding="5" cellspacing="0">
          <tr>
            <th width="40%" align="left">Brands</th>
            <th>P</th>
            <th>V</th>
            <th>A</th>
            <th width="40%">Comments</th>
          </tr>
          <tr>
            <td>Jameson <span>1 litre</span></td>
            <td align="center"><input type="checkbox" name="checkbox" id="checkbox"></td>
            <td align="center"><input type="checkbox" name="checkbox" id="checkbox"></td>
            <td align="center"><input type="checkbox" name="checkbox" id="checkbox"></td>
            <td align="center"><textarea name="txt_response[]" style="width: 80%; max-width: 80%;" class="btn"></textarea></td>
          </tr>
          <tr>
            <td>Jameson 750 ml</td>
            <td align="center"><input type="checkbox" name="checkbox" id="checkbox"></td>
            <td align="center"><input type="checkbox" name="checkbox" id="checkbox"></td>
            <td align="center"><input type="checkbox" name="checkbox" id="checkbox"></td>
            <td align="center"><textarea name="txt_response[]" style="width: 80%; max-width: 80%;" required class="btn"></textarea></td>
          </tr>
          <tr>
            <td>Jameson Black Barrel 750 ml</td>
            <td align="center"><input type="checkbox" name="checkbox" id="checkbox"></td>
            <td align="center"><input type="checkbox" name="checkbox" id="checkbox"></td>
            <td align="center"><input type="checkbox" name="checkbox" id="checkbox"></td>
            <td align="center"><textarea name="txt_response[]" style="width: 80%; max-width: 80%;" required class="btn"></textarea></td>
          </tr>
          <tr>
            <td>Chivas 12 1 litre</td>
            <td align="center"><input type="checkbox" name="checkbox" id="checkbox"></td>
            <td align="center"><input type="checkbox" name="checkbox" id="checkbox"></td>
            <td align="center"><input type="checkbox" name="checkbox" id="checkbox"></td>
            <td align="center"><textarea name="txt_response[]" style="width: 80%; max-width: 80%;" required class="btn"></textarea></td>
          </tr>
          <tr>
            <td>Chivas XV 750 ml</td>
            <td align="center"><input type="checkbox" name="checkbox" id="checkbox"></td>
            <td align="center"><input type="checkbox" name="checkbox" id="checkbox"></td>
            <td align="center"><input type="checkbox" name="checkbox" id="checkbox"></td>
            <td align="center"><textarea name="txt_response[]" style="width: 80%; max-width: 80%;" required class="btn"></textarea></td>
          </tr>
          <tr>
            <td>Chivas 18 1 litre</td>
            <td align="center"><input type="checkbox" name="checkbox" id="checkbox"></td>
            <td align="center"><input type="checkbox" name="checkbox" id="checkbox"></td>
            <td align="center"><input type="checkbox" name="checkbox" id="checkbox"></td>
            <td align="center"><textarea name="txt_response[]" style="width: 80%; max-width: 80%;" required class="btn"></textarea></td>
          </tr>
          <tr>
            <td>Ballantines Finest 1 litre</td>
            <td align="center"><input type="checkbox" name="checkbox" id="checkbox"></td>
            <td align="center"><input type="checkbox" name="checkbox" id="checkbox"></td>
            <td align="center"><input type="checkbox" name="checkbox" id="checkbox"></td>
            <td align="center"><textarea name="txt_response[]" style="width: 80%; max-width: 80%;" required class="btn"></textarea></td>
          </tr>
          <tr>
            <td>Glenlivet Fonders Reserve</td>
            <td align="center"><input type="checkbox" name="checkbox" id="checkbox"></td>
            <td align="center"><input type="checkbox" name="checkbox" id="checkbox"></td>
            <td align="center"><input type="checkbox" name="checkbox" id="checkbox"></td>
            <td align="center"><textarea name="txt_response[]" style="width: 80%; max-width: 80%;" required class="btn"></textarea></td>
          </tr>
          <tr>
            <td>Glenlivet 15 Years</td>
            <td align="center"><input type="checkbox" name="checkbox" id="checkbox"></td>
            <td align="center"><input type="checkbox" name="checkbox" id="checkbox"></td>
            <td align="center"><input type="checkbox" name="checkbox" id="checkbox"></td>
            <td align="center"><textarea name="txt_response[]" style="width: 80%; max-width: 80%;" required class="btn"></textarea></td>
          </tr>
          <tr>
            <td>Imperial Blue 750 ml</td>
            <td align="center"><input type="checkbox" name="checkbox" id="checkbox"></td>
            <td align="center"><input type="checkbox" name="checkbox" id="checkbox"></td>
            <td align="center"><input type="checkbox" name="checkbox" id="checkbox"></td>
            <td align="center"><textarea name="txt_response[]" style="width: 80%; max-width: 80%;" required class="btn"></textarea></td>
          </tr>
          <tr>
            <td>John Walker Red 1 litre</td>
            <td align="center"><input type="checkbox" name="checkbox" id="checkbox"></td>
            <td align="center"><input type="checkbox" name="checkbox" id="checkbox"></td>
            <td align="center"><input type="checkbox" name="checkbox" id="checkbox"></td>
            <td align="center"><textarea name="txt_response[]" style="width: 80%; max-width: 80%;" required class="btn"></textarea></td>
          </tr>
          <tr>
            <td>John Walker Black 1 litre</td>
            <td align="center"><input type="checkbox" name="checkbox" id="checkbox"></td>
            <td align="center"><input type="checkbox" name="checkbox" id="checkbox"></td>
            <td align="center"><input type="checkbox" name="checkbox" id="checkbox"></td>
            <td align="center"><textarea name="txt_response[]" style="width: 80%; max-width: 80%;" required class="btn"></textarea></td>
          </tr>
          <tr>
            <td>Label 5 750 ml</td>
            <td align="center"><input type="checkbox" name="checkbox" id="checkbox"></td>
            <td align="center"><input type="checkbox" name="checkbox" id="checkbox"></td>
            <td align="center"><input type="checkbox" name="checkbox" id="checkbox"></td>
            <td align="center"><textarea name="txt_response[]" style="width: 80%; max-width: 80%;" required class="btn"></textarea></td>
          </tr>
          <tr>
            <td>Glerfiddich 12 years</td>
            <td align="center"><input type="checkbox" name="checkbox" id="checkbox"></td>
            <td align="center"><input type="checkbox" name="checkbox" id="checkbox"></td>
            <td align="center"><input type="checkbox" name="checkbox" id="checkbox"></td>
            <td align="center"><textarea name="txt_response[]" style="width: 80%; max-width: 80%;" required class="btn"></textarea></td>
          </tr>
          <tr>
            <td>Boss Whisley</td>
            <td align="center"><input type="checkbox" name="checkbox" id="checkbox"></td>
            <td align="center"><input type="checkbox" name="checkbox" id="checkbox"></td>
            <td align="center"><input type="checkbox" name="checkbox" id="checkbox"></td>
            <td align="center"><textarea name="txt_response[]" style="width: 80%; max-width: 80%;" required class="btn"></textarea></td>
          </tr>
          <tr>
            <td>Bazooka</td>
            <td align="center"><input type="checkbox" name="checkbox" id="checkbox"></td>
            <td align="center"><input type="checkbox" name="checkbox" id="checkbox"></td>
            <td align="center"><input type="checkbox" name="checkbox" id="checkbox"></td>
            <td align="center"><textarea name="txt_response[]" style="width: 80%; max-width: 80%;" required class="btn"></textarea></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="5" align="right" nowrap="nowrap">
              <button name="cmd_submit" type="submit" class="btn"><i class="fas fa-save"></i>&nbsp;Save&nbsp;<i class="fas fa-chevron-right"></i></button>
              <a href="audit.map.php?select=<?php echo $_REQUEST['select']; ?>">
              <button class="btn" type="button" title="Cancel">Cancel</button>
              </a></td>
          </tr>
        </table>
        <h3><i class="fas fa-boxes"></i>
          <input type="hidden" name="txt_outlet" value="<?php if(!empty($_REQUEST['outlet'])){echo $_REQUEST['outlet'];} ?>" />
          <input type="hidden" name="txt_brand" value="<?php if(!empty($_REQUEST['brand'])){echo $_REQUEST['brand'];} ?>" required>
        </h3>
        <input type="hidden" name="txt_visit" value="<?php if(!empty($_REQUEST['visit'])){echo $_REQUEST['visit'];} ?>">
        <input type="hidden" name="txt_select" value="<?php echo $_REQUEST['select'].date(" H:i:s"); ?>">
        <input type="hidden" name="redirect" value="<?php echo "http://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];?>?outlet=<?php echo $_REQUEST['outlet']; ?>&user=<?php echo $_REQUEST['user']; ?>&select=<?php echo $_REQUEST['select']; ?>&brand=<?php echo $_REQUEST['brand']+1; ?>" />
      </form>
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
</div>
<!-- End smartphone / tablet look -->
</div>
</body>
</html>
