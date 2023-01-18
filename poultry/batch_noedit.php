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
                    <h1 class="page-header">Edit Chicken No / Name</h1>
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
$batch_no = $_POST["batch_no"];


///////////////////////-------------------->> Catid  ki 0??

 

$res = mysql_query("UPDATE `batch_no` SET `breed_type`='".$breed_type."',`batch_no`='".$batch_no."' WHERE id='".$eid."'");

	if($res){
		echo "<div class=\"alert alert-success alert-dismissable\">
	<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>	
	
	UPDATED Successfully!
	<meta http-equiv='refresh' content='2; url=batch_noview.php' />
	
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
$old = mysql_fetch_array(mysql_query("SELECT breed_type, batch_no FROM batch_no WHERE id='".$eid."'"));
?>				
				
				
				
				    <form action="batch_noedit.php" method="post">
		
                    
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
					
					<label>Chicken No</label><br/>
                 	<input type="text" name="batch_no" style="width:200px; height: 40px;" value="<?php echo($old[1]) ?>" /><br/><br/>
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