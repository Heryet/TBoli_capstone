<?php
session_start();
$user_id = $_SESSION['user_id'];

// Check if the quiz_option_id is provided in the URL
if (isset($_GET['quiz_option_id'])) {
    $quiz_option_id = $_GET['quiz_option_id'];

    // Query the database to retrieve the quiz details for editing
    include 'dbcon.php';

    $sql = "SELECT * FROM tbl_quiz_options WHERE quiz_option_id = $quiz_option_id";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $quiz_data = mysqli_fetch_assoc($result);
    } else {
        // Quiz not found, handle the error
        echo "Quiz not found in the database.";
        exit;
    }
}

// Handle the form submission for editing the quiz
if (isset($_POST['updatequiz'])) {
    // Get the updated quiz data from the form
    $title = $_POST['title'];
    $lesson = $_POST['lesson'];
    $max = $_POST['max'];
    $dateStart = $_POST['date_start'];
    $due = $_POST['due'];
    $instructions = $_POST['instructions'];

    // Update the quiz in the database
    $sql = "UPDATE tbl_quiz_options SET
        title = '$title',
        lesson = '$lesson',
        max = '$max',
        date_start = '$dateStart',
        due = '$due',
        instructions = '$instructions'
        WHERE quiz_option_id = $quiz_option_id";

    if (mysqli_query($conn, $sql)) {
        // Quiz updated successfully
        header("Location: Teacher_Create_Quiz.php?msg=Quiz updated successfully");
        exit();
    } else {
        // Error occurred
        echo "Error updating quiz: " . mysqli_error($conn);
    }
}
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
                                <h4 class="page-title">Add quiz assignment</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                </div> <!-- container -->

            </div> <!-- content -->
            <?php
include 'dbcon.php';

$sql = "SELECT DISTINCT tbl_quiz_options.quiz_options_id, tbl_quiz_options.added_by, tbl_quiz_options.title, tbl_quiz_options.lesson, tbl_quiz_options.date_start, tbl_quiz_options.max_score,
tbl_quiz_options.due, tbl_quiz_options.allow_late, tbl_quiz_options.attempts, tbl_quiz_options.instructions, tbl_userinfo.firstname, tbl_userinfo.lastname, tbl_lesson.name, tbl_lesson.type 
FROM tbl_quiz_options
JOIN tbl_userinfo ON tbl_quiz_options.added_by = tbl_userinfo.user_id
JOIN tbl_lesson ON tbl_quiz_options.lesson = tbl_lesson.lesson_id";

$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    // You may want to fetch the first row for later use
    $row = mysqli_fetch_assoc($result);
} else {
    echo "No records found in tbl_quiz_options";
}

?>
            <div class="row">
                <div class="card">
                    <div class="card-header mb-3">
                        <h4>Add Quiz</h4>
                    </div>
                    <form action="teacher_add_quiz_multiplec.php" method="POST" id="multiple_choice">
                        <div class="mb-3 me-5 ms-4">
                            <label for="simpleinput" class="form-label">Title</label>
                            <input type="text" id="title" class="form-control" name="title"
                                value="<?php echo $row['title'] ?>">

                            <div class="col-lg-3 me-4">
                                <div class="mb-3" style="width: 300px;">
                                    <label for="inputState" class="form-label">Lesson</label>
                                    <input type="text" id="name" class="form-control" name="name"
                                        value="<?php echo $row['name']; ?>">
                                </div>

                            </div>
                        </div>
                        <h3 class="ms-4 mt-3 mb-3">Options</h3>
                        <div class="mb-3 me-5 ms-4">


                            <div class="col-lg-2">
                                <div class="mb-3 position-relative" id="datepicker1">
                                    <label class="form-label">Date Start</label>
                                    <input type="datetime-local" class="form-control" name="date_start"
                                        value="<?php echo $row['date_start'] ?>" readonly required>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="mb-3 position-relative" id="datepicker2">
                                    <label class="form-label">Due</label>
                                    <input type="datetime-local" class="form-control" name="due">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 me-5 ms-4">

                            <div class="col-lg-2">
                                <div class="mb-3" style="width: 170px">
                                    <label for="attempts" class="form-label">Attempts</label>
                                    <select id="attempts" class="form-select" name="attempts">
                                        <option selected disabled>Select attempts</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row me-5 ms-4">
                            <h3 class="mt-4 mb-4">Instructions</h3>
                            <div class="instructions" id="snow-editor" style="height: 300px;">
                                <?php echo $row['instructions']; ?>
                            </div>
                        </div>

                        <div class="row justify-content-md-center mt-4">
                            <div class="card col-sm-11">
                                <div class="card-body">
                                    <div class="row mt-4">
                                        <div class="col-sm-6 offset-sm-3 text-center">
                                            <input type="submit" class="btn btn-primary" value="Create Quiz"
                                                name="createquiz">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>



            <!-- end content here -->
        </div>
        <!-- <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                                <p class="mb-0">...</p>
                            </div> -->
    </div> <!-- end tab-content-->
    </div> <!-- end col-->
    </div>
    <!-- end row-->
    </div>
    </div>
    <!-- END wrapper -->
    <script>
    $(document).ready(function() {
        $('#inputState').select2();
    });
    </script>


    <!-- Start right sidebar -->
    <?php include('Teacher_Settings.php'); ?>
    <!-- End right side bar -->


    <!-- bundle -->
    <script src="assets/js/vendor.min.js"></script>
    <script src="assets/js/app.min.js"></script>

    <!-- quill js -->
    <script src="assets/js/vendor/quill.min.js"></script>
    <!-- quill Init js-->
    <script src="assets/js/pages/demo.quilljs.js"></script>

</body>

</html>