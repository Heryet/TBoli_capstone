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

    <!-- App css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="light-style">
    <link href="assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style" disabled="disabled">

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
                <?php include('teacher_topbar.php') ?>

                <!-- Start Content-->
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <div class="page-title-right">

                                </div>
                                <h3 class="page-title"> Edit Profile</h3>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                </div> <!-- container -->

            </div> <!-- content -->


            <div class="row">
                <div class="col-sm-2 mb-2 mb-sm-0">
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active show" id="v-pills-home-tab" data-bs-toggle="pill" href="#v-pills-home"
                            role="tab" aria-controls="v-pills-home" aria-selected="true">
                            <i class="mdi mdi-home-variant d-md-none d-block"></i>
                            <span class="d-none d-md-block">Password and security</span>
                        </a>
                        <a class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" href="#v-pills-profile"
                            role="tab" aria-controls="v-pills-profile" aria-selected="false">
                            <i class="mdi mdi-account-circle d-md-none d-block"></i>
                            <span class="d-none d-md-block">Personal Details</span>
                        </a>
                        <a class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" href="#v-pills-settings"
                            role="tab" aria-controls="v-pills-settings" aria-selected="false">
                            <i class="mdi mdi-settings-outline d-md-none d-block"></i>
                            <span class="d-none d-md-block">Change Profile Picture</span>
                        </a>
                    </div>
                </div> <!-- end col-->

                <div class="col-sm-10">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade active show" id="v-pills-home" role="tabpanel"
                            aria-labelledby="v-pills-home-tab">

                            <h3>Password and security</h3>
                            <table class="table table-centered mb-0">
                                <tbody>
                                    <tr>
                                        <td>
                                            <h4>Change password</h4>
                                        </td>
                                        <td>

                                            <div class="d-grid">

                                                <!-- Signup modal-->
                                                <button type="button" class="btn btn-info btn-rounded"
                                                    data-bs-toggle="modal" data-bs-target="#change-pass">Change</button>
                                                <div id="change-pass" class="modal fade" tabindex="-1" role="dialog"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">

                                                            <div class="modal-body">
                                                                <div class="text-center mt-2 mb-4">
                                                                    <a href="index.html" class="text-success">
                                                                        <span><img src="assets/images/hacker.gif" alt=""
                                                                                height="100px"></span>
                                                                        <h3>Change Password</h3>
                                                                    </a>
                                                                </div>

                                                                <form class="ps-3 pe-3" action="#">

                                                                    <div class="mb-3">
                                                                        <label for="Current-password"
                                                                            class="form-label">Current password</label>
                                                                        <div class="input-group input-group-merge">
                                                                            <input type="password" id="Current-password"
                                                                                class="form-control"
                                                                                placeholder="Enter your current password">
                                                                            <div class="input-group-text"
                                                                                data-password="false">
                                                                                <span class="password-eye"></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="mb-3">
                                                                        <label for="new-password" class="form-label">New
                                                                            password</label>
                                                                        <div class="input-group input-group-merge">
                                                                            <input type="password" id="new-password"
                                                                                class="form-control"
                                                                                placeholder="Enter your new password">
                                                                            <div class="input-group-text"
                                                                                data-password="false">
                                                                                <span class="password-eye"></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="mb-3">
                                                                        <label for="password" class="form-label">Re-type
                                                                            new password</label>
                                                                        <div class="input-group input-group-merge">
                                                                            <input type="password" id="password"
                                                                                class="form-control"
                                                                                placeholder="Re-type your password">
                                                                            <div class="input-group-text"
                                                                                data-password="false">
                                                                                <span class="password-eye"></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>



                                                                    <div class="mb-3 text-center">
                                                                        <button class="btn btn-primary"
                                                                            type="submit">Change password</button>
                                                                    </div>

                                                                </form>

                                                            </div>
                                                        </div><!-- /.modal-content -->
                                                    </div><!-- /.modal-dialog -->
                                                </div><!-- /.modal -->

                                            </div>




                                        </td>
                                    </tr>

                                    <!-- ennddd -->






                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="v-pills-profile" role="tabpanel"
                            aria-labelledby="v-pills-profile-tab">



                            <div class="col-">
                                <div class="card">
                                    <div class="card-body">

                                        <h4>Personal Information</h4>


                                        <div class="row g-2">



                                            <div class="mb-3 col-md-6">
                                                <label for="FName" class="form-label">First Name </label>
                                                <h4 class="form-control">Jillian</h4>
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="MiddleName" class="form-label">Middle Name </label>
                                                <h4 class="form-control">Penzon</h4>
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="LName" class="form-label">Last Name </label>
                                                <h4 class="form-control">Ward</h4>
                                            </div>

                                            <div class="mb-3 col-md-6">
                                                <label for="SuffiName" class="form-label">Suffix Name </label>
                                                <h4 class="form-control">None</h4>
                                            </div>
                                        </div>

                                        <div class="row g-2">
                                            <div class="mb-3 col-md-6">
                                                <label for="inputbday" class="form-label">Birthdate </label>
                                                <h4 class="form-control">February 23, 2005</h4>
                                            </div>
                                            <div class="mb-3 col-md-4">
                                                <label for="inputGender" class="form-label">Gender </label>
                                                <h4 class="form-control">Female</h4>
                                            </div>
                                        </div>

                                        <h4>Location</h4>

                                        <div class="mb-3">
                                            <label for="inputAddress" class="form-label">Full address (street, barangay,
                                                city) </label>
                                            <h4 class="form-control">Laguilayan, Isulan, Sultan Kudarat, Purok 5</h4>
                                        </div>

                                        <h4>Contact Information</h4>
                                        <div class="row g-2">
                                            <div class="mb-3 col-md-6">
                                                <label for="inputCity" class="form-label">Email </label>
                                                <h4 class="form-control">Jillianward@gmail.com</h4>
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="inputBarangay" class="form-label">Phone Number </label>
                                                <h4 class="form-control">09217381873</h4>
                                            </div>
                                        </div>





                                        <div class="table-responsive">

                                        </div> <!-- end table-responsive-->

                                    </div> <!-- end card body-->
                                </div> <!-- end card -->
                            </div>



                        </div>
                        <div class="tab-pane fade" id="v-pills-settings" role="tabpanel"
                            aria-labelledby="v-pills-settings-tab">


                            <h4>Upload your picture here!</h4>

                            <br>
                            <br>
                            <!-- File Upload -->
                            <form action="/" method="post" class="dropzone" id="myAwesomeDropzone"
                                data-plugin="dropzone" data-previews-container="#file-previews"
                                data-upload-preview-template="#uploadPreviewTemplate">


                                <div class="fallback">
                                    <input name="file" type="file" />
                                </div>

                                <div class="dz-message needsclick">
                                    <i class="h1 text-muted dripicons-cloud-upload"></i>
                                    <h3>Drop files here or click to upload.</h3>
                                    <span class="text-muted font-13">(This is just a demo dropzone. Selected files are
                                        <strong>not</strong> actually uploaded.)</span>
                                </div>




                            </form>

                            <div class="d-grid col-sm-2 mt-3">
                                <button type="button" class="btn btn-info">Update</button>

                            </div>

                            <!-- Preview -->
                            <div class="dropzone-previews mt-3" id="file-previews"></div>

                            <!-- file preview template -->
                            <div class="d-none" id="uploadPreviewTemplate">
                                <div class="card mt-1 mb-0 shadow-none border">
                                    <div class="p-2">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <img data-dz-thumbnail src="#" class="avatar-sm rounded bg-light"
                                                    alt="">
                                            </div>
                                            <div class="col ps-0">
                                                <a href="javascript:void(0);" class="text-muted fw-bold"
                                                    data-dz-name></a>
                                                <p class="mb-0" data-dz-size></p>
                                            </div>
                                            <div class="col-auto">
                                                <!-- Button -->
                                                <a href="" class="btn btn-link btn-lg text-muted" data-dz-remove>
                                                    <i class="dripicons-cross"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>




                        </div>
                    </div> <!-- end tab-content-->
                </div> <!-- end col-->
            </div>
            <!-- end row-->



            <!-- Footer Start -->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <script>document.write(new Date().getFullYear())</script>202320232023202320232023 © Hyper -
                            Coderthemes.com
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


            <!-- Start right sidebar -->
            <?php include('Teacher_Settings.php'); ?>
            <!-- End right side bar -->


            <!-- bundle -->
            <script src="assets/js/vendor.min.js"></script>
            <script src="assets/js/app.min.js"></script>

            <!-- plugin js -->
            <script src="assets/js/vendor/dropzone.min.js"></script>
            <!-- init js -->
            <script src="assets/js/ui/component.fileupload.js"></script>

        </div>
    </div>
</body>

</html>