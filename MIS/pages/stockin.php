<?php session_set_cookie_params(0);
session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;
if(empty($_SESSION['branch'])):
header('Location:../index.php');
endif;
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Product | <?php include('../dist/includes/title.php');?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap.css">
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="../plugins/select2/select2.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
    <link rel='shortcut icon' type='image/x-icon' href="../upload/TKAY LOGO.png">
    <style>
      
    </style>
 </head>
  <!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
  <body class="hold-transition skin-<?php echo $_SESSION['skin'];?> layout-top-nav">
    <div class="wrapper">
      <?php include('../dist/includes/header.php');?>
      <!-- Full Width Column -->
      <div class="content-wrapper">
        <div class="container">
          <!-- Content Header (Page header) -->
          <section class="content-header">

            <h1>
              <a class="btn btn-lg btn-warning" href="home.php">Back</a>
            </h1>

            <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
              <li class="active">Product</li>
            </ol>
          </section>

          <!-- Main content -->
          <section class="content">
            <div class="row">
	      <div class="col-md-3">
              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Stockin Products</h3>

                </div>
                <div class="box-body">
                  <!-- Date range -->
                  <form method="post" action="stockin_add.php" enctype="multipart/form-data">
  
                  <div class="form-group">
                    <label for="date">Product Name</label>
                    <div class="input-group col-md-12">
                      <select class="form-control select2" name="prod_name" required>
                      <?php
			 include('../dist/includes/dbcon.php');
				$query2=mysqli_query($con,"select * from product where branch_id='$branch' order by prod_name")or die(mysqli_error());
				  while($row=mysqli_fetch_array($query2)){
		      ?>
          <!--<option>Select Category</option>-->
				    <option value="<?php echo $row['prod_id'];?>"><?php echo $row['prod_name']."(".$row['prod_desc'].")";?></option>
		      <?php }?>
                    </select>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
		  
                  <div class="form-group">
                    <label for="date">Quantity</label>
                    <div class="input-group col-md-12">
                      <input type="text" class="form-control pull-right" id="date" name="qty" placeholder="Quantity" required>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->

                  <div class="form-group">
                    <label for="date">Amount</label>
                    <div class="input-group col-md-12">
                      <input type="text" class="form-control pull-right" id="date" name="amt" placeholder="Amount Paid" required>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
                  <div class="form-group">
                    <label for="date">Due Date</label>
                    <div class="input-group col-md-12">
                      <input type="date" class="form-control pull-right" id="date" name="due" value="<?php echo date("Y-m-d") ?>" required>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->

                  <div class="form-group">
                    <label for="date">Mode of Payment</label>
                    <select class="form-select" name="mode">
                              <!-- <option selected>Select Payment Mode</option> -->
                              <option value="Cash">Cash</option>
                              <option value="Bank Transfer">Bank Transfer</option>
                              <option value="Cheque">Cheque</option>
                              <option value="Mobile Money">Mobile Money</option>
                              <option value="Credit">Other</option>
                              <!-- <option value="3">Three</option> -->
                            </select>
                  </div><!-- /.form group -->

                  <div class="form-group">
                    <!-- <label for="date">Received by</label> -->
                    <div class="input-group col-md-12">
                      <input type="hidden" class="form-control pull-right" id="date" name="rec" value="<?php echo $_SESSION['name'];?>" required>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
                
                  <div class="form-group">
                    <div class="input-group">
                      <button class="btn btn-primary" id="daterange-btn" name="">
                        Save
                      </button>
					  <button class="btn" id="daterange-btn">
                        Clear
                      </button>
                    </div>
                  </div><!-- /.form group -->
				</form>	
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col (right) -->
            
            <div class="col-xs-9">
              <div class="box box-primary">
    
                <div class="box-header">
                  <center><h3 class="box-title">Product Stockin List</h3></center>
                  <form class="is-pulled-right" method="post" action="export_stockin.php">
                   <input type="submit" name="export" class="btn btn-success" value="Export to Excel" />
                  </form>
                </div><!-- /.box-header -->
                <div class="box-body" style="overflow: scroll;">
                  <table id="example1" class="table table-bordered table-striped" >
                    <thead>
                      <tr>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Amount</th>
				        <th>Supplier</th>
				        <th>Date Delivered</th>
                <th>Payment Mode</th>
                <th>Due Date</th>
                <th>Received By</th>
                <th width="10">Action</th>
                      </tr>
                    </thead>
                    <tbody>
