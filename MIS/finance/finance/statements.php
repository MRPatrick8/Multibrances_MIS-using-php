
<?php
session_set_cookie_params(0);
session_start();
// if(!isset($_SESSION['userId'])){ header('location:login.php');}
?>
<!DOCTYPE html>
<html>
<head>
  <title>T-KAY Finance</title>
  <?php require 'assets/autoloader.php'; ?>
  <?php require 'assets/db.php'; ?>
  <?php require 'assets/function.php'; ?>
  <?php
    $error = "";
    if (isset($_POST['userLogin']))
    {
      $error = "";
        $user = $_POST['email'];
        $pass = $_POST['password'];
       
        $result = mysqli_query($con,"select * from userAccounts where email='$user' AND password='$pass'");
        if($result->num_rows>0)
        { 
          session_start();
          $data = mysqli_fetch_assoc($result);
          $_SESSION['userId']=$data['id'];
          $_SESSION['user'] = $data;
          header('location:home.php');
         }
        else
        {
          $error = "<div class='alert alert-warning text-center rounded-0'>Username or password wrong try again!</div>";
        }
    }

   ?>
</head>
<body style="background:#ffffff;background-size: 100%">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
 <a class="navbar-brand" href="#">
    <img src="images/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
   <!--  <i class="d-inline-block  fa fa-building fa-fw"></i> --><?php echo bankname; ?>
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item ">
        <a class="nav-link " href="home.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <!-- <li class="nav-item ">  <a class="nav-link" href="accounts.php">Accounts</a></li> -->
      <li class="nav-item active">  <a class="nav-link" href="statements.php">Account Statements</a></li>
      <li class="nav-item ">  <a class="nav-link" href="transfer.php">Money Transfer</a></li>
      <!-- <li class="nav-item ">  <a class="nav-link" href="profile.php">Profile</a></li> -->


    </ul>
    <?php include 'sideButton.php'; ?>
  </div>
</nav><br><br><br>
<div class="container">
  <div class="card  w-75 mx-auto">
  <div class="card-header text-center">
    Transaction made against you account
  </div>
  <div class="card-body">
    <?php 
      $array = mysqli_query($con,"select * from transaction where userId = '$userData[id]' order by date desc");
      if ($array ->num_rows > 0) 
      {
         while ($row = mysqli_fetch_assoc($array)) 
         {
            if ($row['action'] == 'withdraw') 
            {
              echo "<div class='alert alert-secondary'>You withdraw Rwf $row[debit] from your account at $row[date]</div>";
            }
            if ($row['action'] == 'deposit') 
            {
              echo "<div class='alert alert-success'>You deposit Rwf $row[credit] in your account at $row[date]</div>";
            }
            if ($row['action'] == 'deduction') 
            {
              echo "<div class='alert alert-danger'>Deduction have been made for  Rwf .$row[debit] from your account at $row[date] in case of $row[other]</div>";
            }
            if ($row['action'] == 'transfer') 
            {
              echo "<div class='alert alert-warning'>Transfer have been made for  Rwf $row[debit] from your account at $row[date] in  account no.$row[other]</div>";
            }

         }
      } 
    ?>  
  </div>
  <div class="card-footer text-muted">
   <?php echo bankname ?>
  </div>
</div>

</div>
</body>
</html>