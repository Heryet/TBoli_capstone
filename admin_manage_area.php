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
                                    <?php include("admin_sidemenu.php") ?>



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
                <?php include("admin_topbar.php") ?>
                <!-- end Topbar -->
                <!-- Start Content-->
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">

                                    </ol>
                                </div>
                                <h4 class="page-title">Manage Request</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                </div> <!-- container -->

            </div> <!-- content -->

            <table id="basic-datatable" class="table table-centered mb-0">
                <div class="row mb-2">


                </div>
                <table id="basic-datatable" class="table table-centered mb-0">
                    <div class="row mb-2">
                        <div class="col-sm-4">
                            <a href="admin_add_new_area.php" class="btn btn-danger mb-2"><i
                                    class="mdi mdi-plus-circle me-2"></i> Add New Area</a>
                        </div>

                    </div>

        </div>

        <thead>
            <tr>
                <th class="">
                    <div class="form-check form-checkbox-success mb-2">
                        <input type="checkbox" class="form-check-input" id="customCheckAll">
                        <label class="form-check-label" for="customCheckAll">Select All</label>
                    </div>
                </th>
                <th>ID</th>
                <th>Area</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                include 'dbcon.php';

                $sql = "SELECT DISTINCT area_id, area FROM tbl_area";

                $result = mysqli_query($conn, $sql);

                if ($result && mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
            <tr>
                <td>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="customCheck2">
                        <label class="form-check-label" for="customCheck2">&nbsp;</label>
                    </div>
                </td>
                <td>
                    <span class="fw-semibold">
                        <?php echo $row['area_id'] ?>
                    </span>
                </td>
                <td>
                    <span class="fw-semibold">
                        <?php echo $row['area'] ?>
                    </span>
                </td>
                <td>

                    <a href="admin_teacher_deactivate.php?area_id=<?php echo $row['area_id'] ?>" class="decline">
                        <button type="button" class="btn btn-danger"><i class="mdi mdi-archive"></i> </button>
                    </a>
                </td>
            </tr>
            <?php
                    }
                }
                ?>

            <!-- <tr>
                        <td>
                            <div class="form-check form-checkbox-success">
                                <input type="checkbox" class="form-check-input customCheckbox" id="customCheckcolor2">
                                <label class="form-check-label" for="customCheckcolor2">Select</label>
                            </div>
                        </td>
                        <td>001</td>
                        <td>Maitum</td>
              
                        <td>
    <button type="button" class="btn btn-info"><i class="mdi mdi-pencil"></i> </button>
    <button type="button" class="btn btn-danger"><i class="mdi mdi-archive"></i> </button>

</td>



                        <td>
                            <div>
                                <span class="badge bg-success">Approved</span>
                            </div>
                        </td>
                    </tr>
                    
                    <tr>
                        <td>
                          <div class="form-check form-checkbox-success mb-2">
                            <input type="checkbox" class="form-check-input customCheckbox" id="customCheckcolor5">
                            <label class="form-check-label" for="customCheckcolor5">Select</label>
                          </div>
                        </td>
                        <td>0003</td>
                        <td>Maasim</td>

                        <td>
    <button type="button" class="btn btn-info"><i class="mdi mdi-pencil"></i> </button>
    <button type="button" class="btn btn-danger"><i class="mdi mdi-archive"></i> </button>

</td>

                        <td>
                          <span class="badge bg-success">Approved</span>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="form-check form-checkbox-success mb-2">
                            <input type="checkbox" class="form-check-input customCheckbox" id="customCheckcolor6">
                            <label class="form-check-label" for="customCheckcolor6">Select</label>
                          </div>
                        </td>
                        <td>0004</td>
                        <td>Gensan</td>

                        <td>
    <button type="button" class="btn btn-info"><i class="mdi mdi-pencil"></i> </button>
    <button type="button" class="btn btn-danger"><i class="mdi mdi-archive"></i> </button>

</td>


                        <td>
                          <span class="badge bg-danger">Decline</span>
                        </td>
                      </tr> -->


        </tbody>
        </table>

        <!-- Right Sidebar -->

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