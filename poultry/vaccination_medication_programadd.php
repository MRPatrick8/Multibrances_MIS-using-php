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
                    <h1 class="page-header">Add Vaccination Records</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                
                <div class="col-md-10 col-md-offset-1">
				
				
	

		<?php

if($_POST)
{

$vaccine = $_POST["vaccine"];
$name = $_POST["name"];
$date_given = $_POST["date_given"];
$due_date = $_POST["date_given"];
$expiry_date = $_POST["date_given"];
$reaction = $_POST["reaction"];
$other_details = $_POST["other_details"];
$batch_flock_id = $_POST["batch_flock_id"];
$administered_by = $_POST["administered_by"];

$res = mysql_query("INSERT INTO `vaccination_medication_program`(`vaccine_id`, `name`, `reaction`, `other_details`, `batch_flock_id`, `administered_by`, `date_given`, `due_date`, `expiry_date`) VALUES ('$vaccine','$name','$reaction','$other_details','$batch_flock_id','$administered_by','$date_given','$due_date','$expiry_date')");
if($res){

echo "<div class=\"alert alert-success alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>	

Vaccination Records Added Successfully!

</div><meta http-equiv='refresh' content='2; url=customerview.php' />";


} else {
	
	
	
}



} 
	?>
		


	 <script>
  $(function() {
    $( "#datepicker" ).datepicker();
  });
  </script>		
				
				
				
				
				
				    <form action="vaccination_medication_programadd.php" method="post">
		
                    <div class="form-group">
					
					<label>Select Vaccine</label>
					
					<select name="vaccine" class="form-control">
					<option value="0">Please Select a Vaccine</option>
					<?php

$ddaa = mysql_query("SELECT id, name FROM vaccine_medication ORDER BY id");
    echo mysql_error();
    while ($data = mysql_fetch_array($ddaa))
    {
		if($data[0] == 	$_GET["id"])
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

</div>
                
                <div class="form-group">
					
					<label>Name</label><br/>
                 	<input type="text" name="name" style="width:200px; height: 40px;" /><br/><br/>
				</div>  
                
                <div class="form-group">
					
					<label>Date Administered</label><br/>
                 	<input type="date" name="date_given" style="width:200px; height: 40px;" /><br/><br/>
				</div>
                
                <div class="form-group">
					
					<label>Administered By</label>
					
					<select name="administered_by" class="form-control">
					<?php

					$ddaa = mysql_query("SELECT id, fullname FROM staff ORDER BY id");
						echo mysql_error();
						while ($data = mysql_fetch_array($ddaa))
						{									
					 echo "<option value=\"$data[0]\">$data[1]</option>";
						}
					?>
					
					</select><br/>
				</div>					
                
                <div class="form-group">
					
					<label>Reaction</label><br/>
                 	<input type="text" name="reaction" style="width:200px; height: 40px;" /><br/><br/>
				</div>
                <div class="form-group">
					
					<label>Other Details</label><br/>
                 	<input type="text" name="other_details" style="width:200px; height: 40px;" /><br/><br/>
				</div>
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