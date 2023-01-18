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
                    <h1 class="page-header">Add Order</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                
                <div class="col-md-10 col-md-offset-1">
				
				
	

		<?php

if($_POST)
{

$customer = $_POST["customer"];
$desc = $_POST["desc"];
$date_received = $_POST["date_received"];
$date_completed = $_POST["date_received"];
$date_collected = $_POST["date_received"];
$amount = $_POST["amount"];
$paid = $_POST["paid"];
$balance = $_POST["balance"];
$received_by = $_POST["received_by"];

$res = mysql_query("INSERT INTO `order`(`customer`, `description`, `amount`, `paid`, `balance`, `received_by`, `date_received`, `date_completed`, `date_collected`) VALUES ('$customer','$desc','$amount','$paid','$balance','$received_by','$date_received','$date_completed','$date_collected')");
if($res){

echo "<div class=\"alert alert-success alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>	

Order Added Successfully!

</div>";


} else {
	
	
	
}



} 
	?>
		


	 <script>
  $(function() {
    $( "#datepicker" ).datepicker();
  });
  </script>		
				
				
				
				
				
				    <form action="orderadd.php" method="post">
		
                    <div class="form-group">
					
					<label>Select Customer</label>
					
					<select name="customer" class="form-control">
					<option value="0">Please Select a Customer</option>
					<?php

$ddaa = mysql_query("SELECT id, fullname FROM customer ORDER BY id");
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
					
					<label>Description</label><br/>
                 	<input type="text" name="desc" style="width:200px; height: 40px;" /><br/><br/>
				</div>  
                
                <div class="form-group">
					
					<label>Date Received</label><br/>
                 	<input type="date" name="date_received" style="width:200px; height: 40px;" /><br/><br/>
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
					
					<label>Amount</label><br/>
                 	<?php echo($currency);?> <input type="text" name="amount" style="width:200px; height: 40px;" /><br/><br/>
				</div>
                <div class="form-group">
					
					<label>Paid</label><br/>
                 	<?php echo($currency);?> <input type="text" name="paid" style="width:200px; height: 40px;" /><br/><br/>
				</div>
                <div class="form-group">
					
					<label>Balance</label><br/>
                 	<?php echo($currency);?> <input type="text" name="balance" style="width:200px; height: 40px;" /><br/><br/>
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