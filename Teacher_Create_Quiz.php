<?php
// Ensure you start the session
session_start();
$user_id = $_SESSION['user_id'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('teacher_header.php') ?>
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
                        <div class="col-12">
                            <button type="button" class="btn btn-primary mt-3" data-bs-toggle="modal"
                                data-bs-target="#addQuizModal">Add Quiz</button>
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
                                    <?php 

                                    ?>
                                    <form id="addQuizForm" action="" method="POST">
                                        <div class="mb-3">
                                            <label for="quizTitle" class="form-label">Title</label>
                                            <input type="text" class="form-control" id="quizTitle" name="quizTitle">
                                        </div>
                                        <div class="mb-3">
                                            <label for="inputState" class="form-label">Select Lesson</label>
                                            <select id="inputState" class="form-select" name="lesson">
                                                <option selected disabled>Select a lesson</option>
                                                <!-- Default option -->
                                                <?php
                                                include 'dbcon.php';

                                                $sql = "SELECT tbl_lesson.lesson_id, tbl_lesson.name, tbl_lesson.type, tbl_lesson.level, tbl_lesson_files.status FROM tbl_lesson
                                                        JOIN tbl_lesson_files ON tbl_lesson.lesson_id = tbl_lesson_files.lesson_files_id
                                                        WHERE tbl_lesson_files.status = 1";

                                                $result = mysqli_query($conn, $sql);

                                                if (mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                        $lesson_id = $row['lesson_id'];
                                                        $name = $row['name'];
                                                        $type = $row['type'];
                                                        $level = $row['level'];
                                                        echo "<option value='$lesson_id'>$type: $level - $name</option>";
                                                    }   
                                                } else {
                                                    echo "<option value='' disabled>No lessons available</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary" id="addQuizButton">Add</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <script>
                    $(document).ready(function() {
                        // Handle form submission when the "Add" button is clicked
                        $("#addQuizButton").click(function() {
                            // Serialize the form data
                            var formData = $("#addQuizForm").serialize();

                            // Send an AJAX request to submit the form data
                            $.ajax({
                                type: "POST",
                                url: "process_add_quiz.php", // Replace with the URL to your PHP script to handle form submission
                                data: formData,
                                success: function(response) {
                                    // Handle the response from the server
                                    if (response == "success") {
                                        // Close the modal and reset the form
                                        $("#addQuizModal").modal("hide");
                                        $("#addQuizForm")[0].reset();
                                        // You can also reload or update the quiz list on success
                                        // Example: window.location.reload();
                                    } else {
                                        // Display an error message
                                        alert("Error occurred while adding quiz.");
                                    }
                                }
                            });
                        });
                    });
                    </script>




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

                $sql = "SELECT tbl_lesson.lesson_id, tbl_lesson.name, tbl_lesson.objective, tbl_lesson.level, tbl_lesson.type, tbl_lesson.added_by, tbl_lesson_files.lesson_files_id, tbl_lesson_files.lesson, 
                tbl_lesson_files.status, tbl_userinfo.firstname, tbl_userinfo.middlename, tbl_userinfo.lastname
                FROM tbl_content
                JOIN tbl_lesson ON tbl_content.lesson_id = tbl_lesson.lesson_id
                JOIN tbl_lesson_files ON tbl_content.lesson_files_id = tbl_lesson_files.lesson_files_id
                JOIN tbl_userinfo ON tbl_lesson.added_by = tbl_userinfo.user_id
                WHERE tbl_lesson_files.status = 1";

                $result = mysqli_query($conn, $sql);

                if ($result && mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                                                <tr>

                                                    <td>
                                                        <span class="fw-semibold">
                                                            <?php echo $row['lesson_id'] ?>
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <span class="fw-semibold">
                                                            <?php echo $row['name'] ?>
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <span class="fw-semibold">
                                                            <?php echo $row['objective'] ?>
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <span class="fw-semibold">
                                                            <?php echo $row['type'] ?>
                                                        </span>
                                                    </td>
                                                    <td>

                                                        <a href="Teacher_Manage_Quiz.php"
                                                            class="btn btn-success btn-sm">Manage</a>
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





        <!-- bundle -->
        <script src="assets/js/vendor.min.js"></script>
        <script src="assets/js/app.min.js"></script>

        <!-- quill js -->
        <script src="assets/js/vendor/quill.min.js"></script>
        <!-- quill Init js-->
        <script src="assets/js/pages/demo.quilljs.js"></script>

</body>

</html>