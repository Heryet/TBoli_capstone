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
    <!-- <link rel="shortcut icon" href="assets/images/favicon.ico"> -->

    <link href="assets/css/vendor/dataTables.bootstrap5.css" rel="stylesheet" type="text/css">
    <link href="assets/css/vendor/responsive.bootstrap5.css" rel="stylesheet" type="text/css">
    <!-- third party css end -->
    <!-- App css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="light-style">
    <link href="assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style">

    <!-- Quill css -->
    <link href="assets/css/vendor/quill.core.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/vendor/quill.snow.css" rel="stylesheet" type="text/css" />




    <!-- third party css end -->

</head>

<body <?php include('dataconfig.php') ?>>
    <!-- Begin page -->
    <div class="wrapper">
        <!-- ========== Left Sidebar Start ========== -->
        <div class="leftside-menu menuitem-active">

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
                <div class="simplebar-wrapper" style="margin: 0px;">
                    <div class="simplebar-height-auto-observer-wrapper">
                        <div class="simplebar-height-auto-observer"></div>
                    </div>
                    <div class="simplebar-mask">
                        <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                            <div class="simplebar-content-wrapper" style="height: 100%; overflow: hidden;">
                                <div class="simplebar-content" style="padding: 0px;">

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

                                        <li class="breadcrumb-item active">Manage Quiz</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Grade Book</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                </div> <!-- container -->

            </div> <!-- content -->


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table
                                    class="table table-centered table-borderless table-hover w-100 dt-responsive nowrap"
                                    id="products-datatable">
                                    <thead class="table-light">
                                        <tr>
                                            <th style="width: 20px;">
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="customCheck1">
                                                    <label class="form-check-label" for="customCheck1">&nbsp;</label>
                                                </div>
                                            </th>
                                            <th>Student</th>
                                            <th>Assignment</th>
                                            <th>Start date</th>
                                            <th>Due</th>
                                            <th>Status</th>
                                            <th>Max score</th>
                                            <th>%Of Overall</th>
                                            <th>To Grade/Submitted</th>
                                            <th>Grade Release</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="customCheck2">
                                                    <label class="form-check-label" for="customCheck2">&nbsp;</label>
                                                </div>
                                            </td>

                                            <td class="table-user">
                                                <img src="assets/images/users/avatar-4.jpg" alt="table-user"
                                                    class="me-2 rounded-circle">
                                                <a href="javascript:void(0);" class="text-body fw-semibold">Paul J.
                                                    Friend</a>
                                            </td>
                                            <td>
                                                <span class="fw-semibold">08 Quiz 1Literacy</span>
                                            </td>
                                            <td>Apr 12</td>
                                            <td>Apr 10</td>
                                            <td>..</td>
                                            <td>100</td>
                                            <td>6.7</td>
                                            <td>17</td>
                                            <td>Instant</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="customCheck2">
                                                    <label class="form-check-label" for="customCheck3">&nbsp;</label>
                                                </div>
                                            </td>

                                            <td class="table-user">
                                                <img src="assets/images/users/avatar-4.jpg" alt="table-user"
                                                    class="me-2 rounded-circle">
                                                <a href="javascript:void(0);" class="text-body fw-semibold">Evan
                                                    Grace</a>
                                            </td>
                                            <td>
                                                <span class="fw-semibold">08 Quiz 1Literacy</span>
                                            </td>
                                            <td>Apr 12</td>
                                            <td>Apr 10</td>
                                            <td>..</td>
                                            <td>100</td>
                                            <td>6.7</td>
                                            <td>17</td>
                                            <td>Instant</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- end card-body-->
                    </div>
                    <!-- end card-->
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->



           

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->


    </div>
    <!-- END wrapper -->


    <!-- Right Sidebar -->
    <div class="end-bar">

        <div class="rightbar-title">
            <a href="javascript:void(0);" class="end-bar-toggle float-end">
                <i class="dripicons-cross noti-icon"></i>
            </a>
            <h5 class="m-0">Settings</h5>
        </div>

        <div class="rightbar-content h-100" data-simplebar="init">
            <div class="simplebar-wrapper" style="margin: 0px;">
                <div class="simplebar-height-auto-observer-wrapper">
                    <div class="simplebar-height-auto-observer"></div>
                </div>
                <div class="simplebar-mask">
                    <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                        <div class="simplebar-content-wrapper" style="height: 100%; overflow: hidden scroll;">
                            <div class="simplebar-content" style="padding: 0px;">

                                <div class="p-3">

                                    <!-- Settings -->


                                    <div class="form-check form-switch mb-1">
                                        <input class="form-check-input" type="checkbox" name="color-scheme-mode"
                                            value="light" id="light-mode-check" checked="">
                                        <label class="form-check-label" for="light-mode-check">Light Mode</label>
                                    </div>

                                    <div class="form-check form-switch mb-1">
                                        <input class="form-check-input" type="checkbox" name="color-scheme-mode"
                                            value="dark" id="dark-mode-check">
                                        <label class="form-check-label" for="dark-mode-check">Dark Mode</label>
                                    </div>


                                    <!-- Width -->
                                    <h5 class="mt-4">Width</h5>
                                    <hr class="mt-1">
                                    <div class="form-check form-switch mb-1">
                                        <input class="form-check-input" type="checkbox" name="width" value="fluid"
                                            id="fluid-check" checked="">
                                        <label class="form-check-label" for="fluid-check">Fluid</label>
                                    </div>

                                    <div class="form-check form-switch mb-1">
                                        <input class="form-check-input" type="checkbox" name="width" value="boxed"
                                            id="boxed-check">
                                        <label class="form-check-label" for="boxed-check">Boxed</label>
                                    </div>


                                    <!-- Left Sidebar-->
                                    <h5 class="mt-4">Left Sidebar</h5>
                                    <hr class="mt-1">
                                    <div class="form-check form-switch mb-1">
                                        <input class="form-check-input" type="checkbox" name="theme" value="default"
                                            id="default-check">
                                        <label class="form-check-label" for="default-check">Default</label>
                                    </div>

                                    <div class="form-check form-switch mb-1">
                                        <input class="form-check-input" type="checkbox" name="theme" value="light"
                                            id="light-check" checked="">
                                        <label class="form-check-label" for="light-check">Light</label>
                                    </div>

                                    <div class="form-check form-switch mb-3">
                                        <input class="form-check-input" type="checkbox" name="theme" value="dark"
                                            id="dark-check">
                                        <label class="form-check-label" for="dark-check">Dark</label>
                                    </div>

                                    <div class="form-check form-switch mb-1">
                                        <input class="form-check-input" type="checkbox" name="compact" value="fixed"
                                            id="fixed-check" checked="">
                                        <label class="form-check-label" for="fixed-check">Fixed</label>
                                    </div>

                                    <div class="form-check form-switch mb-1">
                                        <input class="form-check-input" type="checkbox" name="compact" value="condensed"
                                            id="condensed-check">
                                        <label class="form-check-label" for="condensed-check">Condensed</label>
                                    </div>

                                    <div class="form-check form-switch mb-1">
                                        <input class="form-check-input" type="checkbox" name="compact"
                                            value="scrollable" id="scrollable-check">
                                        <label class="form-check-label" for="scrollable-check">Scrollable</label>
                                    </div>

                                    <div class="d-grid mt-4">
                                        <button class="btn btn-primary" id="resetBtn">Reset to Default</button>


                                    </div>
                                </div> <!-- end padding-->

                            </div>
                        </div>
                    </div>
                </div>
                <div class="simplebar-placeholder" style="width: 280px; height: 755px;"></div>
            </div>
            <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
            </div>
            <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
                <div class="simplebar-scrollbar"
                    style="height: 671px; transform: translate3d(0px, 0px, 0px); display: block;"></div>
            </div>
        </div>
    </div>

    <div class="rightbar-overlay"></div>
    <!-- /End-bar -->


    <!-- bundle -->
    <script src="assets/js/vendor.min.js"></script>
    <script src="assets/js/app.min.js"></script>

    <!-- quill js -->
    <script src="assets/js/vendor/quill.min.js"></script>
    <!-- quill Init js-->
    <script src="assets/js/pages/demo.quilljs.js"></script>

    <!-- third party js -->
    <script src="assets/js/vendor/jquery.dataTables.min.js"></script>
    <script src="assets/js/vendor/dataTables.bootstrap5.js"></script>
    <script src="assets/js/vendor/dataTables.responsive.min.js"></script>
    <script src="assets/js/vendor/responsive.bootstrap5.min.js"></script>
    <script src="assets/js/vendor/apexcharts.min.js"></script>
    <script src="assets/js/vendor/dataTables.checkboxes.min.js"></script>
    <!-- third party js ends -->
    <!-- demo app -->
    <script src="assets/js/pages/demo.gradebook.js"></script>
    <!-- end demo js-->



</body>

</html>