<?php
session_start();
$user_id = $_SESSION['user_id'];
?>

<!DOCTYPE html>
<html lang="en" class="menuitem-active">

<head>
    <meta charset="utf-8">
    <title>Learner Add Account</title>
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

    <style>
    .error {
        text-align: center;
        background: #f59595fb;
        color: #b92c2c;
        padding: 10px;
        width: 100%;
        border-radius: 5px;
    }
    </style>

</head>

<body class="show"
    data-layout-config="{&quot;leftSideBarTheme&quot;:&quot;dark&quot;,&quot;layoutBoxed&quot;:false, &quot;leftSidebarCondensed&quot;:false, &quot;leftSidebarScrollable&quot;:false,&quot;darkMode&quot;:false, &quot;showRightSidebarOnStart&quot;: false}"
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
                                <h4 class="page-title">Manage Admin</h4>
                                <?php if (isset($_GET['error'])) { ?>
                                <p class="error">
                                    <?php echo $_GET['error']; ?>
                                </p>
                                <?php } ?>
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
                            <table id="basic-datatable" class="table table-centered mb-0">
                                <div class="row mb-2">
                                    <div class="col-sm-4">
                                        <a href="admin_addnewadmin.php" class="btn btn-danger mb-2"><i
                                                class="mdi mdi-plus-circle me-2"></i> Add New Admin</a>
                                    </div>

                                </div>
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Full Name</th>
                                        <th>Email Address</th>
                                        <th>Contact Number</th>
                                        <th>Address</th>
                                        <th>Action</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                include "dbcon.php";

                                $sql = "SELECT tbl_admin.admin_id, tbl_userinfo.user_id, tbl_userinfo.firstname, tbl_userinfo.middlename, tbl_userinfo.lastname,
                                        tbl_usercredentials.email, tbl_usercredentials.contact, tbl_address.address,
                                        tbl_user_level.level, tbl_user_status.status
                                        FROM tbl_admin
                                        JOIN tbl_userinfo ON tbl_admin.user_id = tbl_userinfo.user_id
                                        JOIN tbl_usercredentials ON tbl_admin.credentials_id = tbl_usercredentials.usercredentials_id
                                        JOIN tbl_address ON tbl_admin.address_id = tbl_address.address_id
                                        JOIN tbl_user_level ON tbl_admin.level_id = tbl_user_level.level_id
                                        JOIN tbl_user_status ON tbl_admin.status_id = tbl_user_status.status_id
                                        WHERE tbl_user_level.level = 'ADMIN' AND tbl_user_status.status = 1";


                                $result = mysqli_query($conn, $sql);

                                if ($result && mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        ?>
                                    <tr>
                                        <td><?php echo $row['admin_id']; ?></td>
                                        <td><?php echo $row['firstname'] . ' ' . $row['middlename'] . ' ' . $row['lastname']; ?></td>
                                        <td><?php echo $row['email']; ?></td>
                                        <td><?php echo $row['contact']; ?></td>
                                        <td><?php echo $row['address']; ?></td>
                                        <td>
                                            <a href="admin_edit_admin_acc.php?user_id=<?php echo $row['user_id'] ?>">
                                                <button type="button" class="btn btn-primary"><i class="mdi mdi-pencil"></i> </button>
                                            </a>
                                            <a href="admin_account_deactivate.php?user_id=<?php echo $row['user_id'] ?>"
                                                class="decline">
                                                <button type="button" class="btn btn-danger"><i class="mdi mdi-archive"></i> </button>
                                            </a>
                                        </td>
                                        <td>
                                            <?php
                                                if ($row['status'] == 1) {
                                                    echo '<span class="badge bg-success">Active</span>';
                                                } else {
                                                    echo '<span class="badge bg-success">Inactive</span>';
                                                }
                                                ?>
                                        </td>
                                    </tr>
                                    <?php
                                    }
                                } else {
                                    echo "<tr><td colspan='6'>No records found</td></tr>";
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            

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
                                            <div class="alert alert-warning" role="alert">
                                                <strong>Customize </strong> the overall color scheme, sidebar menu, etc.
                                            </div>
                                            <!-- bundle -->
                                            <script src="assets/js/vendor.min.js"></script>
                                            <script src="assets/js/app.min.js"></script>



</body>

</html>