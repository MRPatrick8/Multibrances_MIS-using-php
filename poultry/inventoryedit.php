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
                    <h1 class="page-header">Update Order</h1>
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

$customer = $_POST["customer"];
$desc = $_POST["desc"];
$date_received = $_POST["date_received"];
$date_completed = $_POST["date_completed"];
$date_collected = $_POST["date_collected"];
$amount = $_POST["amount"];
$paid = $_POST["paid"];
$balance = $_POST["balance"];
$received_by = $_POST["received_by"];


///////////////////////-------------------->> Catid  ki 0??

 if($customer==0)
      {
$err1=1;
}
 if(isset($err1))
 $error = $err1;;


if ($error == 0){
	
$res = mysql_query("UPDATE `order` SET `customer`='".$customer."',`description`='".$desc."',`received_by`='".$received_by."',`amount`='".$amount."',`paid`='".$paid."',`balance`='".$balance."',`date_received`='".$date_received."',`date_completed`='".$date_completed."',`date_collected`='".$date_collected."' WHERE id='".$eid."'");

	if($res){
		echo "<div class=\"alert alert-success alert-dismissable\">
	<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>	
	
	UPDATED Successfully!
	
	</div>";
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
$old = mysql_fetch_array(mysql_query("SELECT * FROM `order` WHERE id='".$eid."'"));
?>				
				
				
				
				    <form action="orderedit.php?id=<?php echo $eid ?>" method="post">
		
                    <div class="form-group">
					
					<label>Select Customer</label>
					
					<select name="customer" class="form-control">
                    <?php

$ddaa = mysql_query("SELECT id, fullname FROM `customer` ORDER BY id");
    echo mysql_error();
    while ($data = mysql_fetch_array($ddaa))
    {
		if($old[1] == $data[0])
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
                 	<input type="text" name="desc" style="width:200px; height: 40px;" value="<?php echo($old[2]) ?>" /><br/><br/>
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
					
					<label>Amount</label><br/>
                 	<?php echo($currency);?> <input type="text" name="amount" style="width:200px; height: 40px;" value="<?php echo($old[3]) ?>" /><br/><br/>
				</div>
                
                <div class="form-group">
					
					<label>Paid</label><br/>
                 	<?php echo($currency);?> <input type="text" name="paid" style="width:200px; height: 40px;" value="<?php echo($old[4]) ?>" /><br/><br/>
				</div>
                <div class="form-group">
					
					<label>Balance</label><br/>
                 	<?php echo($currency);?> <input type="text" name="balance" style="width:200px; height: 40px;" value="<?php echo($old[5]) ?>" /><br/><br/>
				</div>
                
                <div class="form-group">
					
					<label>Date Received</label><br/>
                 	<input type="date" name="date_received" style="width:200px; height: 40px;" value="<?php echo($old[7]) ?>" /><br/><br/>
				</div>
                
                <div class="form-group">
					
					<label>Date Completed</label><br/>
                 	<input type="date" name="date_completed" style="width:200px; height: 40px;" value="<?php echo($old[8]) ?>" /><br/><br/>
				</div>
                
                <div class="form-group">
					
					<label>Date Collected</label><br/>
                 	<input type="date" name="date_collected" style="width:200px; height: 40px;" value="<?php echo($old[9]) ?>" /><br/><br/>
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