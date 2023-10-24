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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" />
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
                                <h4 class="page-title">Add List</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <!-- Add button to open the modal -->
                    <div class="row">
                        <div class="col-md-6">
                            <button type="button" class="btn btn-primary mt-3" data-bs-toggle="modal"
                                data-bs-target="#addQuizModal">Add Quiz</button>
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
                                                    <th>Lesson Name</th>
                                                    <th>Lesson Instructions</th>
                                                    <th>Added By</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    include 'dbcon.php';

                                                    $sql = "SELECT DISTINCT tbl_quiz_options.quiz_options_id, tbl_quiz_options.added_by, tbl_quiz_options.title, tbl_quiz_options.lesson, tbl_quiz_options.instructions, tbl_userinfo.firstname, tbl_userinfo.lastname, tbl_lesson.name FROM tbl_quiz_options
                                                    JOIN tbl_userinfo ON tbl_quiz_options.added_by = tbl_userinfo.user_id
                                                    JOIN tbl_lesson ON tbl_quiz_options.lesson = tbl_lesson.lesson_id
                                                    WHERE tbl_quiz_options.lesson = tbl_lesson.lesson_id";

                                                    $result = mysqli_query($conn, $sql);

                                                    if ($result && mysqli_num_rows($result) > 0) {
                                                        while ($row = mysqli_fetch_assoc($result)) {

                                                    ?>
                                                <tr>
                                                    <td>
                                                        <span class="fw-semibold">
                                                            <?php echo $row['quiz_options_id']; ?>
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <span class="fw-semibold">
                                                            <?php echo $row['title']; ?>
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <span class="fw-semibold">
                                                            <?php echo $row['name']; ?>
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <span class="fw-semibold">
                                                            <?php echo $row['instructions']; ?>
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <span class="fw-semibold">
                                                            <?php echo $row['firstname'] . $row ['lastname']; ?>
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <a href="Teacher_Manage_Quiz.php?quiz_options_id=<?php echo $row['quiz_options_id']; ?>"
                                                            class="btn btn-success btn-sm">Manage</a>
                                                        <a href="Teacher_Add_QuizMultipleC.php?quiz_options_id=<?php echo $row['quiz_options_id']; ?>"
                                                            class="btn btn-primary btn-sm">Edit</a>

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
        <div class="row">
            <div class="col-md-6">
                <button type="button" class="btn btn-primary mt-3" id="openAddQuizModal">Add Quiz</button>
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

        <!-- Modal for adding a new quiz assignment -->
        <div class="modal fade" id="addQuizModal" tabindex="-1" aria-labelledby="addQuizModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addQuizModalLabel">Add Quiz Assignment</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Form for adding a new quiz assignment -->
                        <form class="needs-validation" novalidate action="" method="POST">
  
                            <div>
                                <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" name="addQuiz">Add</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
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