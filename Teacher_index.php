<?php
session_start();
$user_id = $_SESSION['user_id'];

if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
    header("Location: Teacher_Login.php?Logout");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <!-- <title>Project Dashboard | Hyper - Responsive Bootstrap 5 Admin Dashboard</title> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description">
    <meta content="Coderthemes" name="author">
    <!-- App favicon -->
    <!-- <link rel="shortcut icon" href="assets/images/favicon.ico"> -->

    <!-- App css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="light-style">
    <link href="assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style" disabled="disabled">

</head>

<body <?php include('dataconfig.php') ?>>
    <!-- Begin page -->
    <div class="wrapper">
        <!-- ========== Left Sidebar Start ========== -->
        <div class="leftside-menu">

            <div class="h-100" id="leftside-menu-container" data-simplebar="init">
                <div class="simplebar-wrapper" style="margin: 0px;">
                    <div class="simplebar-height-auto-observer-wrapper">
                        <div class="simplebar-height-auto-observer"></div>
                    </div>
                    <div class="simplebar-mask">
                        <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                            <div class="simplebar-content-wrapper" style="height: 100%; overflow: hidden scroll;">
                                <div class="simplebar-content" style="padding: 0px;">

                                    <!--- Sidemenu -->
                                    <?php include('teacher_sidemenu.php') ?>


                                    <!-- End Sidebar -->

                                    <div class="clearfix"></div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="simplebar-placeholder" style="width: 260px; height: 1512px;"></div>
                </div>
                <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                    <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
                </div>
                <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
                    <div class="simplebar-scrollbar"
                        style="height: 344px; transform: translate3d(0px, 0px, 0px); display: block;"></div>
                </div>
            </div>
            <!-- Sidebar -left -->

        </div>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page"> 
            <div class="content">
                <!-- Topbar Start -->
                <?php include('teacher_topbar.php') ?>
                <!-- end Topbar -->

                <!-- Start Content-->
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <!-- <li class="breadcrumb-item"><a href="javascript: void(0);">Hyper</a></li>
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                                        <li class="breadcrumb-item active">Starter</li> -->
                                    </ol>
                                </div>
                                <h4 class="page-title">Modules</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                </div> <!-- container -->

            </div> <!-- content -->



            <div class="row">
                <div class="col-sm-9 border-top border-primary rounded-top">
                    <div class="row mt-3  " >
                        <div class="col-md-6 col-lg-4">

                                                <!-- Simple card -->
                                                <div class="card d-block">
                            <img class="card-img-top" src="assets/images/letters.jpg" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">Literacy</h5>
                                <p class="card-text">When: Feb 13 - June 2024</p><a href="Teacher_Literacy_Module.php"
                                    class="btn btn-primary">View Module</a>
                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                        </div>


                        <div class="col-md-6 col-lg-4">

                        <!-- Simple card -->
                        <div class="card d-block">
                            <img class="card-img-top" src="assets/images/numbers.jpg" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">Numeracy</h5>
                                <p class="card-text">When: Feb 13 - June 2024</p><a href="Teacher_Numeracy_Module.php"
                                    class="btn btn-primary">View Module</a>
                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                        </div><!-- end col -->

                        

                    </div>
                </div>
                    
                <div class="col-sm-3 border-start border-top border-primary rounded-top">
                    <div class="col-sm-12 mt-3" >
                        <div class="card" >
                            <div class="card-body" ><h5>TO-DO</h5> 
                                
                                        <p>
                                        <a class="" data-bs-toggle="collapse"
                                            href="#todo" aria-expanded="false"
                                            aria-controls="todo">
                                            <span class="uil-file-check">Assignment to grade</span>
                                        </a>
                                    </p>
                                    <div class="collapse" id="todo">
                                        <div class="card card-body mb-0">

                                        <ul class="" >

                                        <li class="">
                                            <a href="#">
                                                
                                                <span class="badge bg-success float-end">4</span>
                                                <span class="h6" > Literacy </span>
                                            </a>
                                            
                                        </li>

                                        <li class="side-nav-item">
                                            <a href="#">
                                                
                                                <span class="badge bg-success float-end">11</span>
                                                <span class="h6" > Numeracy </span>
                                            </a>
                                            
                                        </li>
                                        </ul>
                                        
                                        

                                        
                                        
                                        
                                            
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer Start -->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <script>
                            document.write(new Date().getFullYear())
                            </script> © Hyper - Coderthemes.com
                        </div>
                        <div class="col-md-6">
                            <div class="text-md-end footer-links d-none d-md-block">
                                <a href="javascript: void(0);">About</a>
                                <a href="javascript: void(0);">Support</a>
                                <a href="javascript: void(0);">Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- end Footer -->

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->


    </div>
    <!-- END wrapper -->



    <!-- Start right sidebar -->
    <?php include('Teacher_Settings.php'); ?>
    <!-- End right side bar -->



    <!-- bundle -->
    <script src="assets/js/vendor.min.js"></script>

</body>

</html>