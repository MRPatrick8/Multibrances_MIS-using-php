<?php 
include('../dist/includes/dbcon.php');
session_set_cookie_params(0);
session_start();
$branch=$_SESSION['branch'];
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
      .car-info-box { position:relative;}
      .car-info-box ul {
        background: rgba(0, 0, 0, 0.6) none repeat scroll 0 0;
        bottom: 0;
        margin: 0 auto;
        padding: 0 15px;
        position: absolute;
        width: 100%;
      }
      .car-info-box li {
        color: #ffffff;
        display: inline-block;
        font-size: 13px;
        line-height: 50px;
        list-style: outside none none;
        margin: 0 15px 0 auto;
      }
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
              <a class="btn btn-lg btn-info" href="home.php">Back</a>
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
                  <h3 class="box-title">Suggest a product</h3>

                </div>
                <div class="box-body">
                  <!-- Date range -->
                  <form method="post" action="suggest_add.php" enctype="multipart/form-data">
		  
                  <div class="form-group">
                    <label for="desc">Product Name</label>
                    <div class="input-group col-md-12">
                      <input type="text" class="form-control pull-right" id="desc" name="name" placeholder="Product Name" required>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->

                  <div class="form-group">
                    <label for="date">Product Description</label>
                    <div class="input-group col-md-12">
                      <textarea class="form-control pull-right" id="desc" name="descr"></textarea>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->

                  <div class="form-group">
                    <label for="price">Price</label>
                    <div class="input-group col-md-12">
                      <input type="number" class="form-control pull-right" id="price" name="price" placeholder="Product Price" required>
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->

                  <div class="form-group">
                    <label for="price">Add picture</label>
                    <div class="input-group col-md-12">
                      <input type="file" class="form-control pull-right" id="image" name="image"  required>
                    </div><!-- /.input group -->
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
                  <center><h3 class="box-title">Suggested Products</h3></center>
                </div><!-- /.box-header -->
                <div class="box-body" style="overflow: scroll;">
                  <?php
          $pq=mysqli_query($con,"select * from suggestion where branch_id = '$branch'");
          while($pqrow=mysqli_fetch_array($pq)){
          ?>
            <div class="col-lg-6 col-xs-6">
            <div class="recent-car-list">
            <div class="car-info-box"> 
              <img width="250" height="250"  src="../<?php if(empty($pqrow['image'])){echo "upload/noimage.jpg";}else{echo $pqrow['image'];} ?>" >
            
            </div>
            <div class="car-title-m">
            <h3><b><?php echo $pqrow['name']; ?></b></h3>
            <span class="price">Rwf <?php echo $pqrow['price']; ?></span> 
            </div>
            <div class="inventory_info_m">
            <p><?php echo $pqrow['descr']; ?></p>
            <p> suggested by: <?php echo $_SESSION['name'];?></p>
            </div>
            </div>
            </div>
          <?php
          }
        ?>
                  
                  
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
