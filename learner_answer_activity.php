<?php
session_start();
$user_id = $_SESSION['user_id'];
?>
<!DOCTYPE html>
<html lang="en" class="menuitem-active">

<head>
    <meta charset="utf-8">
    <title>Starter Page | Hyper - Responsive Bootstrap 5 Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description">
    <meta content="Coderthemes" name="author">
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">


    <!-- App css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="light-style">
    <link href="assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style" disabled="disabled">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Quill css -->
    <link href="assets/css/vendor/quill.core.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/vendor/quill.snow.css" rel="stylesheet" type="text/css" />

</head>

<body class="show"
    data-layout-config="{&quot;leftSideBarTheme&quot;:&quot;dark&quot;,&quot;layoutBoxed&quot;:false, &quot;leftSidebarCondensed&quot;:false, &quot;leftSidebarScrollable&quot;:false,&quot;darkMode&quot;:false, &quot;showRightSidebarOnStart&quot;: true}"
    data-leftbar-theme="dark" data-leftbar-compact-mode="condensed" style="visibility: visible;">
    <!-- Begin page -->
    <div class="wrapper">
        <!-- ========== Left Sidebar Start ========== -->
        <div class="leftside-menu menuitem-active">

            <!-- LOGO -->
            <a href="index.html" class="logo text-center logo-light">
                <span class="logo-lg">
                    <img src="assets/images/logo.png" alt="" height="16">
                </span>
                <span class="logo-sm">
                    <img src="assets/images/logo_sm.png" alt="" height="16">
                </span>
            </a>

            <!-- LOGO -->
            <a href="index.html" class="logo text-center logo-dark">
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
                                    <?php include('learnerSideMenu.php'); ?>


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
                <?php include('learnerTopBar.php') ?>
                <!-- end Topbar -->

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
                                    <div class="simplebar-content-wrapper"
                                        style="height: 100%; overflow: hidden scroll;">
                                        <div class="simplebar-content" style="padding: 0px;">

                                            <div class="p-3">
                                                <div class="alert alert-warning" role="alert">
                                                    <strong>Customize </strong> the overall color scheme, sidebar menu,
                                                    etc.
                                                </div>

                                                <!-- Settings -->
                                                <h5 class="mt-3">Color Scheme</h5>
                                                <hr class="mt-1">

                                                <div class="form-check form-switch mb-1">
                                                    <input class="form-check-input" type="checkbox"
                                                        name="color-scheme-mode" value="light" id="light-mode-check"
                                                        checked="">
                                                    <label class="form-check-label" for="light-mode-check">Light
                                                        Mode</label>
                                                </div>

                                                <div class="form-check form-switch mb-1">
                                                    <input class="form-check-input" type="checkbox"
                                                        name="color-scheme-mode" value="dark" id="dark-mode-check">
                                                    <label class="form-check-label" for="dark-mode-check">Dark
                                                        Mode</label>
                                                </div>


                                                <!-- Width -->
                                                <h5 class="mt-4">Width</h5>
                                                <hr class="mt-1">
                                                <div class="form-check form-switch mb-1">
                                                    <input class="form-check-input" type="checkbox" name="width"
                                                        value="fluid" id="fluid-check" checked="">
                                                    <label class="form-check-label" for="fluid-check">Fluid</label>
                                                </div>

                                                <div class="form-check form-switch mb-1">
                                                    <input class="form-check-input" type="checkbox" name="width"
                                                        value="boxed" id="boxed-check">
                                                    <label class="form-check-label" for="boxed-check">Boxed</label>
                                                </div>


                                                <!-- Left Sidebar-->
                                                <h5 class="mt-4">Left Sidebar</h5>
                                                <hr class="mt-1">
                                                <div class="form-check form-switch mb-1">
                                                    <input class="form-check-input" type="checkbox" name="theme"
                                                        value="default" id="default-check">
                                                    <label class="form-check-label" for="default-check">Default</label>
                                                </div>

                                                <div class="form-check form-switch mb-1">
                                                    <input class="form-check-input" type="checkbox" name="theme"
                                                        value="light" id="light-check" checked="">
                                                    <label class="form-check-label" for="light-check">Light</label>
                                                </div>

                                                <div class="form-check form-switch mb-3">
                                                    <input class="form-check-input" type="checkbox" name="theme"
                                                        value="dark" id="dark-check">
                                                    <label class="form-check-label" for="dark-check">Dark</label>
                                                </div>

                                                <div class="form-check form-switch mb-1">
                                                    <input class="form-check-input" type="checkbox" name="compact"
                                                        value="fixed" id="fixed-check" checked="">
                                                    <label class="form-check-label" for="fixed-check">Fixed</label>
                                                </div>

                                                <div class="form-check form-switch mb-1">
                                                    <input class="form-check-input" type="checkbox" name="compact"
                                                        value="condensed" id="condensed-check">
                                                    <label class="form-check-label"
                                                        for="condensed-check">Condensed</label>
                                                </div>

                                                <div class="form-check form-switch mb-1">
                                                    <input class="form-check-input" type="checkbox" name="compact"
                                                        value="scrollable" id="scrollable-check">
                                                    <label class="form-check-label"
                                                        for="scrollable-check">Scrollable</label>
                                                </div>

                                                <div class="d-grid mt-4">
                                                    <button class="btn btn-primary" id="resetBtn">Reset to
                                                        Default</button>

                                                    <a href="../../product/hyper-responsive-admin-dashboard-template/index.htm"
                                                        class="btn btn-danger mt-3" target="_blank"><i
                                                            class="mdi mdi-basket me-1"></i> Purchase Now</a>
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



</body>

</html>