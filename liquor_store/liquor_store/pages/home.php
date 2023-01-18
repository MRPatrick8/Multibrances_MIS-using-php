<?php 
session_set_cookie_params(0);
session_start();
if(empty($_SESSION['id'])):
header('Location:../index.php');
endif;
if(empty($_SESSION['branch'])):
header('Location:../index.php');
endif;
?>
<?php
include('../dist/includes/dbcon.php');

$branch=$_SESSION['branch'];
$query=mysqli_query($con,"select * from branch where branch_id='$branch'")or die(mysqli_error($con));
  $row=mysqli_fetch_array($query);
           $branch_name=$row['branch_name'];

function number_suffix($number){
    $ends = array('th','st','nd','rd','th','th','th','th','th','th');
     if ((($number % 100) >= 11) && (($number%100) <= 13)){
      return $number. 'th';
     }else{
      return $number.$ends[$number % 10];
     }
  }
  
  $notifications=array();
  $current_month_day=date("m-d");
  $sql="select * from reg_expenses where DATE_FORMAT(DOB, '%m-%d')='{$current_month_day}'";
  $res=$con->query($sql);
  if($res->num_rows>0){
    while($row=$res->fetch_assoc()){
      $age=(date("Y")-date("Y",strtotime($row["DOB"])))+1;
      $notifications[]="<i class='fa fa-bell'></i><b>{$row["NAME"]}</b> payment is due<br> today <b>".date("d-m-Y",strtotime($row["DOB"]))."</b>";
    }
  }

  require("config.php");
  
  $expenses=array();
  $current_month_day=date("m-d");
  $sql="select * from reg_expenses where DATE_FORMAT(DOB, '%m-%d')='{$current_month_day}'";
  $res=$con->query($sql);
  if($res->num_rows>0){
    while($row=$res->fetch_assoc()){
      $expenses[]=$row;
    }
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Home | <?php include('../dist/includes/title.php');?></title>
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
    <link rel='shortcut icon' type='image/x-icon' href="../upload/liquor_store.png">
    <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
    <style>
      .col-lg-3{
        margin:50px 0px;
      }
      h4{
        font-size: 26px;
      }
      
    </style>
 </head>
  <!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
  <body class="hold-transition skin-<?php echo $_SESSION['skin'];?> layout-top-nav" onload="myFunction()">
    <div class="wrapper">
      <?php include('../dist/includes/header.php');?>
      <!-- Full Width Column -->
      <div class="content-wrapper"  style="background-color: #9c487a;">
        <div class="container">
          <!-- Content Header (Page header) -->
         

          <!-- Main content -->
          <section class="content">
            <div class="row">
	      <div class="col-md-8">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <b><h3 class="box-title">Transactions</h3></b>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div class="row">
                      <div class="col-lg-4 col-xs-6">
                        <!-- small box -->
                        <div class="small-box" style="background-color: #C8A2CB;">
                          <div class="inner">
                            <a href="cust_new.php" style="color: #000;"><b><h4>Sales</h4></b></a>
                            <p>Add sales</p>
                          </div>
                          <div class="icon" style="margin-top:10px">
                            <i class="glyphicon glyphicon-usd"></i>
                          </div>
                          <a href="cust_new.php" class="small-box-footer">
                            Go <i class="fa fa-arrow-circle-right"></i>
                          </a>
                        </div>
                      </div><!-- ./col -->


                      <div class="col-lg-4 col-xs-6">
                        <!-- small box -->
                        <div class="small-box" style="background-color: #DDA0DD;">
                          <div class="inner">
                            <a href="stockin.php" style="color: #000;"><b><h4>Stock</h4></b></a>
                            <p>Add/view stock-in</p>
                          </div>
                          <div class="icon" style="margin-top:10px">
                            <i class="glyphicon glyphicon-share-alt"></i>
                          </div>
                          <a href="stockin.php" class="small-box-footer">
                            Go <i class="fa fa-arrow-circle-right"></i>
                          </a>
                        </div>
                      </div><!-- ./col -->
                      
                      <!-- <div class="col-lg-4 col-xs-6">
                       
                        <div class="small-box bg-yellow">
                          <div class="inner">
                            <b><h4>Payments</b></h4>
                            <p>Customer</p>
                          </div>
                          <div class="icon" style="margin-top:10px">
                            <i class="glyphicon glyphicon-usd"></i>
                          </div>
                          <a href="customer.php" class="small-box-footer">
                            Go <i class="fa fa-arrow-circle-right"></i>
                          </a>
                        </div>
                      </div> --><!-- ./col -->
                      
                      <div class="col-lg-4 col-xs-6">
                        <div class="small-box" style="background-color: #9966CC;">
                          <div class="inner">
                            <a href="expenses.php" style="color: #000;"><b><h4>All Expenses</h4></b></a>
                            <p>Daily/Regular</p>
                          </div>
                          <div class="icon" style="margin-top:10px">
                            <i class="glyphicon glyphicon-user"></i>
                          </div>
                          <a href="expenses.php" class="small-box-footer">
                            Go <i class="fa fa-arrow-circle-right"></i>
                          </a>
                        </div>
                      </div>

                      <div class="col-lg-4 col-xs-6">
                          <!-- small box -->
                          <div class="small-box" style="background-color: #DA70D6;">
                            <div class="inner">
                              <a href="product.php" style="color: #000;"><b><h4>Products</h4></b></a>
                              <p>View/add</p>
                            </div>
                            <div class="icon" style="margin-top:10px">
                              <i class="glyphicon glyphicon-shopping-cart"></i>
                            </div>
                            <a href="product.php" class="small-box-footer">
                              Go <i class="fa fa-arrow-circle-right"></i>
                            </a>
                          </div>
                        </div><!-- ./col -->


                        <div class="col-lg-4 col-xs-6">
                          <!-- small box -->
                          <?php foreach($notifications as $row):?>
                          <div class="small-box" style="background-color: #66023c;">
                            <div class="inner">

                            <div class="alert alert-primary mb-3 pt-4 pb-4" style="color: #fff;" href="#"><?php echo $row; ?></div>
                          
                            </div>
                            <div class="icon" style="margin-top:10px">
                              <i class="glyphicon glyphicon-shopping-cart"></i>
                            </div>
                        
                          </div>
                          <?php endforeach;?>
                        </div><!-- ./col -->

                    </div><!--row-->';


                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col (right) -->
            
        <div class="col-md-4">

              
              <!-- About Me Box -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <b><h3 class="box-title">About Us</h3></b>
                </div><!-- /.box-header -->
    <?php
    $branch=$_SESSION['branch'];
    $query=mysqli_query($con,"select * from branch where branch_id='$branch'")or die(mysqli_error());
      $row=mysqli_fetch_array($query);
      
?>
                <div class="box-body">
                  <strong><i class="glyphicon glyphicon-map-marker margin-r-5"></i> Company Address</strong>
                  <p class="text-muted">
                    <?php echo $row['branch_address'];?>
                  </p>

                  <hr>

                  <strong><i class="glyphicon glyphicon-phone-alt margin-r-5"></i> Contact Number/s</strong>
                  <p class="text-muted"><?php echo $row['branch_contact'];?></p>

                  <hr>

                  
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>   
			
			
          </div><!-- /.row -->
          </section><!-- /.content -->


          <section>
            <div class="col-md-4">
            <div class="box box-primary">
                <div class="box-header with-border">
                  <b><h3 class="box-title">Most Sold Today</h3></b>
                </div><!-- /.box-header -->

           <?php
          $query1="select prod_name as products,sum(qty) as total from sales natural join sales_details natural join product where day(s_date) = day(NOW()) and branch_id='$branch' group by products";

          $result1 = $con->query($query1);
      
          ?>

          <table id="" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php while($row1= $result1->fetch_object()):  ?>

                      <tr>
                        <td><?php echo $row1->products;?></td>
                        <td><?php echo $row1->total;?></td>
                       
                      </tr>
                    <?php endwhile; ?>
                    </tbody>

                  </table>

                  

                  <hr>
                </div><!-- /.box-body -->
              </div>

            <div class="col-md-4">
            <div class="box box-primary">
                <div class="box-header with-border">
                  <b><h3 class="box-title">Most Sold This Week</h3></b>
                </div><!-- /.box-header -->

           <?php
          $query2="select prod_name as products,sum(qty) as total from sales natural join sales_details natural join product where week(s_date) = week(NOW()) and branch_id='$branch' group by products ";

          $result2 = $con->query($query2);
      
          ?>

          <table id="" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php while($row2= $result2->fetch_object()):  ?>

                      <tr>
                        <td><?php echo $row2->products;?></td>
                        <td><?php echo $row2->total;?></td>
                       
                      </tr>
                    <?php endwhile; ?>
                    </tbody>

                  </table>

                  

                  <hr>
                </div><!-- /.box-body -->
              </div>

              <div class="col-md-4">
            <div class="box box-primary">
                <div class="box-header with-border">
                  <b><h3 class="box-title">Most Sold This Month</h3></b>
                </div><!-- /.box-header -->

           <?php
          $query3="select prod_name as products,sum(qty) as total from sales natural join sales_details natural join product where month(s_date) = month(NOW()) and branch_id='$branch' group by products";

          $result3 = $con->query($query3);
      
          ?>

          <table id="" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php while($row3= $result3->fetch_object()):  ?>

                      <tr>
                        <td><?php echo $row3->products;?></td>
                        <td><?php echo $row3->total;?></td>
                       
                      </tr>
                    <?php endwhile; ?>
                    </tbody>

                  </table>

                  

                  <hr>
                </div><!-- /.box-body -->
              </div>

              <div class="col-md-4">
            <div class="box box-primary">
                <div class="box-header with-border">
                  <b><h3 class="box-title">Most Purchased Today</h3></b>
                </div><!-- /.box-header -->

           <?php
          $query4="select prod_name as products,sum(qty) as total from stockin natural join product where day(date) = day(NOW()) and branch_id='$branch' group by products ";

          $result4 = $con->query($query4);
      
          ?>

          <table id="" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php while($row4= $result4->fetch_object()):  ?>

                      <tr>
                        <td><?php echo $row4->products;?></td>
                        <td><?php echo $row4->total;?></td>
                       
                      </tr>
                    <?php endwhile; ?>
                    </tbody>

                  </table>

                  <hr>
                </div><!-- /.box-body -->
              </div>

            <div class="col-md-4">
            <div class="box box-primary">
                <div class="box-header with-border">
                  <b><h3 class="box-title">Most Purchased This Week</h3></b>
                </div><!-- /.box-header -->

           <?php
          $query5="select prod_name as products,sum(qty) as total from stockin natural join product where week(date) = week(NOW()) and branch_id='$branch' group by products ";

          $result5 = $con->query($query5);?>

          <table id="" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php while($row5= $result5->fetch_object()):  ?>

                      <tr>
                        <td><?php echo $row5->products;?></td>
                        <td><?php echo $row5->total;?></td>
                       
                      </tr>
                    <?php endwhile; ?>
                    </tbody>

                  </table>

                  

                  <hr>
                </div><!-- /.box-body -->
              </div>

              <div class="col-md-4">
            <div class="box box-primary">
                <div class="box-header with-border">
                  <b><h3 class="box-title">Most Purchased This Month</h3></b>
                </div><!-- /.box-header -->

           <?php
          $query6="select prod_name as products,sum(qty) as total from stockin natural join product where month(date) = month(NOW()) and branch_id='$branch' group by products ";

          $result6 = $con->query($query6);
      
          ?>

          <table id="" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php while($row6= $result6->fetch_object()):  ?>

                      <tr>
                        <td><?php echo $row6->products;?></td>
                        <td><?php echo $row6->total;?></td>
                       
                      </tr>
                    <?php endwhile; ?>
                    </tbody>

                  </table>

                  <hr>
                </div><!-- /.box-body -->
              </div>
          </section>
<!-- ****************Imported ******************************************* -->

        </div><!-- /.container -->
      </div><!-- /.content-wrapper -->
      <?php include('../dist/includes/footer.php');?>
    </div><!-- ./wrapper -->
	<script>
    $(function() {
      $(".btn_delete").click(function(){
      var element = $(this);
      var id = element.attr("id");
      var dataString = 'id=' + id;
      if(confirm("Sure you want to delete this item?"))
      {
	$.ajax({
	type: "GET",
	url: "temp_trans_del.php",
	data: dataString,
	success: function(){
		
	      }
	  });
	  
	  $(this).parents(".record").animate({ backgroundColor: "#fbc7c7" }, "fast")
	  .animate({ opacity: "hide" }, "slow");
      }
      return false;
      });

      });
    </script>
	
	<script type="text/javascript" src="autosum.js"></script>
  
    <!-- jQuery 2.1.4 -->
    <script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
	<script src="../dist/js/jquery.min.js"></script>
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
