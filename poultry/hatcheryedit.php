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
                    <h1 class="page-header">Update Hatchery</h1>
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
$name = $_POST["name"];
$integerroduction_date = $_POST["integerroduction_date"];
$idate_total = $_POST["idate_total"];
$received = $_POST["received"];
$hatched = $_POST["hatched"];
$survived = $_POST["survived"];
$received_by = $_POST["received_by"];


///////////////////////-------------------->> Catid  ki 0??

 if($batch_flock_id==0)
      {
$err1=1;
}
 if(isset($err1))
 $error = $err1;;


if ($error == 0){
	
$res = mysql_query("UPDATE `hatchery` SET `batch_flock_id`='".$batch_flock_id."',`name`='".$name."',`received_by`='".$received_by."',`received`='".$received."',`hatched`='".$hatched."',`survived`='".$survived."',`integerroduction_date`='".$integerroduction_date."',`idate_total`='".$idate_total."' WHERE id='".$eid."'");

	if($res){
		echo "<div class=\"alert alert-success alert-dismissable\">
	<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>	
	
	UPDATED Successfully!
	
	</div><meta http-equiv='refresh' content='2; url=hatcherylist.php' />";
	}else{
		echo "<div class=\"alert alert-danger alert-dismissable\">
	<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>	
	
	Some Problem Occurs, Please Try Again. 
	
	</div>";
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
$old = mysql_fetch_array(mysql_query("SELECT * FROM `hatchery` WHERE id='".$eid."'"));
?>				
				
				
				
				    <form action="hatcheryedit.php?id=<?php echo $eid ?>" method="post">
		
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
					
					<label>Name</label><br/>
                 	<input type="text" name="name" style="width:200px; height: 40px;" value="<?php echo($old[2]) ?>" /><br/><br/>
				</div>
                
                <div class="form-group">
					
					<label>Received By</label>
					
					<select name="received_by" class="form-control">
					<?php
					$ddaa = mysql_query("SELECT id, fullname FROM staff ORDER BY id");
						echo mysql_error();
						while ($data = mysql_fetch_array($ddaa))
						{
							if($old[6] == $data[0])
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
					
					<label>Received</label><br/>
                 	<input type="text" name="received" style="width:200px; height: 40px;" value="<?php echo($old[3]) ?>" /><br/><br/>
				</div>
                
                <div class="form-group">
					
					<label>Hatched</label><br/>
                 	<input type="text" name="hatched" style="width:200px; height: 40px;" value="<?php echo($old[7]) ?>" /><br/><br/>
				</div>
                <div class="form-group">
					
					<label>Survived</label><br/>
                 	<input type="text" name="survived" style="width:200px; height: 40px;" value="<?php echo($old[8]) ?>" /><br/><br/>
				</div>
                
                <div class="form-group">
					
					<label>Integerroduction Date</label><br/>
                 	<input type="date" name="integerroduction_date" style="width:200px; height: 40px;" value="<?php echo($old[5]) ?>" /><br/><br/>
				</div>
                
                <div class="form-group">
					
					<label>Total</label><br/>
                 	<input type="text" name="idate_total" style="width:200px; height: 40px;" value="<?php echo($old[6]) ?>" /><br/><br/>
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