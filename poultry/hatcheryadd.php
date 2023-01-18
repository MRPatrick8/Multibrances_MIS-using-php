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
                    <h1 class="page-header">Add Hatchery</h1>
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
$name = $_POST["name"];
$integerroduction_date = $_POST["integerroduction_date"];
$idate_total = $_POST["idate_total"];
$received = $_POST["received"];
$hatched = $_POST["hatched"];
$survived = $_POST["survived"];
$received_by = $_POST["received_by"];

$res = mysql_query("INSERT INTO `hatchery`(`batch_flock_id`, `name`, `received`, `hatched`, `survived`, `received_by`, `integerroduction_date`, `idate_total`) VALUES ('$batch_flock_id','$name','$received','$hatched','$survived','$received_by','$integerroduction_date','$idate_total')");
if($res){

echo "<div class=\"alert alert-success alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>	

Hatchery Added Successfully!

</div><meta http-equiv='refresh' content='2; url=hatcherylist.php' />";


} else {
	
	
	
}



} 
	?>
		


	 <script>
  $(function() {
    $( "#datepicker" ).datepicker();
  });
  </script>		
				
				
				
				
				
				    <form action="hatcheryadd.php" method="post">
		
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
					
					<label>Name</label><br/>
                 	<input type="text" name="name" style="width:200px; height: 40px;" /><br/><br/>
				</div>  
                
                <div class="form-group">
					
					<label>Integerroduction Date</label><br/>
                 	<input type="date" name="integerroduction_date" style="width:200px; height: 40px;" /><br/><br/>
				</div>
                
                <div class="form-group">
					
					<label>Received By</label>
					
					<select name="received_by" class="form-control">
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
					
					<label>Received</label><br/>
                 	<input type="text" name="received" style="width:200px; height: 40px;" /><br/><br/>
				</div>
				<div class="form-group">
					
					<label>Total</label><br/>
                 	<input type="text" name="idate_total" style="width:200px; height: 40px;" /><br/><br/>
				</div>
                <div class="form-group">
					
					<label>Hatched</label><br/>
                 	<input type="text" name="hatched" style="width:200px; height: 40px;" /><br/><br/>
				</div>
                <div class="form-group">
					
					<label>Survived</label><br/>
                 	<input type="text" name="survived" style="width:200px; height: 40px;" /><br/><br/>
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