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
                    <h1 class="page-header">Edit Chicken Flock</h1>
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

$breed_type = $_POST["breed_type"];
$total = $_POST["total"];
$date = $_POST["date"];
$batch_no = $_POST["batch_no"];
$expired = $_POST["expired"];
$laying = $_POST["laying"];


///////////////////////-------------------->> Catid  ki 0??

 

$res = mysql_query("UPDATE `batch_flock` SET `breed_type`='".$breed_type."',`total`='".$total."',`batch_no`='".$batch_no."',`date`='".$date."',`expired`='".$expired."',`laying`='".$laying."' WHERE id='".$eid."'");

	if($res){
		echo "<div class=\"alert alert-success alert-dismissable\">
	<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>	
	
	UPDATED Successfully!
	<meta http-equiv='refresh' content='2; url=batch_flockview.php' />
	
	</div>";
	}else{
		echo "<div class=\"alert alert-danger alert-dismissable\">
	<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>	
	
	Some Problem Occurs, Please Try Again. 
	
	</div>";
	}
 
}
?>
		


	 <script>
  $(function() {
    $( "#datepicker" ).datepicker();
  });
  </script>		
				
<?php
$old = mysql_fetch_array(mysql_query("SELECT breed_type, total, batch_no, expired, laying, date FROM batch_flock WHERE id='".$eid."'"));
?>				
				
				
				
				    <form action="batch_flockedit.php" method="post">
		
                    
                <div class="form-group">
					
					<label>Breed Type</label><br/>
                 	<select name="breed_type" class="form-control">
						<?php

						$details = mysql_fetch_array(mysql_query("SELECT breed_type FROM breed_type WHERE id='".$old[0]."'"));
						echo ("<option value=\"$old[0]\">$details[0]</option> ");
						?>
						<option value="0">Please Select a Breed Type</option>
						<?php

							$ddaa = mysql_query("SELECT id, breed_type FROM breed_type ORDER BY id");
							echo mysql_error();
							while ($data = mysql_fetch_array($ddaa))
							{									
								echo "<option value=\"$data[0]\">$data[1]</option>";
							}
						?>
						
						</select><br/>
				</div> 
                
                <div class="form-group">
					
					<label>Total</label><br/>
                 	<input type="text" name="total" style="width:200px; height: 40px;" value="<?php echo($old[1]) ?>" /><br/><br/>
				</div>  
                   
                
                <div class="form-group">
					
					<label>Select Chicken No</label>
					
					<select name="batch_flock_id" class="form-control">
                    <?php

						$ddaa = mysql_query("SELECT bn.id,bt.breed_type, bn.batch_no FROM batch_no bn join breed_type bt on bn.breed_type = bt.id  ORDER BY bn.id");
							echo mysql_error();
							while ($data = mysql_fetch_array($ddaa))
							{
								if($old[1] == $data[2])
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
					
					<label>Expired</label>
					
					<select name="expired" class="form-control">
                        <option value="0" <?php if($old[3]== 0) echo('selected = "selected"'); ?>>No</option>
                        <option value="1"<?php if($old[3]== 1) echo('selected = "selected"'); ?>>Yes</option>
					</select><br/>
						
                </div>
				
				<div class="form-group">

				<label>Laying</label>
				
					<select name="laying" class="form-control">
                        <option value="0" <?php if($old[4]== 0) echo('selected = "selected"'); ?>>No</option>
                        <option value="1"<?php if($old[4]== 1) echo('selected = "selected"'); ?>>Yes</option>
					</select><br/>
                	
                </div>
				<div class="form-group">
					
					<label>Date</label><br/>
                 	<input type="date" name="date" style="width:200px; height: 40px;" value="<?php echo($old[5]) ?>" /><br/><br/>
					
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