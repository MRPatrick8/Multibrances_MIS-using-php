<?php
require_once('function.php');
connectdb();
session_start();

if (!is_user()) {
	redirect('index.php');
}

?>


<?php
 $user = $_SESSION['username'];
$usid = mysql_query("SELECT id FROM users WHERE username='".$user."'");
 $uid = $usid[0];
 
$customer = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM customer")); 
$order = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM `order`"));
$income = mysql_fetch_array(mysql_query("SELECT sum(amount) FROM `income` WHERE date > DATE_SUB(NOW(), INTERVAL 30 DAY)"));
$expense = mysql_fetch_array(mysql_query("SELECT sum(amount) FROM `expense` WHERE date > DATE_SUB(NOW(), INTERVAL 30 DAY)"));

$egg_production_month = mysql_fetch_array(mysql_query("SELECT sum(total - cracked) FROM `egg_production` WHERE month(date) = month(NOW())"));
$batch_flock_month = mysql_fetch_array(mysql_query("SELECT sum(total) FROM `batch_flock` WHERE month(date) = month(NOW())"));
$hatchery_month = mysql_fetch_array(mysql_query("SELECT sum(survived) FROM `hatchery` WHERE month(integerroduction_date) = month(NOW())"));
$vaccination_medication_program_month = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM `vaccination_medication_program` WHERE month(date_given) = month(NOW())"));


$vaccination_medication_program_day = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM `vaccination_medication_program` WHERE date_given = NOW()"));
$egg_production_day = mysql_fetch_array(mysql_query("SELECT sum(total - cracked) FROM `egg_production` WHERE day(date) = day(NOW())"));
$batch_flock_day = mysql_fetch_array(mysql_query("SELECT sum(total) FROM `batch_flock` WHERE day(date) = day(NOW())"));
$hatchery_day = mysql_fetch_array(mysql_query("SELECT sum(survived) FROM `hatchery` WHERE day(idate_total) = day(NOW())"));
 
 
 
 include ('header.php');
 ?>


    

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-user fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $customer[0] ?></div>
                                    <div>Total Customers!</div>
                                </div>
                            </div>
                        </div>
                        <a href="customerview.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-shopping-cart fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $order[0] ?></div>
                                    <div>Total Orders!</div>
                                </div>
                            </div>
                        </div>
                        <a href="orderlist.php">
                            <div class="panel-footer">
                            	<span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-money fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">‎<?php echo $currency.$income[0] ?></div>
                                    <div>Last 30 Days Income!</div>
                                </div>
                            </div>
                        </div>
                        <a href="incview.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
				 <div class="col-lg-3 col-md-6">
                    <div class="panel panel-danger">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-credit-card fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $currency.$expense[0] ?></div>
                                    <div>Last 30 Days Expenses!</div>
                                </div>
                            </div>
                        </div>
                        <a href="expview.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
               
            </div>

            <!-- /.row -->
			
			
			<!-- Records -->
			<div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-success">
                        <div class="panel-heading">
						<div class="row" align="center">
                            <h3>Chicken Flock</h3></div>
                            <div class="row">
                                <div class="col-xs-9">
                                    This Month: <span class="pull-right"><?php echo $Chicken_flock_month[0] ?></span>
                                    <div>Today: <span class="pull-right"><?php echo $Chicken_flock_day[0] ?><span/></div>
                                </div>
                            </div>
                        </div>
                        <a href="batch_flockadd.php">
                            <div class="panel-footer">
                                <span class="pull-left">Take Record</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
						<div class="row" align="center"><h3>Egg Production</h3></div>
                            <div class="row">
                                <div class="col-xs-9">
                                    This Month: <span class="pull-right"><?php echo $egg_production_month[0] ?></span>
                                    <div>Today: <span class="pull-right"><?php echo $egg_production_day[0] ?><span/></div>
                                </div>
                            </div>
                        </div>
                        <a href="egg_productionadd.php">
                            <div class="panel-footer">
                                <span class="pull-left">Take Record</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <!-- <div class="col-lg-3 col-md-6">
                    <div class="panel panel-success">
                        <div class="panel-heading">
						<div class="row" align="center"><h3>Hatchery</h3></div>
                            <div class="row">
                                <div class="col-xs-9">
                                    This Month: <span class="pull-right"><?php //echo $hatchery_month[0] ?></span>
                                    <div>Today: <span class="pull-right"><?php //echo $hatchery_day[0] ?></span></div>
                                </div>
                            </div>
                        </div>
                        <a href="hatcheryadd.php">
                            <div class="panel-footer">
                                <span class="pull-left">Take Record</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
				 <div class="col-lg-3 col-md-6">
                    <div class="panel panel-success">
                        <div class="panel-heading">
						<div class="row" align="center"><h3>Vaccination</h3></div>
                            <div class="row">
                                <div class="col-xs-9">
                                    Vaccines Given This month: <span class="pull-right"><?php //echo $vaccination_medication_program_month[0] ?></span>
									Vaccines Given Today: <span class="pull-right"><?php //echo $vaccination_medication_program_day[0] ?></span>
                                </div>
                            </div>
                        </div>
                        <a href="vaccination_medication_programadd.php">
                            <div class="panel-footer">
                                <span class="pull-left">Take Record</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div> -->
			
            <div class="wrapper">
                <div class="panel-body" style="width: 100%; float: left;">
                        <table class="table" width="97%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                           <th scope="col">Income, Expenses and Profit for past 30 days</th>
                          </tr>
                          <tr class="inner">
                            <td ><canvas id="myChart" height="400px" width="800"></canvas></td>
                          </tr>  
                        </table>
                </div>  
			</div>
        </div>
        <!-- /#page-wrapper -->
