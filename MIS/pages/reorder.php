<?php session_set_cookie_params(0);
session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Product Reorder | <?php include('../dist/includes/title.php');?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap.css">
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel='shortcut icon' type='image/x-icon' href="../upload/TKAY LOGO.png">
    <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
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
              <a class="btn btn-lg btn-warning" href="reorder.php">Back</a>
              <a class="btn btn-lg btn-info" href="request.php">View Purchase Request</a>
            </h1>
            <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
              <li class="active">Product</li>
            </ol>
          </section>

          <!-- Main content -->
          <section class="content">
            <div class="row">
	      
            
            <div class="col-xs-12">
              <div class="box box-primary">
    
                <div class="box-header">
                  <h3 class="box-title">Reorder List</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                      
                        <th>Product Code</th>
                        <th>Product Name</th>
						            <th>Supplier</th>
                        <th>Qty</th>
            						<th>Price</th>
            						<th>Category</th>
            						<th>Reorder</th>
            
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
<?php
		
		$query=mysqli_query($con,"select * from product natural join supplier natural join category where branch_id='$branch' and prod_qty<=reorder order by prod_name")or die(mysqli_error());
		while($row=mysqli_fetch_array($query)){
		
?>
                      <tr>
                        <td><?php echo $row['serial'];?></td>
                        <td><?php echo $row['prod_name'];?></td>
						            <td><?php echo $row['supplier_name'];?></td>
                        <td><?php echo $row['prod_qty'];?></td>
            						<td><?php echo number_format($row['prod_price'],2);?></td>
            						<td><?php echo $row['cat_name'];?></td>
            						<td><?php echo $row['reorder'];?></td>

                        <td>
				<a href="#updateordinance<?php echo $row['prod_id'];?>" data-target="#updateordinance<?php echo $row['prod_id'];?>" data-toggle="modal" class="btn btn-primary">Request Purchase</a>
			
						</td>
          </tr>
<div id="updateordinance<?php echo $row['prod_id'];?>" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
	<div class="modal-dialog">
	  <div class="modal-content" style="height:auto">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Request Purchase</h4>
              </div>
              <div class="modal-body">
			  <form class="form-horizontal" method="post" action="purchase_add.php" enctype='multipart/form-data'>
        <div class="form-group">
          <label class="control-label col-lg-3" for="price">Product Code</label>
          <div class="col-lg-9">
            <input type="text" class="form-control" id="price" name="serial" value="<?php echo $row['serial'];?>" readonly>  
          </div>
        </div>
                
				<div class="form-group">
					<label class="control-label col-lg-3" for="name">Product Name</label>
					<div class="col-lg-9"><input type="hidden" class="form-control" id="id" name="id" value="<?php echo $row['prod_id'];?>" required>  
					  <input type="text" class="form-control" id="name" name="prod_name" value="<?php echo $row['prod_name'];?>" readonly>  
					</div>
				</div> 
				<div class="form-group">
					<label class="control-label col-lg-3" for="file">Supplier</label>
					<div class="col-lg-9">
              <input type="text" class="form-control" id="name" name="prod_name" value="<?php echo $row['supplier_name'];?>" readonly>  
					</div>
				</div> 
				
				<div class="form-group">
					<label class="control-label col-lg-3" for="price">Price</label>
					<div class="col-lg-9">
					  <input type="text" class="form-control" id="price" name="prod_price" value="<?php echo $row['prod_price'];?>" readonly>  
					</div>
				</div>
				
				
        <div class="form-group">
          <label class="control-label col-lg-3" for="price">Quantity</label>
          <div class="col-lg-9">
            <input type="number" class="form-control" id="price" name="reorder">  
          </div>
        </div>
				<br><br><br><br><br><br><br><br>
              </div>
              <div class="modal-footer">
		<button type="submit" class="btn btn-primary">Save changes</button>
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
                      
                        <th>Serial #</th>
                        <th>Product Name</th>
						<th>Category</th>
                        <th>Qty</th>
						<th>Price</th>
						<th>Category</th>
						<th>Reorder</th>
            
                        <th>Action</th>
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
  </body>
</html>
