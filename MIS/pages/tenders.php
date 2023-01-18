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
    <title>Tenders | <?php include('../dist/includes/title.php');?></title>
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
              <a class="btn btn-lg btn-danger" href="home.php">Back</a>
              <a class="btn btn-lg btn-primary" href="#add" data-target="#add" data-toggle="modal" style="color:#fff;" class="small-box-footer"><i class="glyphicon glyphicon-plus text-black"></i></a>
            </h1>
            <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
              <li class="active">Tenders</li>
            </ol>
          </section>

          <!-- Main content -->
          <section class="content">
            <div class="row">
	     
            
            <div class="col-xs-12">
              <div class="box box-primary">
    
                <div class="box-header">
                  <center><h3 class="box-title">Tenders List</h3></center>
                  <form class="is-pulled-right" method="post" action="tender_export.php">
                   <input type="submit" name="export" class="btn btn-success" value="Export to Excel" />
                  </form>
                </div><!-- /.box-header -->
                <div class="box-body" style="overflow: scroll;">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Date</th>
                        <th>Company</th>
                        <th>Tender Requirements</th>
						            <th>Submission Deadline</th>
                        <th>Tender Ref</th>
            						<th>Other Requirements</th>
            						<th>Tender Fees</th>
            						<th>Comment</th>
                        <!-- <th>Reorder</th> -->
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
<?php
		
		$query=mysqli_query($con,"select * from tenders where branch_id='$branch' order by company")or die(mysqli_error());
		while($row=mysqli_fetch_array($query)){
		
?>
                      <tr>
                        <td><?php echo $row['date'];?></td>
                        <td><?php echo $row['company'];?></td>
                        <td><?php echo $row['requirements'];?></td>
						            <td><?php echo $row['deadline'];?></td>
                        <td><?php echo $row['reference'];?></td>
            						<td><?php echo $row['other'];?></td>
            						<td><?php echo $row['fees'];?></td>
                        <td><?php echo $row['comment'];?></td>
                        <!-- <td><?php //echo $row[''];?></td> -->
                        <td>
				<a href="#updateordinance<?php echo $row['id'];?>" data-target="#updateordinance<?php echo $row['id'];?>" data-toggle="modal" style="color:#fff;" class="small-box-footer"><i class="glyphicon glyphicon-edit text-blue"></i></a>

        <a href="tender_delete.php?id=<?php echo $row['id'];?>"  style="color:#fff;" class="small-box-footer"><i class="glyphicon glyphicon-trash text-red"></i></a>
			
						</td>
                      </tr>
<div id="updateordinance<?php echo $row['id'];?>" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content" style="height:auto">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Update Tender Details</h4>
              </div>
              <div class="modal-body">
        <form class="form-horizontal" method="post" action="tender_update.php" enctype='multipart/form-data'>
                <div class="form-group">
                  <label class="control-label col-lg-3" for="date">Date</label>
                  <div class="col-lg-9">
                    <input type="date" class="form-control" id="date" name="date" value="<?php echo date("Y-m-d") ?>" required>  
                  </div>
                </div>
                        
                <div class="form-group">
                  <label class="control-label col-lg-3" for="name">Company</label>
                  <div class="col-lg-9"><input type="hidden" class="form-control" id="id" name="id" value="<?php echo $row['id'];?>" required>  
                    <input type="text" class="form-control" id="company" name="company" value="<?php echo $row['company'];?>" required>  
                  </div>
                </div> 
                <div class="form-group">
                  <label class="control-label col-lg-3" for="price">Requirements</label>
                  <div class="col-lg-9">
                    <textarea class="form-control" id="requirements" name="requirements" ><?php echo $row['requirements'];?></textarea>  
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-lg-3" for="date">Deadline</label>
                  <div class="col-lg-9">
                    <input type="date" class="form-control" id="deadline" name="deadline" value="<?php echo date("Y-m-d") ?>" required>  
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="control-label col-lg-3" for="price">Tender Ref</label>
                  <div class="col-lg-9">
                    <input type="text" class="form-control" id="reference" name="reference" value="<?php echo $row['reference'];?>" required>  
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-lg-3" for="price">Other Requirements</label>
                  <div class="col-lg-9">
                    <textarea class="form-control" id="other" name="other" value=""><?php echo $row['other'];?></textarea>  
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-lg-3" for="price">Tender Fee</label>
                  <div class="col-lg-9">
                    <input type="text" class="form-control" id="fees" name="fees" value="<?php echo $row['fees'];?>" required>  
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="control-label col-lg-3" for="price">Comment</label>
                  <div class="col-lg-9">
                    <textarea class="form-control" id="comment" name="comment" ><?php echo $row['comment'];?></textarea>  
                  </div>
                </div>

              <br><br><br>
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
                      	<th>Picture</th>
                        <th>Serial #</th>
                        <th>Tenders Name</th>
                        <th>Description</th>
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

<div id="add" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content" style="height:auto">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Add New Tender</h4>
              </div>
              <div class="modal-body">
        <form class="form-horizontal" method="post" action="tender_add.php" enctype='multipart/form-data'>
        <div class="form-group">
          <label class="control-label col-lg-3" for="date">Date</label>
          <div class="col-lg-9">
            <input type="date" class="form-control" id="date" name="date" value="<?php echo date("Y-m-d") ?>" required>  
          </div>
        </div>
                
        <div class="form-group">
          <label class="control-label col-lg-3" for="name">Company</label>
          <div class="col-lg-9"><input type="hidden" class="form-control" id="id" name="id" required>  
            <input type="text" class="form-control" id="company" name="company" placeholder="Company" required>  
          </div>
        </div> 
        <div class="form-group">
          <label class="control-label col-lg-3" for="price">Requirements</label>
          <div class="col-lg-9">
            <textarea class="form-control" id="requirements" name="requirements" placeholder="Requirements"></textarea>  
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-lg-3" for="date">Deadline</label>
          <div class="col-lg-9">
            <input type="date" class="form-control" id="deadline" name="deadline" value="<?php echo date("Y-m-d") ?>" required>  
          </div>
        </div>
        
        <div class="form-group">
          <label class="control-label col-lg-3" for="price">Tender Ref</label>
          <div class="col-lg-9">
            <input type="text" class="form-control" id="reference" name="reference" placeholder="Tender Reference" required>  
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-lg-3" for="price">Other Requirements</label>
          <div class="col-lg-9">
            <textarea class="form-control" id="other" name="other" placeholder="Other requirements"></textarea>  
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-lg-3" for="price">Tender Fee</label>
          <div class="col-lg-9">
            <input type="text" class="form-control" id="fees" name="fees" placeholder="Tender fees" required>  
          </div>
        </div>
        
        <div class="form-group">
          <label class="control-label col-lg-3" for="price">Comment</label>
          <div class="col-lg-9">
            <textarea class="form-control" id="comment" name="comment" placeholder="Comment"></textarea>  
          </div>
        </div>
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
