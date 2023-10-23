<?php
session_start();
$user_id = $_SESSION['user_id'];
include 'dbcon.php';
?>

<!DOCTYPE html>
<html lang="en" class="menuitem-active">

<head>
    <meta charset="utf-8">
    <title>Admin Dashboard</title>
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
                <?php include('admin_topbar.php') ?>

     
                <!-- Start Content-->
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <div class="page-title-right">
                                </div>
                                <h4 class="page-title">Add Lesson</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <!-- Add button to open the modal -->
                
                    <div class="row">
                        <div class="col-md-6">
                            <a href="admin_upload_lesson.php">
                                <button type="button" class="btn btn-primary mt-3">Add Lesson</button>
                            </a>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="searchInput" placeholder="Search...">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" id="searchButton">Search</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Table to display quiz assignments -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover table-centered table-nowrap mb-0">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Title</th>
                                                    <th>Lesson Objectives</th>
                                                    <th>Lesson</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                                <tbody>
                                                    <?php
                                                    include 'dbcon.php';

                                                    $sql = "SELECT DISTINCT tbl_lesson.lesson_id, tbl_lesson.name, tbl_lesson.objective, tbl_lesson.type, tbl_lesson.added_by, tbl_lesson_files.status
                                                    FROM tbl_content
                                                    JOIN tbl_lesson ON tbl_content.lesson_id = tbl_lesson.lesson_id
                                                    JOIN tbl_lesson_files ON tbl_content.lesson_files_id = tbl_lesson_files.lesson_files_id
                                                    WHERE tbl_lesson_files.status = 1";

                                                    $result = mysqli_query($conn, $sql);

                                                    if ($result && mysqli_num_rows($result) > 0) {
                                                        while ($row = mysqli_fetch_assoc($result)) {
                                                    ?>
                                                        <tr>
                                                            <td>
                                                                <span class="fw-semibold">
                                                                    <?php echo $row['lesson_id']; ?>
                                                                </span>
                                                            </td>
                                                            <td>
                                                                <span class="fw-semibold">
                                                                    <?php echo $row['name']; ?>
                                                                </span>
                                                            </td>
                                                            <td>
                                                                <span class="fw-semibold">
                                                                    <?php echo $row['objective']; ?>
                                                                </span>
                                                            </td>
                                                            <td>
                                                                <span class="fw-semibold">
                                                                    <?php echo $row['type']; ?>
                                                                </span>
                                                            </td>
                                                            <td>
                                                                <a href="Teacher_ManageLesson.php?lesson_id=<?php echo $row['lesson_id']; ?>" class="btn btn-success btn-sm">Manage</a>
                                                                <a href="#" class="btn btn-primary btn-sm">Edit</a>
                                                                <a href="#" class="btn btn-danger btn-sm">Archive</a>
                                                            </td>
                                                        </tr>
                                                    <?php
                                                        }
                                                    }
                                                    ?>
                                                    <!-- End of database-generated rows -->
                                                </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- container -->
            </div> <!-- content -->
        </div>

        <script>
    document.addEventListener('DOMContentLoaded', function () {
        const searchInput = document.getElementById('searchInput');
        const searchButton = document.getElementById('searchButton');
        const tableRows = document.querySelectorAll('.table tbody tr');

        searchButton.addEventListener('click', function () {
            const searchTerm = searchInput.value.toLowerCase();

            for (const row of tableRows) {
                const cells = row.querySelectorAll('td');
                let match = false;

                for (const cell of cells) {
                    const cellText = cell.textContent.toLowerCase();
                    if (cellText.includes(searchTerm)) {
                        match = true;
                        break;
                    }
                }

                if (match) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            }
        });

        searchInput.addEventListener('keyup', function (event) {
            if (event.key === 'Enter') {
                searchButton.click();
            }
        });
    });
</script>




        <!-- bundle -->
        <script src="assets/js/vendor.min.js"></script>
        <script src="assets/js/app.min.js"></script>




</body>

</html>