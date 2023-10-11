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

    <!-- third party css -->
    <link href="assets/css/vendor/dataTables.bootstrap5.css" rel="stylesheet" type="text/css">
    <link href="assets/css/vendor/responsive.bootstrap5.css" rel="stylesheet" type="text/css">
    <!-- third party css end -->

    <!-- App css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="light-style">
    <link href="assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style">



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
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="Teacher_index.php">Dashboard</a></li>

                                        <li class="breadcrumb-item active">Manage Student</li>
                                        <li class="breadcrumb-item active">Student Batch Upload</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Student Batch Upload</h4>
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
                            <div class="row mb-2">
                                <div class="col-sm-4">
                                    <a href="Teacher_AddStudent.php" class="btn btn-danger mb-2 me-2"><i
                                            class="mdi mdi-plus-circle me-2"></i> Add Student</a>

                                    <button type="button" class="btn btn-light mb-2 me-1" data-bs-toggle="modal"
                                        data-bs-target="#scrollable-modal">Batch Upload</button>
                                    <div class="modal fade" id="scrollable-modal" tabindex="-1" role="dialog"
                                        aria-labelledby="scrollableModalTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="scrollableModalTitle">Upload Files Here!
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-hidden="true"></button>
                                                </div>
                                                <div class="modal-body">



                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="card">
                                                                <div class="card-body">













                                                                    <div class="mb-3 mt-3 mt-xl-0">
                                                                        <label for="projectname" class="mb-0">Upload
                                                                            Excel File</label>


                                                                        <form action="/" method="post" class="dropzone"
                                                                            id="myAwesomeDropzone"
                                                                            data-plugin="dropzone"
                                                                            data-previews-container="#file-previews"
                                                                            data-upload-preview-template="#uploadPreviewTemplate">
                                                                            <div class="fallback">
                                                                                <input name="file" type="file">
                                                                            </div>

                                                                            <div class="dz-message needsclick">
                                                                                <i
                                                                                    class="h3 text-muted dripicons-cloud-upload"></i>
                                                                                <h4>Drop files here or click to upload.
                                                                                </h4>
                                                                            </div>
                                                                        </form>



                                                                        <!-- Preview -->
                                                                        <div class="dropzone-previews mt-3"
                                                                            id="file-previews"></div>

                                                                        <!-- file preview template -->
                                                                        <div class="d-none" id="uploadPreviewTemplate">
                                                                            <div
                                                                                class="card mt-1 mb-0 shadow-none border">
                                                                                <div class="p-2">
                                                                                    <div class="row align-items-center">
                                                                                        <div class="col-auto">

                                                                                            <i
                                                                                                class="  uil-file-upload-alt "></i>
                                                                                        </div>
                                                                                        <div class="col ps-0">
                                                                                            <a href="javascript:void(0);"
                                                                                                class="text-muted fw-bold"
                                                                                                data-dz-name=""></a>
                                                                                            <p class="mb-0"
                                                                                                data-dz-size=""></p>
                                                                                        </div>
                                                                                        <div class="col-auto">
                                                                                            <!-- Button -->
                                                                                            <a href=""
                                                                                                class="btn btn-link btn-lg text-muted"
                                                                                                data-dz-remove="">
                                                                                                <i
                                                                                                    class="dripicons-cross"></i>
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <!-- end file preview template -->
                                                                    </div>

                                                                    <!-- Date View -->



                                                                    <!-- end row -->


                                                                </div> <!-- end card-->
                                                            </div> <!-- end col-->
                                                        </div>
                                                        <!-- end row-->




                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="button" class="btn btn-primary">Add</button>
                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="text-sm-end">


                                            <!-- <button type="button" class="btn btn-light mb-2">Export</button> -->
                                        </div>
                                    </div>
                                    <!-- end col -->
                                </div>

                                <div class="table-responsive">
                                    <table
                                        class="table table-centered table-borderless table-hover w-100 dt-responsive nowrap"
                                        id="products-datatable">
                                        <thead class="table-light">
                                            <tr>
                                                <th style="width: 20px;">
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input"
                                                            id="customCheck1">
                                                        <label class="form-check-label"
                                                            for="customCheck1">&nbsp;</label>
                                                    </div>
                                                </th>
                                                <th>LRN</th>
                                                <th>Student Name</th>
                                                <th>Birthdate</th>
                                                <th>Gender</th>
                                                <th>Full Address</th>
                                                <th>Phone</th>
                                                <th>Email</th>
                                                <th>Action</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input"
                                                            id="customCheck2">
                                                        <label class="form-check-label"
                                                            for="customCheck2">&nbsp;</label>
                                                    </div>
                                                </td>
                                                <td>02000221026</td>
                                                <td class="table-user">
                                                    <img src="assets/images/users/avatar-4.jpg" alt="table-user"
                                                        class="me-2 rounded-circle">
                                                    <a href="javascript:void(0);" class="text-body fw-semibold">Paul J.
                                                        Friend</a>
                                                </td>
                                                <td><span class="fw-semibold"> 09/04/2001</span>
                                                </td>
                                                <td>male</td>
                                                <td>gensan city</td>
                                                <td>09217381873</td>
                                                <td>jvlaroco@gmail.com</td>
                                                <td>
                                                    <a href="javascript:void(0);" class="action-icon"> <i
                                                            class="uil-eye"></i></a>
                                                    <a href="javascript:void(0);" class="action-icon"> <i
                                                            class="mdi mdi-square-edit-outline"></i></a>
                                                    <a href="javascript:void(0);" class="action-icon"> <i
                                                            class="mdi mdi-delete"></i></a>
                                                </td>
                                                <td>
                                                    <span class="badge bg-success">Active</span>
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                    </div> <!-- end col -->
                </div>
                <!-- end row -->







                <!-- Footer Start -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <script>document.write(new Date().getFullYear())</script>
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


                <!-- Start right sidebar -->
                <?php include('Teacher_Settings.php'); ?>
                <!-- End right side bar -->


                <!-- bundle -->
                <script src="assets/js/vendor.min.js"></script>
                <script src="assets/js/app.min.js"></script>

                <!-- third party js -->
                <script src="assets/js/vendor/jquery.dataTables.min.js"></script>
                <script src="assets/js/vendor/dataTables.bootstrap5.js"></script>
                <script src="assets/js/vendor/dataTables.responsive.min.js"></script>
                <script src="assets/js/vendor/responsive.bootstrap5.min.js"></script>
                <script src="assets/js/vendor/apexcharts.min.js"></script>
                <script src="assets/js/vendor/dataTables.checkboxes.min.js"></script>
                <!-- third party js ends -->

                <!-- demo app -->
                <script src="assets/js/pages/demo.sellers.js"></script>
                <!-- end demo js-->

                <!-- quill js -->
                <script src="assets/js/vendor/quill.min.js"></script>
                <!-- quill Init js-->
                <script src="assets/js/pages/demo.quilljs.js"></script>

                <script src="assets/js/vendor/dropzone.min.js"></script>
                <script src="assets/js/ui/component.fileupload.js"></script>




            </div>
        </div>


</body>

</html>