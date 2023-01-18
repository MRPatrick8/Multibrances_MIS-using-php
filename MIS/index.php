<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login - <?php include('dist/includes/title.php');?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    
    <!-- Font Awesome -->
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

    <link rel='shortcut icon' type='image/x-icon' href="upload/TKAY LOGO.png">
  </head>
  <!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
  <body class="hold-transition login-page" style="background-color: skyblue;">
   
    <div class="login-box">
      <div class="login-logo">
        <marquee style="margin-left: 20px; font-family: Gill Sans MT; font-size: 25px; color: #fff;margin-bottom: -20px;" width="80%"  direction="left" height="35px">
          Login to start your session!
        </marquee>
      </div><!-- /.login-logo -->
      
      <div class="login-box-body">
        <center><img style="margin-bottom: 10px;" src="upload/TKAY LOGO.png" height="100" width="150"></center>
        <form action="login.php" method="post">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="Username" name="username" required>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Password" name="password" required>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
		  <div class="form-group has-feedback">
            <select class="form-control select2" style="width:100%" name="branch" required>
                <?php
				include('dist/includes/dbcon.php');

                   $query3=mysqli_query($con,"select * from branch order by branch_name")or die(mysqli_error($con));
                      while($row3=mysqli_fetch_array($query3)){
                ?>
                    <option value="<?php echo $row3['branch_id'];?>"><?php echo $row3['branch_name'];?></option>
                  <?php }?>
                </select>
          </div>
          <div class="row">
			<div class="dropdown col-xs-6 pull-right">
          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <select onchange="if (this.value) window.location.href=this.value">
            <option value="#">User</option>
            <option value="admin/">Admin</option>
            <option value="finance/">Finance</option>
            <option value="ceo/">CEO</option>
        </select>

      </div>
			<div class="col-xs-6 pull-right">
              <button type="submit" class="btn btn-danger btn-block btn-flat" name="login" default>Sign In</button>
            </div><!-- /.col -->
          </div>
        </form>
      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->
      
           
   
<!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
  </body>
</html>
