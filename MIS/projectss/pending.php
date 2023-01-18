<?php
   session_set_cookie_params(0); 
session_start(); 
$branch=$_SESSION['branch'];    
   include('connection.php');
   //include('header.php');
       
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel='shortcut icon' type='image/x-icon' href="../upload/TKAY LOGO.png">

    <title>Projects Manager - Dashboard</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">

    <!-- Feather JS for Icons -->
    <script src="js/feather.min.js"></script>

</head>

<body>

    <div class="d-flex" id="wrapper">

        <!-- Sidebar -->
        <div class="border-right" id="sidebar-wrapper">
            <div class="user">
                <img class="img img-fluid rounded-circle" src="" width="120">
                <h5></h5>
        
            </div>
            <div class="list-group list-group-flush">
                <a href="../pages/home.php" class="list-group-item list-group-item-action"><span data-feather="home"></span> Dashboard</a>
                <a href="add_project.php" class="list-group-item list-group-item-action "><span data-feather="plus-square"></span> Add Projects</a>
                <a href="manage_projects.php" class="list-group-item list-group-item-action sidebar-active"><span data-feather="dollar-sign"></span> Manage Projects</a>
            </div>
            <div class="sidebar-heading">Settings </div>
            <div class="list-group list-group-flush">
                <!-- <a href="#" class="list-group-item list-group-item-action "><span data-feather="user"></span> Profile</a> -->
                <a href="../pages/logout.php" class="list-group-item list-group-item-action "><span data-feather="power"></span> Logout</a>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">

            <nav class="navbar navbar-expand-lg navbar-light  border-bottom">


                <button class="toggler" type="button" id="menu-toggle" aria-expanded="false">
                    <span data-feather="menu"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                        
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="img img-fluid rounded-circle" src="" width="25">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Your Profile</a>
                                <!-- <a class="dropdown-item" href="#">Edit Profile</a>
                                <div class="dropdown-divider"></div> -->
                                <a class="dropdown-item" href="../pages/logout.php">Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="container-fluid">
                <h3 class="mt-4 text-center">Manage projects</h3>
                <a class = "btn btn-success btn-print" href = "projects_report.php"><i class ="glyphicon glyphicon-arrow-left"></i> Report</a>
                <hr>
                <form class="is-pulled-right" method="post" action="pending_export.php">
                           <input type="submit" name="export" class="btn btn-success" value="Export to Excel" />
                          </form>
                <div class="row justify-content-center">

                    <div class="col-lg-12">      
                        <div class="table-responsive">
                           <center><h2>List of Pending Projects</h2></center> 
                            <table class="table table-bordered table-hover table-striped" title="">
                                <thead>
                                    <tr>
                                        <th>Project Name</th>
                                        <th>Client Name</th>
                                        <th>Contact</th>
                                        <th>Address</th>
                                        <th>Amount Paid</th>
                                        <th>Amount Due</th>
                                        <th>Assigned to</th>
                                        <th>Status</th>
                                        <th>Due Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                 <?php                  
                $query = "SELECT * FROM project where branch_id='$branch' AND status = 'Pending'";
                    $result = mysqli_query($db, $query) or die (mysqli_error($db));
                  
                        while ($row = mysqli_fetch_assoc($result)) {
                                             
                            echo '<tr>';
                            echo '<td>'. $row['project_name'].'</td>';
                            echo '<td>'. $row['client_name'].'</td>';
                            echo '<td>'. $row['contact'].'</td>';
                            echo '<td>'. $row['address'].'</td>';
                            echo '<td>'. $row['amount_paid'].'</td>';
                            echo '<td>'. $row['amount_due'].'</td>';
                            echo '<td>'. $row['assign'].'</td>';
                            echo '<td>'. $row['status'].'</td>';
                            echo '<td>'. $row['due_date'].'</td>';
                            echo '<td><a  type="button" class="btn btn-xs btn-warning" href="edit.php?action=edit & id='.$row['project_id'] . '"> Edit </a> ';
                            echo ' <a  type="button" class="btn btn-xs btn-danger" href="del.php?type=project&delete & id=' . $row['project_id'] . '">Delete </a> </td>';
                            echo '</tr> ';
                }
            ?> 
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Bootstrap core JavaScript -->
    <script src="js/jquery.slim.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/Chart.min.js"></script>
    <!-- Menu Toggle Script -->
    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    </script>
    <script>
        feather.replace()
    </script>

</body>

</html>