<?php
session_set_cookie_params(0);
session_start();
// if(!isset($_SESSION['managerId'])){ header('location:login.php');}
?>
<!DOCTYPE html>
<html>
<head>
  <title>T-KAY Finance</title>
  <?php require 'assets/autoloader.php'; ?>
  <?php require 'assets/db2.php'; ?>
  <?php require 'assets/function.php'; ?>
  <?php if (isset($_GET['delete'])) 
  {
    if (mysqli_query($con,"delete from useraccounts where id = '$_GET[delete]'"))
    {
      header("location:mindex.php");
    }
  } ?>
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
        <a class="nav-link active" href="mindex.php">Accounts <span class="sr-only">(current)</span></a>
      </li>
      <!-- <li class="nav-item ">  <a class="nav-link" href="maccounts.php">Accounts</a></li> -->
      <li class="nav-item ">  <a class="nav-link" href="maddnew.php">Add New Account</a></li>
      <li class="nav-item ">  <a class="nav-link" href="cindex.php">Transactions</a></li>
      <!-- <li class="nav-item ">  <a class="nav-link" href="transfer.php">Funds Transfer</a></li> -->
      <!-- <li class="nav-item ">  <a class="nav-link" href="profile.php">Profile</a></li> -->


    </ul>
    <?php include 'msideButton.php'; ?>
    
  </div>
</nav><br><br><br>
<div class="container">
<div class="card w-100 text-center shadowBlue">
  <div class="card-header">
    All accounts
  </div>
  <div class="card-body">
   <table class="table table-bordered table-sm">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Holder Name</th>
      <th scope="col">Account No.</th>
      <th scope="col">Bank Name</th>
      <th scope="col">Current Balance</th>
      <th scope="col">Account type</th>
      <th scope="col">Contact</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    <?php
      $i=0;
      $array = mysqli_query($con,"select * from useraccounts,brnch where useraccounts.branch = brnch.branchId");
      if ($array->num_rows > 0)
      {
        while ($row = mysqli_fetch_assoc($array))
        {$i++;
    ?>
      <tr>
        <th scope="row"><?php echo $i ?></th>
        <td><?php echo $row['name'] ?></td>
        <td><?php echo $row['accountNo'] ?></td>
        <td><?php echo $row['branchName'] ?></td>
        <td>Rwf <?php echo $row['balance'] ?></td>
        <td><?php echo $row['accountType'] ?></td>
        <td><?php echo $row['number'] ?></td>
        <td>
          <a href="show.php?id=<?php echo $row['id'] ?>" class='btn btn-success btn-sm' data-toggle='tooltip' title="View More info">View</a>
          <a href="mindex.php?delete=<?php echo $row['id'] ?>" class='btn btn-danger btn-sm' data-toggle='tooltip' title="Delete this account">Delete</a>
        </td>
        
      </tr>
    <?php
        }
      }
     ?>
  </tbody>
</table>
  <div class="card-footer text-muted">
    <?php echo bankname; ?>
  </div>
</div>
</body>
</html>