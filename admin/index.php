<?php
    session_start();
    $connect = new mysqli("localhost","root","","yans_store");
    

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Yans Admin Page</title>
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css" />
    <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css" />
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css" />
    <link rel="stylesheet" href="assets/vendors/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" href="assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css" />
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="shortcut icon" href="assets/images/favicon.png" />
</head>

<body>
    <div class="container-scroller">
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <div class="text-center sidebar-brand-wrapper d-flex align-items-center">
                <a class="sidebar-brand brand-logo" href="index.html"><img src="../logo/logo1-.png" alt="logo" /></a>
                <a class="sidebar-brand brand-logo-mini pl-4 pt-3" href="index.html"><img src="../logo/logo1-.png" alt="logo" /></a>
            </div>
            <ul class="nav">
                <li class="nav-item nav-profile">
                    <a href="#" class="nav-link">
                        <div class="nav-profile-image">
                            <img src="assets/images/faces/face1.jpg" alt="profile" />
                            <span class="login-status online"></span>
                            <!--change to offline or busy as needed-->
                        </div>
                        <div class="nav-profile-text d-flex flex-column pr-3">
                            <span class="font-weight-medium mb-2"><?php echo $_SESSION['user']['name']?></span>
                            <span class="font-weight-normal"><?php echo $_SESSION['user']['username']?></span>
                        </div>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?page=home">
                        <i class="mdi mdi-home menu-icon"></i>
                        <span class="menu-title">Home</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?page=inventory">
                        <i class="mdi mdi-hanger menu-icon"></i>
                        <span class="menu-title">Inventory</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?page=user">
                        <i class="mdi mdi-contacts menu-icon"></i>
                        <span class="menu-title">User</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?page=sales">
                        <i class="mdi mdi-cart menu-icon"></i>
                        <span class="menu-title">Sales</span>
                    </a>
                </li>
                <li class="nav-item sidebar-actions">
                    <div class="nav-link">
                        <div class="mt-4">
                            <ul class="mt-4 pl-0">
                                <li><a href="signout.php?page=signout">Sign Out</a></li>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
        </nav>
        <div class="container-fluid page-body-wrapper">
            <div id="theme-settings" class="settings-panel">
                <i class="settings-close mdi mdi-close"></i>
                <p class="settings-heading">SIDEBAR SKINS</p>
                <div class="sidebar-bg-options selected" id="sidebar-default-theme">
                    <div class="img-ss rounded-circle bg-light border mr-3"></div> Default
                </div>
                <div class="sidebar-bg-options" id="sidebar-dark-theme">
                    <div class="img-ss rounded-circle bg-dark border mr-3"></div> Dark
                </div>
                <p class="settings-heading mt-2">HEADER SKINS</p>
                <div class="color-tiles mx-0 px-4">
                    <div class="tiles light"></div>
                    <div class="tiles dark"></div>
                </div>
            </div>
            <nav class="navbar col-lg-12 col-12 p-lg-0 fixed-top d-flex flex-row">
                <div class="navbar-menu-wrapper d-flex align-items-stretch justify-content-between">
                    <a class="navbar-brand brand-logo-mini align-self-center d-lg-none" href="index.html"><img src="assets/images/logo-mini.svg" alt="logo" /></a>
                    <button class="navbar-toggler navbar-toggler align-self-center mr-2" type="button" data-toggle="minimize">
              <i class="mdi mdi-menu"></i>
            </button>
                    <ul class="navbar-nav">
                    </ul>
                    <ul class="navbar-nav navbar-nav-right ml-lg-auto">
                        <li class="nav-item dropdown d-none d-xl-flex border-0">
                            <i class="mdi mdi-earth"></i> English 
                        </li>
                        <li class="nav-item nav-profile dropdown border-0">
                            <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown">
                                <img class="nav-profile-img mr-2" alt="" src="assets/images/faces/face1.jpg" />
                                <span class="profile-name"><?php echo $_SESSION['user']['username']?></span>
                            </a>
                            <div class="dropdown-menu navbar-dropdown w-100" aria-labelledby="profileDropdown">
                                <a class="dropdown-item" href="signout.php?page=signout">
                                    <i class="mdi mdi-logout mr-2 text-primary"></i> Signout </a>
                            </div>
                        </li>
                    </ul>
                    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
              <span class="mdi mdi-menu"></span>
            </button>
                </div>
            </nav>
        <!---------------SIDE------------------->
        

        <div class="main-panel">
        
            <div class="content-wrapper pb-0" style ="margin-right:100px;">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card" style="margin: -45px -42px -22px -52px;">
                        <div class="card-body">
                <?php
                if(isset($_GET["page"])){
                    if($_GET["page"]=="home"){
                        include "home.php";
                    }
                    elseif($_GET["page"]=="inventory"){
                        include "inventory.php";
                    }
                    elseif($_GET["page"]=="user"){
                        include "user.php";
                    }
                    elseif($_GET["page"]=="sales"){
                        include "sales.php";
                    }
                    elseif($_GET["page"]=="add_product"){
                        include "add_product.php";
                    }
                    elseif($_GET["page"]=="add_user"){
                        include "add_user.php";
                    }
                    elseif($_GET["page"]=="add_sales"){
                        include "add_sales.php";
                    }
                    elseif($_GET["page"]=="delete_product"){
                        include "delete_product.php";
                    }
                    elseif($_GET["page"]=="delete_user"){
                        include "delete_user.php";
                    }
                    elseif($_GET["page"]=="edit_product"){
                        include "edit_product.php";
                    }
                    elseif($_GET["page"]=="edit_user"){
                        include "edit_user.php";
                    }
                }
                
                ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    
           
            <!-- container-scroller -->
            <!-- plugins:js -->
            <script src="assets/vendors/js/vendor.bundle.base.js"></script>
            <!-- endinject -->
            <!-- Plugin js for this page -->
            <script src="assets/vendors/chart.js/Chart.min.js"></script>
            <script src="assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
            <script src="assets/vendors/flot/jquery.flot.js"></script>
            <script src="assets/vendors/flot/jquery.flot.resize.js"></script>
            <script src="assets/vendors/flot/jquery.flot.categories.js"></script>
            <script src="assets/vendors/flot/jquery.flot.fillbetween.js"></script>
            <script src="assets/vendors/flot/jquery.flot.stack.js"></script>
            <script src="assets/vendors/flot/jquery.flot.pie.js"></script>
            <!-- End plugin js for this page -->
            <!-- inject:js -->
            <script src="assets/js/off-canvas.js"></script>
            <script src="assets/js/hoverable-collapse.js"></script>
            <script src="assets/js/misc.js"></script>
            <!-- endinject -->
            <!-- Custom js for this page -->
            <script src="assets/js/dashboard.js"></script>
            <!-- End custom js for this page -->
</body>

</html>