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
 include ('header.php');
 ?>



 
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Add Egg Production</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                
                <div class="col-md-10 col-md-offset-1">
				
				
	

		<?php

if($_POST)
{

$batch_flock_id = $_POST["batch_flock_id"];
$total = $_POST["total"];
$cracked = $_POST["cracked"];
$double_yolk = $_POST["double_yolk"];
$dirty = $_POST["dirty"];
$other = $_POST["other"];
$date = $_POST["date"];
$worker_id = $_POST["worker_id"];

$res = mysql_query("INSERT INTO `egg_production`(`batch_flock_id`, `total`, `cracked`, `double_yolk`, `dirty`, `worker_id`, `other`, `date`) VALUES ('$batch_flock_id','$total','$cracked','$double_yolk','$dirty','$worker_id','$other','$date')");
if($res){

echo "<div class=\"alert alert-success alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>	

Egg Production Added Successfully!

</div><meta http-equiv='refresh' content='2; url=egg_productionlist.php' />";


} else {
	
	
	
}



} 
	?>
		


	 <script>
  $(function() {
    $( "#datepicker" ).datepicker();
  });
  </script>		
				
				
				
				
				
				    <form action="" method="post">
		
                    <div class="form-group">
					
					<label>Select Chicken Flock</label>
					
					<select name="batch_flock_id" class="form-control">
					<option value="0">Please Select a Chicken Flock</option>
					<?php

					$ddaa = mysql_query("SELECT bn.id,bt.breed_type, bn.batch_no FROM batch_no bn join breed_type bt on bn.breed_type = bt.id  ORDER BY bn.id");
						echo mysql_error();
						while ($data = mysql_fetch_array($ddaa))
						{
							if($data[0] == 	$_GET["id"])
							{
								echo "<option value=\"$data[0]\" selected='selected'>$data[1] $data[2]</option>";
							}
							else
							{
								echo "<option value=\"$data[0]\">$data[1] $data[2]</option>";
							}
						}
					?>
					
					</select><br/>

					</div>
                
                <div class="form-group">
					
					<label>Total</label><br/>
                 	<input type="text" name="total" style="width:200px; height: 40px;" /><br/><br/>
				</div>  
                
                <div class="form-group">
					
					<label>Cracked</label><br/>
                 	<input type="text" name="cracked" style="width:200px; height: 40px;" /><br/><br/>
				</div>
                
                <div class="form-group">
					
					<label>Staff</label>
					
					<select name="worker_id" class="form-control">
					<?php

					$ddaa = mysql_query("SELECT id, fullname FROM staff ORDER BY id");
						echo mysql_error();
						while ($data = mysql_fetch_array($ddaa))
						{									
					 echo "<option value=\"$data[0]\">$data[1]</option>";
						}
					?>
					
					</select><br/>    
                
                <div class="form-group">
					
					<label>Double Yolk</label><br/>
                 	<input type="text" name="double_yolk" style="width:200px; height: 40px;" /><br/><br/>
				</div>
                <div class="form-group">
					
					<label>Dirty</label><br/>
                 	<input type="text" name="dirty" style="width:200px; height: 40px;" /><br/><br/>
				</div>
                <div class="form-group">
					
					<label>Others</label><br/>
                 	<input type="text" name="other" style="width:200px; height: 40px;" /><br/><br/>
				</div>
                <div class="form-group">
					
					<label>Date</label><br/>
                 	<input type="date" name="date" style="width:200px; height: 40px;" /><br/><br/>
				</div>
					<input type="submit" class="btn btn-lg btn-success btn-block" value="ADD">
			    	</form>
                </div>
						
						
						
						
						
				
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
	    



<script src="js/bootstrap-timepicker.min.js"></script>


<script>
jQuery(document).ready(function(){
    
  
  jQuery("#ssn").mask("999-99-9999");
  
  // Time Picker
  jQuery('#timepicker').timepicker({defaultTIme: false});
  jQuery('#timepicker2').timepicker({showMeridian: false});
  jQuery('#timepicker3').timepicker({minuteStep: 15});

  
});
</script>







<?php
 include ('footer.php');
 ?>