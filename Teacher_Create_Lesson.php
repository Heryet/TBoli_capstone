<?php
// Ensure you start the session
session_start();
$user_id = $_SESSION['user_id'];
?>

<!DOCTYPE html>
<html lang="en">

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
    <link href="assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style">

    <!-- Quill css -->
    <link href="assets/css/vendor/quill.core.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/vendor/quill.snow.css" rel="stylesheet" type="text/css" />

    <!-- Add this inside your <head> tag -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- jQuery (required for Select2) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <style>
    .success {
        font-size: 20px;
        text-align: center;
        background: #00FF00;
        color: #white;
        padding: 10px;
        width: 100%;
        border-radius: 5px;
    }
    </style>
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
                <?php include('teacher_sidemenu.php') ?>

                <!-- End Sidebar -->
                <div class="clearfix"></div>
            </div>
            <!-- Sidebar -left -->
        </div>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->
        <!-- modal gif -->
        <div id="gifModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body text-center">
                        <img src="assets/images/gif/check.gif" alt="GIF" class="img-fluid">
                        <p>Created successfully</p>
                    </div>
                </div>
            </div>
        </div>

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
                                <h4 class="page-title">Add Lesson</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <!-- Add button to open the modal -->
                
                    <div class="row">
                        <div class="col-md-6">
                            <a href="Teacher_uploadlesson.php">
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
                                                                <?php
    if ($row['type'] === 'Literacy') {
        // If the lesson type is 'Literacy', direct to Teacher_Literacy_Module.php
        echo '<a href="Teacher_Literacy_Module.php?lesson_id=' . $row['lesson_id'] . '" class="btn btn-info btn-sm">View</a>';
    } elseif ($row['type'] === 'Numeracy') {
        // If the lesson type is 'Numeracy', direct to Teacher_Numeracy_Module.php
        echo '<a href="Teacher_Numeracy_Module.php?lesson_id=' . $row['lesson_id'] . '" class="btn btn-info btn-sm">View</a>';
    } else {
        // Add a default action if the lesson type doesn't match 'Literacy' or 'Numeracy'
        echo '<a href="#" class="btn btn-info btn-sm">View</a>';
    }
    ?>
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

        <!-- quill js -->
        <script src="assets/js/vendor/quill.min.js"></script>
        <!-- quill Init js-->
        <script src="assets/js/pages/demo.quilljs.js"></script>

</body>

</html>