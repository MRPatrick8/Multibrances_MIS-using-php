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
                    <h1 class="page-header">Add Chicken No / Name</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                
                <div class="col-md-10 col-md-offset-1">
				
				
	

		<?php

if($_POST)
{

$breed_type = $_POST["breed_type"];
$batch_no = $_POST["batch_no"];

$res = mysql_query("INSERT INTO batch_no SET breed_type='".$breed_type."', batch_no='".$batch_no."'");
$cid = mysql_insert_id();
if($res){

echo "<div class=\"alert alert-success alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>	

Batch No / Name Added Successfully!

</div>
<meta http-equiv='refresh' content='2; url=batch_noview.php' /> 
";


}



} 
	?>
		


	 <script>
  $(function() {
    $( "#datepicker" ).datepicker();
  });
  </script>		
				
				
				
				
				
				    <form action="batch_noadd.php" method="post">
		
                    
                <div class="form-group">
					
					<label>Breed Type</label><br/>
                 	<select name="breed_type" class="form-control">
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
                 	<input type="text" name="batch_no" style="width:200px; height: 40px;" /><br/><br/>
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