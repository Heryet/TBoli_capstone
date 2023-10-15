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
                                    if(isset($_GET['quiz_options_id']) && isset($_POST['addStudent'])) {
                                        $quiz_options_id = $_GET['quiz_options_id'];
                                        $student = $_POST['student'];

                                        $sql = "INSERT INTO tbl_quiz_student (quiz_options_id, student) VALUES ('$quiz_options_id', '$student')";

                                        $result = mysqli_query($conn, $sql);

                                        if($result) {
                                            header("Location: Teacher_Manage_Quiz.php?msg=Student Added Succesfully");
                                            exit();
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
                                                        $name = $firstname . $middlename . $lastname;
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
                                                if (isset($_GET['quiz_options_id'])) {
                                                    $quiz_options_id = $_GET['quiz_options_id'];
                                                    $sql = "SELECT tbl_quiz_student.student, tbl_quiz_options.quiz_options_id, CONCAT(tbl_userinfo.firstname, ' ', tbl_userinfo.middlename, ' ', tbl_userinfo.lastname) AS name
                                                    FROM tbl_quiz_student
                                                    JOIN tbl_quiz_options ON tbl_quiz_student.quiz_options_id = tbl_quiz_options.quiz_options_id
                                                    JOIN tbl_userinfo ON tbl_quiz_student.student = tbl_userinfo.user_id
                                                    WHERE tbl_quiz_options.quiz_options_id = '$quiz_options_id'";

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
</body>

</html>