<?php
function income($today) {
	$sites = mysql_fetch_array(mysql_query("SELECT sum(amount) FROM `income` WHERE date LIKE '%$today%'"));
	$sites2 = mysql_fetch_array(mysql_query("SELECT sum(amount) FROM `order` WHERE date_received LIKE '%$today%'"));
	$site = $sites[0] + $sites2[0];
	return $site;
}
function profit($today) {
	$sites = mysql_fetch_array(mysql_query("SELECT sum(amount) FROM `income` WHERE date LIKE '%$today%'"));
	$sites2 = mysql_fetch_array(mysql_query("SELECT sum(amount) FROM `order` WHERE date_received LIKE '%$today%'"));
	$site1 = $sites[0] + $sites2[0];
	$site2 = mysql_fetch_array(mysql_query("SELECT sum(amount) FROM expense WHERE date LIKE '%$today%'"));
	$site = $site1 - $site2[0];
	if($site<0) $site=0;
	return $site;
}
function expenses($today) {
	$sites = mysql_fetch_array(mysql_query("SELECT sum(amount) FROM expense WHERE date LIKE '%$today%'"));
	$site = $sites[0];
	return $site;	
}

$income = '"'.income( date('m/d/Y', (strtotime(date('m/d/Y'))-((29*60*60*24)))) ).'"';
$dates = '"'.date('Y-m-d', strtotime(date('Y-m-d')) - (29*60*60*24) ).'"';	
		
for ($i = 28; $i >= 1; $i--) {
	$income .= ',"'.income( date('m/d/Y', (strtotime(date('m/d/Y'))-($i*60*60*24)) ) ).'"';
	$dates .= ',"'.( date('Y-m-d', (strtotime(date('Y-m-d'))-($i*60*60*24)) ) ).'"';	
}
$dates .= ',"'.date('Y-m-d').'"';
$income .= ',"'.income(date('m/d/Y')).'"';

$expenses = '"'.expenses( date('Y-m-d', (strtotime(date('Y-m-d'))-((29*60*60*24)))) ).'"';
for ($i = 28; $i >= 1; $i--) {
	$expenses .= ',"'.expenses( date('Y-m-d', (strtotime(date('Y-m-d'))-($i*60*60*24)) ) ).'"';
}
$expenses .= ',"'.expenses(date('Y-m-d')).'"';

$profit = '"'.profit( date('Y-m-d', (strtotime(date('Y-m-d'))-((29*60*60*24)))) ).'"';
for ($i = 28; $i >= 1; $i--) {
	$profit .= ',"'.profit( date('Y-m-d', (strtotime(date('Y-m-d'))-($i*60*60*24)) ) ).'"';
}
$profit .= ',"'.profit(date('Y-m-d')).'"';
?>

<script>
//current year income / expense	
var barChartData3 = {
		labels : [<?php echo $dates; ?>],
		datasets : [
			{
				label: "Expenses",
				fillColor : "rgba(220,0,0,0.2)",
				strokeColor : "rgba(220,0,0,1)",
				pointColor : "rgba(220,0,0,1)",
				pointStrokeColor : "#fff",
				pointHighlightFill : "#fff",
				pointHighlightStroke : "rgba(220,220,220,1)",
				data : [<?php echo $expenses; ?>]
			} ,
			{
				label: "Income",
				fillColor : "rgba(0,120,0,0.2)",
				strokeColor : "rgba(0,120,0,1)",
				pointColor : "rgba(0,320,0,1)",
				pointStrokeColor : "#fff",
				pointHighlightFill : "#fff",
				pointHighlightStroke : "rgba(220,220,220,1)",
				data : [<?php echo $income; ?>]
			} ,
			{
				label: "Profit",
				fillColor : "rgba(13, 31, 162,0.2)",
				strokeColor : "rgba(13, 31, 162,1)",
				pointColor : "rgba(13, 31, 162,1)",
				pointStrokeColor : "#fff",
				pointHighlightFill : "#fff",
				pointHighlightStroke : "rgba(220,220,220,1)",
				data : [<?php echo $profit; ?>]
			} 
		]

	}
	window.onload = function(){
		var ctx = document.getElementById("myChart").getContext("2d");
		window.myBar = new Chart(ctx).Bar(barChartData3, {
			responsive : true
		});
	}	 

	
</script>
<?php
 include ('footer.php');
 ?>