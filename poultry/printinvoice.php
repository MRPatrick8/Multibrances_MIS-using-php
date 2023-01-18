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
 <style type="text/css" media="print">
        @page 
        {
            size: auto;   /* auto is the current printer page size */
            margin: 0mm;  /* this affects the margin in the printer settings */
        }

        body 
        {
            background-color:#FFFFFF;        
            margin: 0px;  /* the margin on the content before printing */
			padding: 20px;
       }
	   b, strong {
    font-weight: 100 !important;
}
	   
    </style>
	
  <script>
function printContent(el){
	var restorepage = document.body.innerHTML;
	var printcontent = document.getElementById(el).innerHTML;
	document.body.innerHTML = printcontent;
	window.print();
	document.body.innerHTML = restorepage;
}
</script>

    <div class="pageheader">
      <h2><i class="fa fa-th-list"></i>Print Receipt</h2>
    </div>

    
    <div class="contentpanel">
	
		<div id="ass" class="col-md-8 col-md-offset-2" style="
    border-style: solid;
    border-color: #bbb; background-color: #fff;"><br/>
	
	
		
		<div style="text-align:center"><img src="img/logo.png" alt="" height="30px"></div>
				
<?php	

$id = $_GET["id"];

$order = mysql_fetch_array(mysql_query("SELECT * FROM `order` WHERE id='".$id."'"));

$customer = mysql_fetch_array(mysql_query("SELECT fullname, phonenumber, address FROM customer WHERE id='".$order[1]."'"));
$staff = mysql_fetch_array(mysql_query("SELECT fullname FROM staff WHERE id='".$order[6]."'"));

?>			

<div class="row">
<div class="col-md-12">
<h3><u>ID: <?php echo $order[0]; ?></u></h3><b style="float:right; margin-top:40px;"> Date: &nbsp; &nbsp; <?php echo $order[9]; ?> </b>

<b>NAME: &nbsp; &nbsp; &nbsp; &nbsp; <?php echo $customer[0]; ?></b><br/>

<b>ADDRESS: &nbsp; &nbsp; &nbsp; &nbsp; <?php echo $customer[2]; ?></b><br/>

<b>PHONE: &nbsp; &nbsp; &nbsp; &nbsp; <?php echo $customer[1]; ?></b><br/>
<b>Served. By:</b> &nbsp; &nbsp; &nbsp; &nbsp; <?php echo $staff[0]; ?><br/><br/>
</div>


<div class="col-md-6"></div>

	</div><!-- ROW-->			
				
				
				
<div class="table-responsive">
                <table class="table table-success mb30">
                    <thead>
                      <tr>
                        <th>Description</th>
                        <th>Amount</th>
                        <th>Balance</th>
                      </tr>
                    </thead>
                    <tbody>

                   

                     
                  
	
<?php
echo "   <tr><td>$order[2]</td><td> $order[3] </td><td> $order[5] </td></tr>";

?>
      
  </tbody>
                </table>
                
                <div style='margin-left:40%;'><b>Staff Sign</b></div><br/><br/>
				<div style='margin-left:40%;'><b>Customer Sign</b></div>
                
            </div>
			
			
	<br/><br/><br/><br/>		
				<br/>
			
			
			
            </div>
			
		<div class="pull-right">
        <a href="" onClick="printContent('ass')" class="btn btn-info"><i class="icon-print icon-large"></i> Print</a>
        </div>	
		

    </div><!-- contentpanel -->
    


  
</section>


<?php
 include ('include/footer.php');
 ?>

<script src="js/jquery.datatables.min.js"></script>
<script src="js/select2.min.js"></script>

<script>
  jQuery(document).ready(function() {
    
    "use strict";
    
    jQuery('#table1').dataTable();
    
    jQuery('#table2').dataTable({
      "sPaginationType": "full_numbers"
    });
    
    // Select2
    jQuery('select').select2({
        minimumResultsForSearch: -1
    });
    
    jQuery('select').removeClass('form-control');
    
    // Delete row in a table
    jQuery('.delete-row').click(function(){
      var c = confirm("Continue delete?");
      if(c)
        jQuery(this).closest('tr').fadeOut(function(){
          jQuery(this).remove();
        });
        
        return false;
    });
    
    // Show aciton upon row hover
    jQuery('.table-hidaction tbody tr').hover(function(){
      jQuery(this).find('.table-action-hide a').animate({opacity: 1});
    },function(){
      jQuery(this).find('.table-action-hide a').animate({opacity: 0});
    });
  
  
  });
</script>



</body>
</html>



