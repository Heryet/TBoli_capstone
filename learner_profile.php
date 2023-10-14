<?php
session_start();
$user_id = $_SESSION['user_id'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Profile | Hyper - Responsive Bootstrap 5 Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description">
    <meta content="Coderthemes" name="author">
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- App css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="light-style">
    <link href="assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style">

</head>

<body <?php include('dataconfig.php') ?>>
    <!-- Begin page -->
    <div class="wrapper">
        <!-- ========== Left Sidebar Start ========== -->
        <div class="leftside-menu">

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

            <div class="h-100" id="leftside-menu-container" data-simplebar="">

                <!--- Sidemenu -->
                <?php include("learnerSideMenu.php") ?>
                <!-- End Sidebar -->

                <div class="clearfix"></div>

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
                <?php include("learnerTopBar.php") ?>
                <!-- end Topbar -->

                <!-- Start Content-->
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Hyper</a></li>
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                                        <li class="breadcrumb-item active">Profile</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Profile</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->


                    <div class="row">
                        <div class="col-sm-12">
                            <!-- Profile -->
                            <div class="card bg-dark">
                                <div class="card-body profile-user-box">
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <div class="avatar-lg">
                                                        <img src="assets/images/users/Jillian-Ward.jpg" alt=""
                                                            class="rounded-circle img-thumbnail">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div>
                                                        <h4 class="mt-1 mb-1 text-white">
                                                            <?php echo $row['firstname'] . ' ' . $row['middlename'] . ' ' . $row['lastname'] ?>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end col-->
                                        <div class="col-sm-4">
                                            <div class="text-center mt-sm-0 mt-3 text-sm-end">
                                                <span class="badge badge-outline-info">
                                                    <?php echo $row['level'] ?>
                                                </span>
                                                <br>
                                                <br>
                                                <br>
                                                <a href="learner_edit_profile.php">
                                                    <button type="button" class="btn btn-info">
                                                        <i class="mdi mdi-account-edit me-1"></i> Edit Profile </button>
                                                </a>
                                            </div>
                                        </div>
                                        <!-- end col-->
                                    </div>
                                    <!-- end row -->
                                </div>
                                <!-- end card-body/ profile-user-box-->
                            </div>
                            <!--end profile/ card -->
                        </div>
                        <!-- end col-->
                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-sm-4 mb-2 mb-sm-0">
                            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                                aria-orientation="vertical">
                                <a class="nav-link active show" id="v-pills-profile-tab" data-bs-toggle="pill"
                                    href="#v-pills-profile" role="tab" aria-controls="v-pills-profile"
                                    aria-selected="false">
                                    <i class="mdi mdi-account-circle d-md-none d-block"></i>
                                    <span class="d-none d-md-block">Contact and basic Info</span>
                                </a>
                                <a class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill"
                                    href="#v-pills-settings" role="tab" aria-controls="v-pills-settings"
                                    aria-selected="false">
                                    <i class="mdi mdi-settings-outline d-md-none d-block"></i>
                                    <span class="d-none d-md-block">Achivements</span>
                                </a>
                            </div>
                        </div>
                        <!-- end col-->
                        <div class="col-sm-8">
                            <div class="tab-content" id="v-pills-tabContent">

                                <div class="tab-pane fade active show" id="v-pills-profile" role="tabpanel"
                                    aria-labelledby="v-pills-profile-tab">


                                    <h2>Contact and basic Info</h2>
                                    <br>

                                    <p class="h3 text-info">Contact</p>
                                    <br>
                                    <span class="h4">
                                        <i class="mdi mdi-cellphone-android"></i> &nbsp;09217381873 </span>
                                    <br>&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Mobile<br>
                                    <br>

                                    <span class="h4">
                                        <i class="mdi mdi-email"></i> &nbsp;Jillianxward@gmail.com </span>
                                    <br>&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Email<br>
                                    <br>

                                    <p class="h3 text-info">Websites and social links</p><br>

                                    <span class="h4">
                                        <i class="mdi mdi-facebook"></i> &nbsp;Jillian Ward </span>
                                    <br>&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Facebook<br>
                                    <br>
                                    <span class="h4">
                                        <i class="mdi mdi-instagram"></i> &nbsp;Jillianxdward</span>
                                    <br>&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Instagram<br>
                                    <br>

                                    <p class="h3 text-info">Basic info</p><br>

                                    <span class="h4">
                                        <i class="dripicons-user"></i> &nbsp;<?php echo $row['gender']?></span>
                                    <br>&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Gender<br>
                                    <br>
                                    <span class="h4">
                                        <i class="mdi mdi-cake-variant"></i> &nbsp;<?php echo $row['birthday']?></span>
                                    <br>&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Birth-date<br>
                                    <br>



                                </div>
                                <div class="tab-pane fade" id="v-pills-settings" role="tabpanel"
                                    aria-labelledby="v-pills-settings-tab">

                                    <div class="card ribbon-box">
                                        <div class="card-body">
                                            <div class="ribbon ribbon-info float-end"><i
                                                    class="mdi mdi-trophy-award"><span>Certified</span> </i>
                                            </div>
                                            <p class="mb-0">Certificate of Eligibility from the Professional Regulation
                                                Commission (PRC).
                                                This certificate confirms that they have met the basic qualifications
                                                and
                                                prerequisites for the
                                                licensure examination.
                                            </p>
                                        </div> <!-- end card-body -->
                                    </div> <!-- end card-->

                                    <div class="card ribbon-box">
                                        <div class="card-body">
                                            <div class="ribbon ribbon-success float-end"><i
                                                    class="mdi mdi-trophy-award"><span>Certified</span>
                                                </i> </div>
                                            <p class="mb-0">"This year, the esteemed accolade of 'Best Teacher of the
                                                Year' was
                                                rightfully
                                                bestowed upon our exceptional educator, as their
                                                unwavering dedication, passion, and profound impact on students' lives
                                                made them
                                                stand out as the
                                                epitome of excellence in the teaching profession."
                                            </p>
                                        </div> <!-- end card-body -->
                                    </div> <!-- end card-->

                                    <div class="card ribbon-box">
                                        <div class="card-body">
                                            <div class="ribbon ribbon-warning float-end"><i
                                                    class="mdi mdi-trophy-award"><span>Certified</span>
                                                </i> </div>
                                            <p class="mb-0">"With a rare blend of expertise, compassion, and creativity,
                                                our
                                                teacher has left an
                                                indelible mark on the hearts and minds of students, leading to their
                                                well-deserved
                                                distinction as the 'Best Teacher of the Year' and exemplifying the
                                                pinnacle of
                                                educational
                                                excellence."
                                            </p>
                                        </div> <!-- end card-body -->
                                    </div> <!-- end card-->





                                </div>
                            </div>
                            <!-- end tab-content-->
                        </div>
                        <!-- end col-->
                    </div>
                    <!-- end row-->




                </div> <!-- container -->

            </div> <!-- content -->

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


    <!-- Right Sidebar -->


    <div class="rightbar-overlay"></div>
    <!-- /End-bar -->


    <!-- bundle -->
    <script src="assets/js/vendor.min.js"></script>
    <script src="assets/js/app.min.js"></script>

    <!-- third party js -->
    <script src="assets/js/vendor/Chart.bundle.min.js"></script>
    <!-- third party js ends -->

    <!-- demo app -->
    <script src="assets/js/pages/demo.profile.js"></script>
    <!-- end demo js-->
</body>

</html>