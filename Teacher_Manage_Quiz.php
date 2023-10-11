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

                    <div class="row">
                        <div class="col-md-6">
                            <button type="button" class="btn btn-primary mt-3" data-bs-toggle="modal"
                                data-bs-target="#addQuizModal">Add Quiz</button>
                        </div>
                        <!-- Modal for adding a new quiz assignment -->
                        <div class="modal fade" id="addQuizModal" tabindex="-1" aria-labelledby="addQuizModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="addQuizModalLabel">Add Question</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Form for adding a new quiz assignment -->
                                        <form id="addQuizForm">
                                            <div class="modal-body">
                                                <div id="msg"></div>
                                                <div class="form-group">
                                                    <label>Question</label>
                                                    <!-- <input type="hidden" name="qid" value="<?php echo $_GET['id'] ?>" /> -->
                                                    <input type="hidden" name="id" />
                                                    <textarea rows='3' name="question" required="required"
                                                        class="form-control"></textarea>
                                                </div>
                                                <label>Options:</label>

                                                <div class="form-group">
                                                    <textarea rows="2" name="question_opt[0]" required=""
                                                        class="form-control"></textarea>
                                                    <span>
                                                        <label><input type="radio" name="is_right[0]" class="is_right"
                                                                value="1">
                                                            <small>Question Answer</small></label>
                                                    </span>
                                                    <br>
                                                    <textarea rows="2" name="question_opt[1]" required=""
                                                        class="form-control"></textarea>
                                                    <label><input type="radio" name="is_right[1]" class="is_right"
                                                            value="1">
                                                        <small>Question Answer</small></label>
                                                    <br>
                                                    <textarea rows="2" name="question_opt[2]" required=""
                                                        class="form-control"></textarea>
                                                    <label><input type="radio" name="is_right[2]" class="is_right"
                                                            value="1">
                                                        <small>Question Answer</small></label>
                                                    <br>
                                                    <textarea rows="2" name="question_opt[3]" required=""
                                                        class="form-control"></textarea>
                                                    <label><input type="radio" name="is_right[3]" class="is_right"
                                                            value="1">
                                                        <small>Question Answer</small></label>
                                                </div>

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
                                    <form id="addStudentForm">
                                        <div class="mb-3">
                                            <label for="inputState" class="form-label">Add Student</label>
                                            <select id="inputState" class="form-select" name="lesson">
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
                                    echo "<option value='$user_id'>$firstname $middlename  $lastname</option>";
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
                                    <button type="button" class="btn btn-primary" id="addStudentButton">Add</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    Questions
                                </div>
                                <div class="card-body">
                                    <ul class="list-group">

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    Students
                                </div>
                                <div class="card-body">

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
                    <script>
                    $(document).ready(function() {
                        // Handle form submission when the "Add" button is clicked
                        $("#addStudentButton").click(function() {
                            // Serialize the form data
                            var formData = $("#addStudentForm").serialize();

                            // Send an AJAX request to submit the form data
                            $.ajax({
                                type: "POST",
                                url: "process_add_quiz.php", // Replace with the URL to your PHP script to handle form submission
                                data: formData,
                                success: function(response) {
                                    // Handle the response from the server
                                    if (response == "success") {
                                        // Close the modal and reset the form
                                        $("#addStudentModal").modal("hide");
                                        $("#addStudentForm")[0].reset();
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
</body>

</html>