<?php
session_start();
$user_id = $_SESSION['user_id'];
?>
<!DOCTYPE html>
<html lang="en" class="menuitem-active">

<head>
    <meta charset="utf-8">
    <!-- <title>Starter Page | Hyper - Responsive Bootstrap 5 Admin Dashboard</title> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description">
    <meta content="Coderthemes" name="author">
    <!-- App favicon -->
    <!-- <link rel="shortcut icon" href="assets/images/users/Jillian-Ward.jpg"> -->

    <!-- App css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="light-style">
    <link href="assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style" disabled="disabled">

    <!-- Quill css -->
    <link href="assets/css/vendor/quill.core.css" rel="stylesheet" type="text/css">
    <link href="assets/css/vendor/quill.snow.css" rel="stylesheet" type="text/css">

    <!-- third party css -->
    <link href="assets/css/vendor/dataTables.bootstrap5.css" rel="stylesheet" type="text/css">
    <link href="assets/css/vendor/responsive.bootstrap5.css" rel="stylesheet" type="text/css">
    <!-- third party css end -->




</head>

<body <?php include('dataconfig.php') ?>>
    <!-- Begin page -->
    <div class="wrapper menuitem-active">
        <!-- ========== Left Sidebar Start ========== -->
        <div class="leftside-menu menuitem-active show">

            <!-- LOGO -->
            <a href="index.php" class="logo text-center logo-light">
                <span class="logo-lg">
                    <img src="assets/images/logo.png" alt="" height="16">
                </span>
                <span class="logo-sm">
                    <img src="assets/images/logo_sm.png" alt="" height="16">
                </span>
            </a>

            <!-- LOGO -->
            <a href="index.php" class="logo text-center logo-dark">
                <span class="logo-lg">
                    <img src="assets/images/logo-dark.png" alt="" height="16">
                </span>
                <span class="logo-sm">
                    <img src="assets/images/logo_sm_dark.png" alt="" height="16">
                </span>
            </a>

            <div class="h-100 show" id="leftside-menu-container" data-simplebar="init">
                <div class="simplebar-wrapper menuitem-active" style="margin: 0px;">
                    <div class="simplebar-height-auto-observer-wrapper">
                        <div class="simplebar-height-auto-observer"></div>
                    </div>
                    <div class="simplebar-mask show">
                        <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                            <div class="simplebar-content-wrapper menuitem-active"
                                style="height: 100%; overflow: hidden;">
                                <div class="simplebar-content show" style="padding: 0px;">

                                    <!--- Sidemenu -->
                                    <?php include('teacher_sidemenu.php') ?>


                                    <!-- End Sidebar -->

                                    <div class="clearfix"></div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="simplebar-placeholder" style="width: 70px; height: 1150px;"></div>
                </div>
                <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                    <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
                </div>
                <div class="simplebar-track simplebar-vertical" style="visibility: hidden;">
                    <div class="simplebar-scrollbar"
                        style="height: 0px; transform: translate3d(0px, 0px, 0px); display: none;"></div>
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

                <!-- Start Content-->
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="Teacher_Module.php">Dashboard</a></li>

                                        <li class="breadcrumb-item active">Upload Lesson</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Upload Lesson</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                </div> <!-- container -->

            </div> <!-- content -->



            <div class="row">
                <div class="col-lg-12">


                    <div class="card-header">

                        <div class="row float-end me-sm-2 mb-3">
                            <!-- <a href="javascript: void(0);" class="btn btn-info">Add Lesson</a> -->


                            <!-- Upload -->
                            <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                data-bs-target="#signup-modal">Add Lesson</button>
                            <div id="signup-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                        <div class="modal-body">


                                            <form class="ps-3 pe-3" action="#">

                                                <div class="mb-3">
                                                    <label for="username" class="form-label">Title</label>
                                                    <input class="form-control" type="text">
                                                </div>

                                                <div class="mb-3">
                                                    <label for="emailaddress" class="form-label">Lesson
                                                        Objectives</label>
                                                    <input class="form-control" type="text">
                                                </div>

                                                <div class="mb-3">
                                                    <label for="project-overview" class="form-label">Level of
                                                        learning</label>
                                                    <select class="form-control select1" data-toggle="select1">
                                                        <option>Select</option>
                                                        <option>basic</option>
                                                        <option>intermidiate</option>
                                                        <option>advance</option>
                                                    </select>
                                                </div>



                                                <div class="mb-0 text-md-end">
                                                    <button class="btn btn-info" type="submit">Save</button>
                                                </div>

                                            </form>

                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->



                        </div>

                        <div class="row mt-4">

                            <div class="col-lg-12">

                                <div class="row">

                                    <div class="col-lg-9 mt-3 ms-0  float-end">
                                        <button class="btn btn-info me-1" type="submit">Literacy</button>
                                        <button class="btn btn-info" type="submit">Numeracy</button>
                                    </div>

                                    <div class="col-lg-3 text-center  float-end pt-3">
                                        <form>
                                            <input type="text" class="form-control" placeholder="Search ...">
                                        </form>
                                    </div>

                                </div>
                            </div>





                        </div>

                    </div>

                    <div class="card-body">

                        <!-- card-content -->
                        <div cla></div>

                        <div class="col-md-12 col-lg-4">
                            <!-- Simple card -->
                            <div class="card d-block">
                                <img class="card-img-top" src="assets/images/small/small-1.jpg" alt="Card image cap">
                                <div class="card-body text-center">
                                    <!-- <h5 class="card-title">Card title</h5> -->
                                    <p class="card-text">Some quick example text to build on the card title and make
                                        up the bulk of the card's content. </p>
                                    <a href="Teacher_ManageLessonView.php" class="btn btn-info">View</a>
                                    <a href="Teacher_uploadlesson.php" class="btn btn-info">Upload</a>
                                    <a href="javascript: void(0);" class="btn btn-info">Archive</a>
                                </div> <!-- end card-body-->
                            </div> <!-- end card-->
                        </div><!-- end col -->





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
                            </script>20232023 © Hyper - Coderthemes.com
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
    <script src="assets/js/app.min.js"></script>

    <!-- quill js -->
    <script src="assets/js/vendor/quill.min.js"></script>
    <!-- quill Init js-->
    <script src="assets/js/pages/demo.quilljs.js"></script>

    <script src="assets/js/vendor/dropzone.min.js"></script>
    <script src="assets/js/ui/component.fileupload.js"></script>



</body>

</html>