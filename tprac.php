<?php
session_start();
$user_id = $_SESSION['user_id'];
?>
<!DOCTYPE html>
<html lang="en" class="menuitem-active">

<head>
    <meta charset="utf-8" />
    <title>Starter Page | Hyper - Responsive Bootstrap 5 Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico" />

    <!-- third party css -->
    <link href="assets/css/vendor/dataTables.bootstrap5.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/vendor/responsive.bootstrap5.css" rel="stylesheet" type="text/css" />
    <!-- third party css end -->

    <!-- App css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="light-style" />
    <link href="assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style" />
</head>

<body class="show"
    data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'
    style="visibility: visible;" data-leftbar-theme="dark" data-leftbar-compact-mode="condensed">
    <!-- Begin page -->
    <div class="wrapper">
        <!-- ========== Left Sidebar Start ========== -->
        <div class="leftside-menu menuitem-active">
            <!-- LOGO -->
            <a href="index.php" class="logo text-center logo-light">
                <span class="logo-lg">
                    <img src="assets/images/logo.png" alt="" height="16" />
                </span>
                <span class="logo-sm">
                    <img src="assets/images/logo_sm.png" alt="" height="16" />
                </span>
            </a>

            <!-- LOGO -->
            <a href="index.php" class="logo text-center logo-dark">
                <span class="logo-lg">
                    <img src="assets/images/logo-dark.png" alt="" height="16" />
                </span>
                <span class="logo-sm">
                    <img src="assets/images/logo_sm_dark.png" alt="" height="16" />
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
                                    <ul class="side-nav">
                                        <li class="side-nav-item menuitem-active">
                                            <a href="admin_dashboard.php" class="side-nav-link active">
                                                <i class="uil-home"></i>
                                                <span>Dashboard</span>
                                            </a>
                                        </li>

                                        <li class="side-nav-item">
                                            <a data-bs-toggle="collapse" href="#sidebarDashboards" aria-expanded="false"
                                                aria-controls="sidebarDashboards" class="side-nav-link collapsed">
                                                <i class="uil-user-plus"></i>
                                                <span class="badge bg-success float-end"></span>
                                                <span> Users </span>
                                                <span class="menu-arrow"></span>
                                            </a>
                                            <div class="collapse" id="sidebarDashboards" style="">
                                                <ul class="side-nav-second-level">
                                                    <li>
                                                        <a href="admin_student.php">Student</a>
                                                    </li>
                                                    \
                                                </ul>
                                            </div>
                                        </li>

                                        <li class="side-nav-item">
                                            <a href="admin_module_request.php" class="side-nav-link">
                                                <i class="fa fa-book"></i>
                                                <span>Manage Lesson</span>
                                            </a>
                                        </li>

                                        <li class="side-nav-item">
                                            <a href="Teacher_Resources.php" class="side-nav-link">
                                                <i class="fa fa-book"></i>
                                                <span>Manage Quiz</span>
                                            </a>
                                        </li>

                                        <li class="side-nav-item">
                                            <a href="#" class="side-nav-link">
                                                <i class="uil-user-plus"></i>
                                                <span>Assign Lesson to Student</span>
                                            </a>
                                        </li>
                                        <li class="side-nav-item">
                                            <a href="#" class="side-nav-link">
                                                <i class="uil-user-plus"></i>
                                                <span>Progress</span>
                                            </a>
                                        </li>

                                        <li class="side-nav-item">
                                            <a data-bs-toggle="collapse" href="#sidebarEmail" aria-expanded="false"
                                                aria-controls="sidebarEmail" class="side-nav-link">
                                                <i class="uil-folder-plus"></i>
                                                <span> Reports </span>
                                                <span class="menu-arrow"></span>
                                            </a>
                                            <div class="collapse" id="sidebarEmail">
                                                <ul class="side-nav-second-level">
                                                    <li>
                                                        <a href="Teacher_list_of_teacher.php">List of Teacher</a>
                                                    </li>
                                                    <li>
                                                        <a href="Teacher_studentlist.php">List of Learners</a>
                                                    </li>
                                                    <li>
                                                        <a href="#">List of Lesson w/Content</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                    <!-- Help Box -->

                                    <!-- end Help Box -->
                                    <!-- End Sidebar -->

                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="simplebar-required placeholder" style="width: 260px; height: 234px;"></div>
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
        hello
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">
                <!-- Topbar Start -->
                <div class="navbar-custom">
                    <ul class="list-unstyled topbar-menu float-end mb-0">
                        <li class="dropdown notification-list d-lg-none">
                            <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#"
                                role="button" aria-haspopup="false" aria-expanded="false">
                                <i class="dripicons-search noti-icon"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-animated dropdown-lg p-0">
                                <form class="p-3">
                                    <input type="text" class="form-control" required="" placeholder="Search ..."
                                        aria-label="Recipient's username" />
                                </form>
                            </div>
                        </li>

                        <li class="notification-list">
                            <a class="nav-link end-bar-toggle" href="javascript: void(0);">
                                <i class="dripicons-gear noti-icon"></i>
                            </a>
                        </li>

                        <li class="dropdown notification-list">
                            <a class="nav-link dropdown-toggle nav-user arrow-none me-0" data-bs-toggle="dropdown"
                                href="Teacher_Profile.php" role="button" aria-haspopup="false" aria-expanded="false">
                                <span class="account-user-avatar">
                                    <img src="assets/images/users/avatar-1.jpg" alt="user-image"
                                        class="rounded-circle" />
                                </span>
                                <span>
                                    <span class="account-user-name">Teacher Name</span>
                                    <span class="account-position">Position</span>
                                </span>
                            </a>
                            <div
                                class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu profile-dropdown">
                                <!-- item-->
                                <div class="dropdown-header noti-title">
                                    <h6 class="text-overflow m-0">Welcome !</h6>
                                </div>

                                <!-- item-->
                                <a href="Teacher_Profile.php" class="dropdown-item notify-item">
                                    <i class="mdi mdi-account-circle me-1"></i>
                                    <span>My Account</span>
                                </a>

                                <!-- item-->
                                <a href="Teacher_Login.php?logout=true" class="dropdown-item notify-item">
                                    <i class="mdi mdi-logout me-1"></i>
                                    <span>Logout</span>
                                </a>
                            </div>
                        </li>
                    </ul>
                    <button class="button-menu-mobile open-left">
                        <i class="mdi mdi-menu"></i>
                    </button>
                    <div class="app-search dropdown d-none d-lg-block">
                        <form>
                            <div class="input-group">
                                <input type="text" class="form-control dropdown-toggle" required=""
                                    placeholder="Search..." id="top-search" />
                                <span class="mdi mdi-magnify search-icon"></span>
                                <button class="input-group-text btn-primary" type="submit">Search</button>
                            </div>
                        </form>

                        <div class="dropdown-menu dropdown-menu-animated dropdown-lg" id="search-dropdown">
                            <!-- item-->
                            <div class="dropdown-header noti-title">
                                <h5 class="text-overflow mb-2">Found <span class="text-danger">17</span> results</h5>
                            </div>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="uil-notes font-16 me-1"></i>
                                <span>Analytics Report</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="uil-life-ring font-16 me-1"></i>
                                <span>How can I help you?</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="uil-cog font-16 me-1"></i>
                                <span>User profile settings</span>
                            </a>

                            <!-- item-->
                            <div class="dropdown-header noti-title">
                                <h6 class="text-overflow mb-2 text-uppercase">Users</h6>
                            </div>

                            <div class="notification-list">
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="d-flex">
                                        <img class="d-flex me-2 rounded-circle" src="assets/images/users/avatar-2.jpg"
                                            alt="Generic required placeholder image" height="32" />
                                        <div class="w-100">
                                            <h5 class="m-0 font-14">Erwin Brown</h5>
                                            <span class="font-12 mb-0">UI Designer</span>
                                        </div>
                                    </div>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="d-flex">
                                        <img class="d-flex me-2 rounded-circle" src="assets/images/users/avatar-5.jpg"
                                            alt="Generic required placeholder image" height="32" />
                                        <div class="w-100">
                                            <h5 class="m-0 font-14">Jacob Deo</h5>
                                            <span class="font-12 mb-0">Developer</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end Topbar -->

                <!-- Start Content-->
                <div class="container-fluid">
                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Enroll Student In
                                                Lesson</a></li>

                                        <li class="breadcrumb-item active">Manage Student</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Manage Student</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    < /div>
                        <!-- container -->
                </div>
                <!-- content -->

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <!-- <div class="row mb-2">
                                            <div class="col-sm-4">
                                                <a href="javascript:void(0);" class="btn btn-danger mb-2"><i class="mdi mdi-plus-circle me-2"></i> Add Sellers</a>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="text-sm-end">
                                                    <button type="button" class="btn btn-success mb-2 me-1"><i class="mdi mdi-cog"></i></button>
                                                    <button type="button" class="btn btn-light mb-2 me-1">Import</button>
                                                    <button type="button" class="btn btn-light mb-2">Export</button>
                                                </div>
                                            </div>
                                            end col
                                        </div> -->

                                <div class="table-responsive">
                                    <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                                        <thead>
                                            <tr>
                                                <th>LRN</th>
                                                <th>Student Name</th>
                                                <th>Birthdate</th>
                                                <th>Gender</th>
                                                <th>Full Address</th>
                                                <th>Phone</th>
                                                <th>Email</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr>
                                                <td>
                                                    02000221026
                                                </td>
                                                <td class="table-user">
                                                    <img src="assets/images/users/avatar-4.jpg" alt="table-user"
                                                        class="me-2 rounded-circle" />
                                                    <a href="javascript:void(0);" class="text-body fw-semibold">Paul J.
                                                        Friend</a>
                                                </td>
                                                <td>
                                                    <span class="fw-semibold"> 09/04/2001</span>
                                                </td>

                                                <td>
                                                    male
                                                </td>

                                                <td>
                                                    gensan city
                                                </td>

                                                <td>
                                                    09217381873
                                                </td>

                                                <td>
                                                    jvlaroco@gmail.com
                                                </td>
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

                <!-- Footer Start -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <script>
                                    document.write(new Date().getFullYear());
                                </script>
                                20232023202320232023202320232023 © Hyper - Coderthemes.com
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

                <!-- ============================================================== -->
                <!-- End Page content -->
                <!-- ============================================================== -->

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
                                    <div class="simplebar-content-wrapper"
                                        style="height: 100%; overflow: hidden scroll;">
                                        <div class="simplebar-content" style="padding: 0px;">
                                            <div class="p-3">
                                                <div class="alert alert-warning" role="alert"><strong>Customize
                                                    </strong>
                                                    the overall color scheme, sidebar menu, etc.</div>

                                                <!-- Settings -->
                                                <h5 class="mt-3">Color Scheme</h5>
                                                <hr class="mt-1" />

                                                <div class="form-check form-switch mb-1">
                                                    <input class="form-check-input" type="checkbox"
                                                        name="color-scheme-mode" value="light" id="light-mode-check"
                                                        checked="" />
                                                    <label class="form-check-label" for="light-mode-check">Light Mode
                                                        <sup>*</sup></label>
                                                </div>

                                                <div class="form-check form-switch mb-1">
                                                    <input class="form-check-input" type="checkbox"
                                                        name="color-scheme-mode" value="dark" id="dark-mode-check" />
                                                    <label class="form-check-label" for="dark-mode-check">Dark Mode
                                                        <sup>*</sup></label>
                                                </div>

                                                <!-- Width -->
                                                <h5 class="mt-4">Width</h5>
                                                <hr class="mt-1" />
                                                <div class="form-check form-switch mb-1">
                                                    <input class="form-check-input" type="checkbox" name="width"
                                                        value="fluid" id="fluid-check" checked="" />
                                                    <label class="form-check-label" for="fluid-check">Fluid
                                                        <sup>*</sup></label>
                                                </div>

                                                <div class="form-check form-switch mb-1">
                                                    <input class="form-check-input" type="checkbox" name="width"
                                                        value="boxed" id="boxed-check" />
                                                    <label class="form-check-label" for="boxed-check">Boxed
                                                        <sup>*</sup></label>
                                                </div>

                                                <!-- Left Sidebar-->
                                                <h5 class="mt-4">Left Sidebar</h5>
                                                <hr class="mt-1" />
                                                <div class="form-check form-switch mb-1">
                                                    <input class="form-check-input" type="checkbox" name="theme"
                                                        value="default" id="default-check" />
                                                    <label class="form-check-label" for="default-check">Default
                                                        <sup>*</sup></label>
                                                </div>

                                                <div class="form-check form-switch mb-1">
                                                    <input class="form-check-input" type="checkbox" name="theme"
                                                        value="light" id="light-check" checked="" />
                                                    <label class="form-check-label" for="light-check">Light
                                                        <sup>*</sup></label>
                                                </div>

                                                <div class="form-check form-switch mb-3">
                                                    <input class="form-check-input" type="checkbox" name="theme"
                                                        value="dark" id="dark-check" />
                                                    <label class="form-check-label" for="dark-check">Dark
                                                        <sup>*</sup></label>
                                                </div>

                                                <div class="form-check form-switch mb-1">
                                                    <input class="form-check-input" type="checkbox" name="compact"
                                                        value="fixed" id="fixed-check" checked="" />
                                                    <label class="form-check-label" for="fixed-check">Fixed
                                                        <sup>*</sup></label>
                                                </div>

                                                <div class="form-check form-switch mb-1">
                                                    <input class="form-check-input" type="checkbox" name="compact"
                                                        value="condensed" id="condensed-check" />
                                                    <label class="form-check-label" for="condensed-check">Condensed
                                                        <sup>*</sup></label>
                                                </div>

                                                <div class="form-check form-switch mb-1">
                                                    <input class="form-check-input" type="checkbox" name="compact"
                                                        value="scrollable" id="scrollable-check" />
                                                    <label class="form-check-label" for="scrollable-check">Scrollable
                                                        <sup>*</sup></label>
                                                </div>

                                                <div class="d-grid mt-4">
                                                    <button class="btn btn-primary" id="resetBtn">Reset to
                                                        Default</button>

                                                    <a href="../../product/hyper-responsive-admin-dashboard-template/index.htm"
                                                        class="btn btn-danger mt-3" target="_blank"><i
                                                            class="mdi mdi-basket me-1"></i> Purchase Now</a>
                                                </div>
                                            </div>
                                            <!-- end padding-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="simplebar-required placeholder" style="width: 280px; height: 755px;"></div>
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

                <!-- Datatables js -->
                <script src="assets/js/vendor/jquery.dataTables.min.js"></script>
                <script src="assets/js/vendor/dataTables.bootstrap5.js"></script>
                <script src="assets/js/vendor/dataTables.responsive.min.js"></script>
                <script src="assets/js/vendor/responsive.bootstrap5.min.js"></script>

                <!-- Datatable Init js -->
                <script src="assets/js/pages/demo.datatable-init.js"></script>
            </div>
        </div>
</body>

</html>