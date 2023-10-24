<?php
// Ensure you start the session
session_start();
$user_id = $_SESSION['user_id'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('teacher_header.php') ?>
    <style>
    /* gif modal css */
    #gifModal .modal-body {
    display: flex;
    flex-direction: column;
    align-items: center;
    }

    #gifModal .modal-body img {
        max-width: 100%;
        height: auto;
        width: 200px; /* Adjust the width as desired */
        margin-bottom: 10px;
    }
    #errorModal .modal-body {
    display: flex;
    flex-direction: column;
    align-items: center;
    }

    #errorModal .modal-body img {
        max-width: 100%;
        height: auto;
        width: 200px; /* Adjust the width as desired */
        margin-bottom: 10px;
    }
    </style>
</head>

<body <?php include('dataconfig.php') ?>>
    <!-- Begin page -->
    <div class="wrapper">
        <!-- ========== Left Sidebar Start ========== -->
        <div class="leftside-menu">

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
        <!-- modal check gif -->
        <div id="gifModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body text-center">
                        <img src="assets/images/gif/check.gif" alt="GIF" class="img-fluid">
                        <p>Student added successfully</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- error modal -->
        <div id="errorModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body text-center">
                        <img src="assets/images/gif/error.gif" alt="Error GIF" class="img-fluid">
                        <p>The student has already been added.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="content-page">
            <div class="content">
                <!-- Topbar Start -->
                <?php include('teacher_topbar.php') ?>

                <!-- Start Content-->
                <!-- Add button to open the modal -->
                <div class="row">

           
                        <!-- Add button to open the modal -->
                        <div class="col-md-6">
                            <button type="button" class="btn btn-primary mt-3" data-bs-toggle="modal"
                                data-bs-target="#addStudentModal">Add Student</button>
                        </div>
                    </div>
                    <!-- Modal for adding a new quiz assignment -->
                    <div class="modal fade" id="addStudentModal" tabindex="-1" aria-labelledby="addStudentModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addStudentModalLabel">Add Student</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <!-- Form for adding a new quiz assignment -->
                                    <?php
                                    include 'dbcon.php';

                                    if (isset($_GET['lesson_id']) && isset($_POST['addStudent'])) {
                                        $lesson_id = $_GET['lesson_id'];
                                        $student = $_POST['student'];

                                        $checkSql = "SELECT student FROM tbl_quiz_student WHERE student = '$student' AND quiz_options_id = '$lesson_id'";
                                        $checkResult = mysqli_query($conn, $checkSql);

                                        if (mysqli_num_rows($checkResult) > 0) {
                                            $url = "Teacher_ManageLesson.php?lesson_id=$lesson_id&openerrorModal=true";
                                            echo '<script>window.location.href = "' . $url . '";</script>';
                                        } else {
                                            $sql = "INSERT INTO tbl_quiz_student (quiz_options_id, student) VALUES ('$lesson_id', '$student')";
                                            $result = mysqli_query($conn, $sql);

                                            if ($result) {
                                                $url = "Teacher_ManageLesson.php?lesson_id=$lesson_id&openModal=true";
                                                echo '<script>window.location.href = "' . $url . '";</script>';
                                            }
                                        }
                                    }
                                    ?>
                                    <form action="" method="POST">
                                        <div class="mb-3">
                                            <label for="inputState" class="form-label">Add Student</label>
                                            <select id="inputState" class="form-select" name="student">
                                                <option selected disabled>Select Student</option>
                                                <!-- Default option -->
                                                <?php
                                                include 'dbcon.php';

                                                $sql = "SELECT tbl_userinfo.user_id, tbl_learner.learner_id, tbl_learner.level_id, tbl_user_level.level, tbl_userinfo.firstname,
                                                tbl_userinfo.middlename, tbl_userinfo.lastname, tbl_userinfo.birthday, tbl_user_status.status,
                                                tbl_learner_id.lrn
                                                FROM tbl_learner
                                                JOIN tbl_user_level ON tbl_learner.level_id = tbl_user_level.level_id
                                                JOIN tbl_userinfo ON tbl_learner.user_id = tbl_userinfo.user_id
                                                JOIN tbl_learner_id ON tbl_learner.learner_id = tbl_learner_id.learner_id
                                                JOIN tbl_user_status ON tbl_learner.status_id = tbl_user_status.status_id
                                                WHERE tbl_user_level.level = 'LEARNER' AND tbl_user_status.status = 1";

                                                $result = mysqli_query($conn, $sql);

                                                if (mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                        $user_id = $row['user_id'];
                                                        $firstname = $row['firstname'];
                                                        $middlename = $row['middlename'];
                                                        $lastname = $row['lastname'];
                                                        $name = $firstname . ' ' . $middlename . ' ' . $lastname;
                                                        echo "<option value='$user_id'>$name</option>";
                                                    }   
                                                } else {
                                                    echo "<option value='' disabled>No lessons available</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary" name="addStudent">Add</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
            
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover table-centered table-nowrap mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Student</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if (isset($_GET['lesson_id'])) {
                                                    $lesson_id = $_GET['lesson_id'];
                                                    $sql = "SELECT tbl_quiz_student.student, tbl_quiz_student.quiz_options_id, CONCAT(tbl_userinfo.firstname, ' ', tbl_userinfo.middlename, ' ', tbl_userinfo.lastname) AS name
                                                    FROM tbl_quiz_student
                                                    JOIN tbl_userinfo ON tbl_quiz_student.student = tbl_userinfo.user_id
                                                    WHERE tbl_quiz_student.quiz_options_id = '$lesson_id'";

                                                    $result = mysqli_query($conn, $sql);
                                                    if ($result && mysqli_num_rows($result) > 0) {
                                                        while ($row = mysqli_fetch_assoc($result)) {
                                                            ?>
                                                            <tr>
                                                                <td>
                                                                    <span class="fw-semibold">
                                                                        <?php echo $row['name']; ?>
                                                                    </span>
                                                                </td>
                                                                <td>
                                                                    <a href="#" class="edit-icon"><i class="fas fa-edit"></i></a>
                                                                </td>
                                                                <td>
                                                                    <a href="#" class="archive-icon"><i class="fas fa-archive"></i></a>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                        }
                                                    }
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- bundle -->
                    <script src="assets/js/vendor.min.js"></script>
                    <script src="assets/js/app.min.js"></script>

                    <!-- quill js -->
                    <script src="assets/js/vendor/quill.min.js"></script>
                    <!-- quill Init js-->
                    <script src="assets/js/pages/demo.quilljs.js"></script>
                    <!-- script gif modal -->
                    <script>
                        $(document).ready(function() {
                            // Check if the "openModal" query parameter is present
                            const urlParams = new URLSearchParams(window.location.search);
                            const openModal = urlParams.get("openModal");

                            if (openModal === "true") {
                                // Trigger the modal using JavaScript
                                $("#gifModal").modal("show");
                            }
                        });
                    </script>
                    <!-- error modal script -->
                    <script>
                        $(document).ready(function() {
                            // Check if the "openModal" query parameter is present
                            const urlParams = new URLSearchParams(window.location.search);
                            const openerrorModal = urlParams.get("openerrorModal");

                            if (openerrorModal === "true") {
                                // Trigger the errorModal using JavaScript
                                $("#errorModal").modal("show");
                            }
                        });
                    </script>
</body>

</html>