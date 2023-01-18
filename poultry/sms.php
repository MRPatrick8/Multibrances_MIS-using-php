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
                    <h1 class="page-header">Send SMS</h1>
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
$message = $_POST["message"];
$smss = mysql_fetch_array(mysql_query("SELECT sms FROM general_setting"));
$sms = $smss[0];
$result = mysql_fetch_array(mysql_query("SELECT phonenumber FROM customer WHERE fullname='$customer'"));
$phone = $result[1];

$message = urlencode($message);
$url1=str_replace("[TO]",$phone,$sms);
$url=str_replace("[MESSAGE]",$message,$url1);
$ch = curl_init();
curl_setopt( $ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; rv:1.7.3) Gecko/20041001 Firefox/0.10.1" );
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
curl_setopt( $ch, CURLOPT_URL, $url ); 
$content = curl_exec( $ch );
$response = curl_getinfo( $ch );
curl_close ( $ch );
$date = date('Y-m-d');
$message = $_POST["message"]; 
$res = mysql_query("INSERT INTO `sms`(`customer`, `message`, `date`) VALUES ('$customer','$message','$date')");

if($res){

echo "<div class=\"alert alert-success alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>	

Message Sent Successfully!

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
				
				
				
				
				
				    <form action="sms.php" method="post">
		
                    <div class="form-group">
					
					<label>Select Customer</label>
					
					<select name="customer" id='customer' class="form-control">
					<option value="0">Please Select a Customer</option>
					<?php

$ddaa = mysql_query("SELECT id, fullname FROM customer ORDER BY id");
    echo mysql_error();
    while ($data = mysql_fetch_array($ddaa))
    {
		if($data[0] == 	$_GET["id"])
		{
			echo "<option value=\"$data[1]\" selected='selected'>$data[1]</option>";
		}
		else
		{
 			echo "<option value=\"$data[1]\">$data[1]</option>";
		}
	}
?>
					
					</select><br/>

</div>


<div class="form-group">
					
					<label>Select a Template</label>
					
					<select name="template" id ='template' class="form-control">
					<option value="0">Please Select a Template</option>
					<?php

$ddaa = mysql_query("SELECT id, title, msg FROM template ORDER BY id");
    echo mysql_error();
    while ($data = mysql_fetch_array($ddaa))
    {
		if($data[0] == 	$_GET["id"])
		{
			echo "<option value=\"$data[2]\" selected='selected'>$data[1]</option>";
		}
		else
		{
 			echo "<option value=\"$data[2]\">$data[1]</option>";
		}
	}
?>
					
					</select><br/>

</div>
                
                <div class="form-group">
					
					<label>Message</label><br/>
                 	<textarea rows="4" cols="50" name="message" id='message' class="form-control" type="text"></textarea><br/><br/>
				</div>  
					<input type="submit" class="btn btn-lg btn-success btn-block" value="SEND">
			    	</form>
                </div>
				<script>
						document.getElementById("template").onchange = function () {

						document.getElementById("message").value = 'Dear ' + document.getElementById("customer").options[this.selectedIndex].text + ','+ '\n' + this.value;
				
					};
				</script>		
						
						
						
						
				
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