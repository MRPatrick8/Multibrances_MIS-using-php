<?php

    session_start();
    include("session.php");

    // if( !$_SESSION["username"] ){
    //     header("Location: ../index.php");
    // }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel='shortcut icon' type='image/x-icon' href="../../upload/TKAY LOGO.png">

    <title>Expense Manager </title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/style.css" rel="stylesheet">

    <!-- Feather JS for Icons -->
    <script src="../js/feather.min.js"></script>

</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

     





    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
       
        <div class="nav-header">

             <div class="brand-logo">
             <!-- <div>hii</div> -->
                <a >
                    <span class="brand-title">
                    <i class="fa fa-usd menu-icon text-white"> </i><span class="text-white "> Manager</span>
                    <!-- <i class="icon-speedometer menu-icon"></i> <h4 class="text-white"> Expense Manager </h4> -->
                    </span>
                </a>
            </div> 
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">    
            <div class="header-content clearfix">
                
                <div class="nav-control">
                    <div class="hamburger">
                        <span class="toggle-icon"><i class="icon-menu"></i></span>
                    </div>
                </div>
                
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="nk-sidebar">           
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">
                   <br> <br>       
                    <li>
                        <a href="./index.php"  >
                            <i class="icon-speedometer menu-icon"></i><span class="nav-text">Dashboard</span>
                        </a>
                    </li>


                    <li>
                    <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-speedometer menu-icon"></i><span class="nav-text">Expenses</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="./add-expense.php">Add Expense</a></li>
                            <li><a href="./manage-expense.php">Manage Expense</a></li>

                        </ul>
                    </li>


                    <li>
                        <a href="include/logout.php" >
                            <i class="icon-logout menu-icon"></i><span class="nav-text">Logout</span>
                        </a>
                    </li>
                    <li>
                        <a href="./profile.php"  >
                            <img src="https://icon-library.net//images/icon-profile/icon-profile-20.jpg" width="14">
                            <i class="icon-meter menu-icon"></i><span class="nav-text">Profile</span>
                        </a>
                    </li>                 
                </ul>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">



        <div class="modal fade" id="showModal" data-backdrop="static" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div id="modalHead" class="modal-header">
                    <button id="modal_cross_btn" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span  aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <p id="addMsg"></p>
                </div>
                <div class="modal-footer ">
                    <div class="mx-auto">
                        <a type="button" id="changeHrefForAdding" href="#" class="btn btn-primary" >Add Expense For the Day</a>
                        <a type="button" id="changeHrefToShowReport" href="#" data-dismiss="modal" class="btn btn-primary">Close</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
            
            <!-- row -->

            <div class="container-fluid">

            