<?php
		$branch=$_SESSION['branch'];
		$query=mysqli_query($con,"select * from stockin natural join product natural join supplier where branch_id='$branch' order by date desc")or die(mysqli_error($con));
		while($row=mysqli_fetch_array($query)){
		
?>
                      <tr>
                        <td><?php echo $row['prod_name'];?></td>
                        <td><?php echo $row['qty'];?></td>
                        <td><?php echo $row['amount'];?></td>
            						<td><?php echo $row['supplier_name'];?></td>
            						<td><?php echo $row['date'];?></td>
                        <td><?php echo $row['mode'];?></td>
                        <td><?php echo $row['due'];?></td>
                        <td><?php echo $row['receiver'];?></td>
                        <td>
                          <a href="#updateordinance<?php echo $row['stockin_id'];?>" data-target="#updateordinance<?php echo $row['stockin_id'];?>" data-toggle="modal" style="color:#fff;" class="small-box-footer"><i class="glyphicon glyphicon-edit text-blue"></i></a>

                          <a href="stock_del.php?id=<?php echo $row['stockin_id'];?>"  style="color:#fff;" class="small-box-footer"><i class="glyphicon glyphicon-trash text-red"></i></a></td>
                      
                      </tr>
       <div id="updateordinance<?php echo $row['stockin_id'];?>" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
          <div class="modal-content" style="height:auto">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span></button>
                      <h4 class="modal-title">Update Stockin Details</h4>
                    </div>
                    <div class="modal-body">
              <form class="form-horizontal" method="post" action="stockin_update.php" enctype='multipart/form-data'>

                <div class="form-group">
                          <label for="date">Product Name</label>
                          <div class="input-group col-md-12">
                            <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $row['stockin_id'];?>" required>
                            <input type="text" class="form-control pull-right" id="date" name="name" value="<?php echo $row['prod_name'] ?>" readonly required>
                          </div><!-- /.input group -->
                        </div><!-- /.form group -->
            
                        <div class="form-group">
                          <label for="date">Quantity</label>
                          <div class="input-group col-md-12">
                            <input type="text" class="form-control pull-right" id="date" name="qty" value="<?php echo $row['qty'] ?>" required>
                          </div><!-- /.input group -->
                        </div><!-- /.form group -->

                        <div class="form-group">
                          <label for="date">Amount</label>
                          <div class="input-group col-md-12">
                            <input type="text" class="form-control pull-right" id="date" name="amt" value="<?php echo $row['amount'] ?>" required>
                          </div><!-- /.input group -->
                        </div><!-- /.form group -->
                        <div class="form-group">
                          <label for="date">Due Date</label>
                          <div class="input-group col-md-12">
                            <input type="date" class="form-control pull-right" id="date" name="due" value="<?php echo $row['due'] ?>" required>
                          </div><!-- /.input group -->
                        </div><!-- /.form group -->

                        <div class="form-group">
                          <label for="date">Mode of Payment</label>
                          <select class="form-select" name="mode">
                                    <!-- <option selected>Select Payment Mode</option> -->
                                    <option value="Cash">Cash</option>
                                    <option value="Bank Transfer">Bank Transfer</option>
                                    <option value="Cheque">Cheque</option>
                                    <option value="Mobile Money">Mobile Money</option>
                                    <option value="Credit">Other</option>
                                    <!-- <option value="3">Three</option> -->
                                  </select>
                        </div><!-- /.form group -->

        
                    <br><br><br>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary">Update changes</button>
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                  </form>
                </div>
                  

              </div><!--end of modal-dialog-->

 </div>
 <!--end of modal--> 
<?php }?>					  
                    </tbody>
                    <!--<tfoot>
                      <tr>
                        <th>Product Name</th>
                        <th>Qty</th>
                        <th>Supplier</th>
                        <th>Date Delivered</th>
                        
                      </tr>					  
                    </tfoot>-->
                  </table>
                </div><!-- /.box-body -->
 
            </div><!-- /.col -->
			
			
          </div><!-- /.row -->
	  
            
          </section><!-- /.content -->
        </div><!-- /.container -->
      </div><!-- /.content-wrapper -->
      <?php include('../dist/includes/footer.php');?>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="../plugins/select2/select2.full.min.js"></script>
    <!-- SlimScroll -->
    <script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="../plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../dist/js/demo.js"></script>
    <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>
    
    <script>
      $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
    </script>
     <script>
      $(function () {
        //Initialize Select2 Elements
        $(".select2").select2();

        //Datemask dd/mm/yyyy
        $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
        //Datemask2 mm/dd/yyyy
        $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
        //Money Euro
        $("[data-mask]").inputmask();

        //Date range picker
        $('#reservation').daterangepicker();
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
        //Date range as a button
        $('#daterange-btn').daterangepicker(
            {
              ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
              },
              startDate: moment().subtract(29, 'days'),
              endDate: moment()
            },
        function (start, end) {
          $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
        );

        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
          checkboxClass: 'icheckbox_minimal-blue',
          radioClass: 'iradio_minimal-blue'
        });
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
          checkboxClass: 'icheckbox_minimal-red',
          radioClass: 'iradio_minimal-red'
        });
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
          checkboxClass: 'icheckbox_flat-green',
          radioClass: 'iradio_flat-green'
        });

        //Colorpicker
        $(".my-colorpicker1").colorpicker();
        //color picker with addon
        $(".my-colorpicker2").colorpicker();

        //Timepicker
        $(".timepicker").timepicker({
          showInputs: false
        });
      });
    </script>
  </body>
</html>
