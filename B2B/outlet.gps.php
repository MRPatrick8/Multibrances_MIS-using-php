<?php 
include('config.php');
include('session.control.php');

require_once('outlet.class.php');
$newOutlet = new outlet();

if(!empty($_REQUEST['c']) && $_REQUEST['c']>=4)
	{
	if($_SESSION['cu_type'] != 1){$_REQUEST['c']=0;}	
	} 
	
if(!empty($_REQUEST['outlet']))
	{
	$newOutlet->getOutlet($_REQUEST['outlet']);
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
<script src="https://api.mapbox.com/mapbox-gl-js/v1.12.0/mapbox-gl.js"></script>
<link href="https://api.mapbox.com/mapbox-gl-js/v1.12.0/mapbox-gl.css" rel="stylesheet" />
<style>
#map {
	width: 100%;
	height: 400px;
}
</style>
</head>
<body>

<!-- Simulate a smartphone / tablet -->
<div class="mobile-container"> 
  
  <!-- Top Navigation Menu -->
  <div class="topnav"> <a href="dashboard.php">Tianis Direct</a>
    <div id="myLinks"> <a href="order.php"><i class="fas fa-receipt"></i>&nbsp;Orders</a> <a href="product.php"><i class="fas fa-boxes"></i>&nbsp;Products</a> <a href="outlet.php" class="active"><i class="fas fa-store-alt"></i>&nbsp;Outlets</a>
      <?php if($cu_type==1){ ?>
      <a href="user.php"><i class="fas fa-user-cog"></i>&nbsp;Users</a>
      <?php } ?>
      <a href="diprad.php"><i class="fas fa-ad"></i>&nbsp;Promo</a> </div>
    <a href="javascript:void(0);" class="icon" onclick="myFunction()"> <i class="fa fa-bars"></i>&nbsp;</a> </div>
  <div style="padding:1px">
    <p align="right" class="bText"><strong><i class="fa fa-user-alt"></i>&nbsp;<?php echo $cu_login; ?> (<?php echo $cu_type_name; ?>) | <a href="session.close.php">Logout <i class="fa fa-sign-out-alt"></i></a></strong></p>
    <h3><strong><i class="fas fa-store-alt"></i>&nbsp;Outlet GeoLocation</strong></h3>
    <form action="outlet.sql.php?action=5<?php if(!empty($_REQUEST['outlet'])){echo "&id=".$_REQUEST['outlet'];}?>" method="post">
      <div class="_whiteBox" style="padding-top:20px;padding-bottom:5px">
        <input type="hidden" id="txt_id" name="txt_id" value="<?php if(!empty($_REQUEST['outlet'])){echo $_REQUEST['outlet'];} ?>" />
        <input type="hidden" name="redirect" value="<?php echo "http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/outlet.php';?>" />
        <input type="hidden" name="redirect2" value="<?php if(!empty($_REQUEST['viewPage'])){ echo '&viewPage='.$_REQUEST['viewPage'];} ?>" />
        <label for="txt_name_outlet"><b>Company name</b></label>
        <input type="text" name="txt_name_outlet" class="formInput" value="<?php if(!empty($_REQUEST['outlet'])){echo $newOutlet->name_outlet.' ('.$newOutlet->location_outlet.')';} ?>" readonly>
        <p>
        <div id="map"></div>
        <pre id="coordinates" class="coordinates"></pre>
        </p>
        <label for="txt_gps_longitude_outlet"><b>GPS Longitude</b></label>
        <input type="text" id="txt_gps_longitude_outlet" name="txt_gps_longitude_outlet" class="formInput" required value="<?php if(!empty($_REQUEST['outlet'])){echo $newOutlet->gps_longitude_outlet;} ?>" <?php if($_REQUEST['c']==4){echo 'readonly="1"'; }?>>
        <label for="txt_gps_latitude_outlet"><b>GPS Latitude</b></label>
        <input type="text" id="txt_gps_latitude_outlet" name="txt_gps_latitude_outlet" class="formInput" required value="<?php if(!empty($_REQUEST['outlet'])){echo $newOutlet->gps_latitude_outlet;} ?>" <?php if($_REQUEST['c']==4){echo 'readonly="1"'; }?>>
        <p>
          <button name="cmd_submit" class="btn" type="submit"><i class="fas fa-save"></i>&nbsp;Save GPS</button>
          <a href="outlet.php<?php if(!empty($_REQUEST['viewPage'])){ echo '&viewPage='.$_REQUEST['viewPage'];} ?>">
          <button class="btn" type="button" title="Cancel">Cancel</button>
          </a> </p>
      </div>
    </form>
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
  <script>
	mapboxgl.accessToken = 'pk.eyJ1IjoiYm5peiIsImEiOiJja2ZiMTYxdjAxMWVqMnNxc3Y5bHUxaWs3In0.zP8ZKgm2qlaj_NTEZpyYkA';
    var coordinates = document.getElementById('coordinates');
	var txt_long = document.getElementById('txt_gps_longitude_outlet');
	var txt_lat = document.getElementById('txt_gps_latitude_outlet');
    var map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/mapbox/streets-v11',
        center: [<?php if(!empty($_REQUEST['outlet'])){echo $newOutlet->gps_longitude_outlet;} ?>, <?php if(!empty($_REQUEST['outlet'])){echo $newOutlet->gps_latitude_outlet;} ?>],
        zoom: 15
    });

    var marker = new mapboxgl.Marker({
        draggable: true
    })
        .setLngLat([<?php if(!empty($_REQUEST['outlet'])){echo $newOutlet->gps_longitude_outlet;} ?>, <?php if(!empty($_REQUEST['outlet'])){echo $newOutlet->gps_latitude_outlet;} ?>])
        .addTo(map);

    function onDragEnd() {
        var lngLat = marker.getLngLat();
		txt_long.style.display = 'block';
		txt_long.value = lngLat.lng
		txt_lat.value = lngLat.lat
		
        //coordinates.style.display = 'block';
        //coordinates.innerHTML =
            //'Longitude: ' + lngLat.lng + '<br />Latitude: ' + lngLat.lat;
    }

    marker.on('dragend', onDragEnd);
	
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
</script> 
</div>
<!-- End smartphone / tablet look -->
</div>
</body>
</html>
