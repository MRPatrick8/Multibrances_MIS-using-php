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
                    <h1 class="page-header">Add Vaccine Medication</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                
                <div class="col-md-10 col-md-offset-1">
				
				
	

		<?php

if($_POST)
{
$strain = mysql_real_escape_string($_POST["strain"]);
$name = mysql_real_escape_string($_POST["name"]);
$route = mysql_real_escape_string($_POST["route"]);
$age = mysql_real_escape_string($_POST["age"]);
$dose = mysql_real_escape_string($_POST["dose"]);

$res = mysql_query("INSERT INTO vaccine_medication SET strain='".$strain."', route='".$route."', name='".$name."', dose='".$dose."', age='".$age."'");
$cid = mysql_insert_id();
if($res){

echo "<div class=\"alert alert-success alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>	

Customer Added Successfully!

</div>
<meta http-equiv='refresh' content='2; url=vaccine_medicationview.php' /> 
";


}



} 
	?>
		


	 <script>
  $(function() {
    $( "#datepicker" ).datepicker();
  });
  </script>		
				
				
				
				
				
				    <form action="vaccine_medicationadd.php" method="post">
		
                    
                
                <div class="form-group">
					
					<label>Name of Vaccine</label><br/>
                 	<input type="text" name="name" style="width:200px; height: 40px;" /><br/><br/>
				</div>
				
				<div class="form-group">
					
					<label>Strain</label><br/>
                 	<input type="text" name="strain" style="width:200px; height: 40px;" /><br/><br/>
				</div>  
                
                <div class="form-group">
					
					<label>Route</label><br/>
                 	<input type="text" name="route" style="width:200px; height: 40px;" /><br/><br/>
				</div>    
                
				
				<div class="form-group">
					
					<label>Dose</label><br/>
                 	<input type="text" name="dose" style="width:200px; height: 40px;" /><br/><br/>
				</div>
                
                <div class="form-group">
					
					<label>Age</label><br/>
					
					<input type="text" name="age" style="width:200px; height: 40px;" value="" /><br/><br/>
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