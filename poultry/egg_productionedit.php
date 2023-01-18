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
                    <h1 class="page-header">Update Egg Production</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                
                <div class="col-md-10 col-md-offset-1">
				
				
	

		<?php
$eid = $_GET["id"];

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


///////////////////////-------------------->> Catid  ki 0??

 if($batch_flock_id==0)
      {
$err1=1;
}
 if(isset($err1))
 $error = $err1;;


if ($error == 0){
	
$res = mysql_query("UPDATE `egg_production` SET `batch_flock_id`='".$batch_flock_id."',`total`='".$total."',`worker_id`='".$worker_id."',`cracked`='".$cracked."',`double_yolk`='".$double_yolk."',`dirty`='".$dirty."',`other`='".$other."',`date`='".$date."' WHERE id='".$eid."'");

	if($res){
		echo "<div class=\"alert alert-success alert-dismissable\">
	<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>	
	
	UPDATED Successfully!
	
	</div><meta http-equiv='refresh' content='2; url=egg_productionlist.php' />";
	}else{
		echo "<div class=\"alert alert-danger alert-dismissable\">
	<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>	
	
	Some Problem Occurs, Please Try Again. 
	
	</div><meta http-equiv='refresh' content='2; url=egg_productionlist.php />";
	}
} 
}
?>
		


	 <script>
  $(function() {
    $( "#datepicker" ).datepicker();
  });
  </script>		
				
<?php
$old = mysql_fetch_array(mysql_query("SELECT * FROM `egg_production` WHERE id='".$eid."'"));
?>				
				
				
				
				    <form action="egg_productionedit.php?id=<?php echo $eid ?>" method="post">
		
                    <div class="form-group">
					
					<label>Select Chicken Flock</label>
					
					<select name="batch_flock_id" class="form-control">
                    <?php

						$ddaa = mysql_query("SELECT bn.id,bt.breed_type, bn.batch_no FROM batch_no bn join breed_type bt on bn.breed_type = bt.id  ORDER BY bn.id");
							echo mysql_error();
							while ($data = mysql_fetch_array($ddaa))
							{
								if($old[1] == $data[0])
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
                 	<input type="text" name="total" style="width:200px; height: 40px;" value="<?php echo($old[2]) ?>" /><br/><br/>
				</div>
                
                <div class="form-group">
					
					<label>Staff</label>
					
					<select name="worker_id" class="form-control">
					<?php
					$ddaa = mysql_query("SELECT id, fullname FROM staff ORDER BY id");
						echo mysql_error();
						while ($data = mysql_fetch_array($ddaa))
						{
							if($old[7] == $data[0])
							{									
								echo "<option value=\"$data[0]\" selected='selected'>$data[1]</option>";
							}
							else
							{
								echo "<option value=\"$data[0]\">$data[1]</option>";
							}
						}
					?>
					
					</select><br/>   
                
                <div class="form-group">
					
					<label>Cracked</label><br/>
                 	<input type="text" name="cracked" style="width:200px; height: 40px;" value="<?php echo($old[3]) ?>" /><br/><br/>
				</div>
                
                <div class="form-group">
					
					<label>Double Yolk</label><br/>
                 	<input type="text" name="double_yolk" style="width:200px; height: 40px;" value="<?php echo($old[4]) ?>" /><br/><br/>
				</div>
                <div class="form-group">
					
					<label>Dirty</label><br/>
                 	<input type="text" name="dirty" style="width:200px; height: 40px;" value="<?php echo($old[5]) ?>" /><br/><br/>
				</div>
                
                <div class="form-group">
					
					<label>Others</label><br/>
                 	<input type="text" name="other" style="width:200px; height: 40px;" value="<?php echo($old[6]) ?>" /><br/><br/>
				</div>
                
                <div class="form-group">
					
					<label>Date</label><br/>
                 	<input type="text" name="date" style="width:200px; height: 40px;" value="<?php echo($old[8]) ?>" /><br/><br/>
				</div>
					<input type="submit" class="btn btn-lg btn-success btn-block" value="Update">
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