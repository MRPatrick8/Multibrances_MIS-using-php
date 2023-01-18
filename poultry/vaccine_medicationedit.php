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
                    <h1 class="page-header">Edit Vaccine Medication</h1>
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

$strain = mysql_real_escape_string($_POST["strain"]);
$route = mysql_real_escape_string($_POST["route"]);
$name = mysql_real_escape_string($_POST["name"]);
$age = mysql_real_escape_string($_POST["age"]);
$dose = mysql_real_escape_string($_POST["dose"]);


///////////////////////-------------------->> Catid  ki 0??

 

$res = mysql_query("UPDATE `vaccine_medication` SET `name`='".$name."',`strain`='".$strain."', `route`='".$route."',`age`='".$age."',`dose`='".$dose."' WHERE id='".$eid."'");

	if($res){
		echo "<div class=\"alert alert-success alert-dismissable\">
	<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>	
	
	UPDATED Successfully!
	<meta http-equiv='refresh' content='2; url=vaccine_medicationview.php' />
	
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
$old = mysql_fetch_array(mysql_query("SELECT * FROM vaccine_medication WHERE id='".$eid."'"));
?>				
				
				
				
				    <form action="vaccine_medicationedit.php?id=<?php echo $eid ?>" method="post">
		
                    
                <div class="form-group">
					
					<label>Name of Vaccine</label><br/>
                 	<input type="text" name="name" style="width:200px; height: 40px;" value="<?php echo($old[3]) ?>" /><br/><br/>
				</div>
				
				<div class="form-group">
					
					<label>Strain</label><br/>
                 	<input type="text" name="strain" style="width:200px; height: 40px;" value="<?php echo($old[1]) ?>" /><br/><br/>
				</div> 
                
                <div class="form-group">
					
					<label>Route</label><br/>
                 	<input type="text" name="route" style="width:200px; height: 40px;" value="<?php echo($old[2]) ?>" /><br/><br/>
				</div>  
                 
				
				<div class="form-group">
					
					<label>Dose</label><br/>
                 	<input type="text" name="dose" style="width:200px; height: 40px;" value="<?php echo($old[4]) ?>" /><br/><br/>
				</div>
                
                <div class="form-group">
					
					<label>Age</label><br/>
					
					<input type="text" name="age" style="width:200px; height: 40px;" value="<?php echo($old[5]) ?>" /><br/><br/>
                
                
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