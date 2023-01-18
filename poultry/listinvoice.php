<?php
include ('include/header.php');
?>

  
  <link href="css/style.default.css" rel="stylesheet">
  <link href="css/jquery.datatables.css" rel="stylesheet">
</head>
<body>   
 <?php
include ('include/sidebar.php');
?>

    <div class="pageheader">
      <h2><i class="glyphicon glyphicon-list-alt"></i>Invoice List</h2>
    </div>

    
    <div class="contentpanel">
	 <div class="panel panel-default">

        <div class="panel-body">
		
		
		
		
		 
				
				
		<div class="col-md-12">		
				
          <div class="table-responsive">
          <table class="table table-striped" id="table2">
              <thead>
                 <tr>

                    <th>INVOICE ID</th>
                    <th>DATE</th>
                    <th>AMOUNT</th>
                    <th>Customer</th>
                    <th>Ref. By</th>
                    </tr>
              </thead>
              <tbody>
                
				
				<?php

$i=1;

$ddaa = mysql_query("SELECT id, ttl, tm, did, pid FROM invoice ORDER BY id");
    echo mysql_error();
    while ($data = mysql_fetch_array($ddaa))
    {
	
$dt = date("Y-m-d", $data[2]);

$doctor = mysql_fetch_array(mysql_query("SELECT name, per FROM doctor WHERE id='".$data[3]."'"));
$ptn = mysql_fetch_array(mysql_query("SELECT name, mobile FROM patient WHERE id='".$data[4]."'"));

 echo "                                
 <tr>
   <td><a href=\"viewinvoice.php?id=$data[0]\">$data[0]</a></td>
   <td>$dt</td>
   <td>$data[1]</td>
   <td>$ptn[0] - $ptn[1]</td>
   <td>$doctor[0] ($doctor[1] %)</td>


                                        </tr>
	";
	
	$i++;
	}
?>
				
				
			
				




				
				 
              </tbody>
           </table>
          </div><!-- table-responsive -->
		  
		  </div> 
				
		  
	  
		  
        </div>
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
  
  
    var spinner = jQuery('#spinner').spinner();
  spinner.spinner('value', 0);
</script>



</body>
</html>



