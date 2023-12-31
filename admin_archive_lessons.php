<?php
session_start();
$user_id = $_SESSION['user_id'];
?>

<!DOCTYPE html>
<html lang="en" class="menuitem-active">

<head>
    <meta charset="utf-8">
    <title>Archive Lesson</title>
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
                                <h4 class="page-title">Manage Request</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                </div> <!-- container -->

            </div> <!-- content -->

            <table id="basic-datatable" class="table table-centered mb-0">
                <div class="row mb-2">

                    <div class="col-sm-12">
                        <div class="text-sm-end">

                            <a href="javascript:void(0);">
                                <button type="button" class="btn btn-success mb-2"><i
                                        class="uil-edit-alt"></i>Approve</button>
                            </a>
                            <a href="javascript:void(0);">
                                <button type="button" class="btn btn-danger mb-2"><i
                                        class="uil-edit-alt"></i>Decline</button>
                            </a>

                        </div>
                    </div><!-- end col-->
                </div>

        </div>
        <thead>
            <tr>
                <th>ID</th>
                <th>Lesson Name</th>
                <th>Objective</th>
                <th>Type of Lesson</th>
                <th>Lesson</th>
                <th>Added by</th>
                <th>Action</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
                    include 'dbcon.php';

                    $sql = "SELECT tbl_lesson.lesson_id, tbl_lesson.name, tbl_lesson.objective, tbl_lesson.type, tbl_lesson.added_by, tbl_lesson_files.lesson_files_id, tbl_lesson_files.lesson, 
                    tbl_lesson_files.status, tbl_userinfo.firstname, tbl_userinfo.middlename, tbl_userinfo.lastname
                    FROM tbl_content
                    JOIN tbl_lesson ON tbl_content.lesson_id = tbl_lesson.lesson_id
                    JOIN tbl_lesson_files ON tbl_content.lesson_files_id = tbl_lesson_files.lesson_files_id
                    JOIN tbl_userinfo ON tbl_lesson.added_by = tbl_userinfo.user_id
                    WHERE tbl_lesson_files.status IN (3,0)";

                    $result = mysqli_query($conn, $sql);

                    if (!$result) {
                        die("Error executing the query: " . mysqli_error($conn));
                    }

                    if ($result && mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            ?>
            <tr>
                <td><?php echo $row['lesson_id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['objective']; ?></td>
                <td><?php echo $row['type']; ?></td>
                <td><a href="teachers/lessons/<?php echo $row['lesson']; ?>"
                        target="_blank"><?php echo substr($row['lesson'], 0, 15); ?></a></td>
                <td><?php echo $row['firstname'] . ' ' . $row['middlename'] . ' ' . $row['lastname']; ?></td>
                <td>
                    <a href="admin_lesson_unarchive.php?lesson_files_id=<?php echo $row['lesson_files_id'] ?>"
                        class="accept">
                        <button type="button" class="btn btn-primary"><i class="mdi mdi-restore"></i> </button>
                    </a>
                </td>
                <td>
                    <?php
                                if ($row['status'] == 3) {
                                    echo '<span class="badge bg-danger">Archived</span>';
                                } elseif ($row['status'] == 0) {
                                    echo '<span class="badge bg-danger">Deleted</span>';
                                } else {
                                    echo "<tr><td colspan='6'>No records found</td></tr>";
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
            </td>
        </tbody>
        </table>

        <!-- bundle -->
        <script src="assets/js/vendor.min.js"></script>
        <script src="assets/js/app.min.js"></script>

</body>

</html>