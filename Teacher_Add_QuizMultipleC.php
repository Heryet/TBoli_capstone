<?php
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
    <!-- Select2 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0/css/select2.min.css" rel="stylesheet" />

    <!-- jQuery (required for Select2) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Select2 JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0/js/select2.min.js"></script>


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
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Hyper</a></li>
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                                        <li class="breadcrumb-item active">Starter</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Add quiz assignment</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                </div> <!-- container -->

            </div> <!-- content -->

            <div class="row">
                <div class="card">
                    <div class="card-header mb-3">
                        <h4>Add Quiz</h4>
                    </div>
                    <form action="teacher_add_quiz_multiplec.php?user_id=<?php echo $row['user_id'] ?>" method="POST"
                        id="multiple_choice">
                        <div class="mb-3 me-5 ms-4">
                            <label for="simpleinput" class="form-label">Title</label>
                            <input type="text" id="simpleinput" class="form-control" name="title">
                            <div class="col-lg-3 me-4">
                                <?php
                                include 'dbcon.php';

                                $sql = "SELECT tbl_lesson.lesson_id, tbl_lesson.name, tbl_lesson.type, tbl_lesson.level, tbl_lesson_files.status FROM tbl_lesson
                                JOIN tbl_lesson_files ON tbl_lesson.lesson_id = tbl_lesson_files.lesson_files_id
                                WHERE tbl_lesson_files.status = 1";

                                $result = mysqli_query($conn, $sql);

                                if ($result && mysqli_num_rows($result) > 0) {
                                    // No need to fetch the first row here
                                } else {
                                    echo "No records found in tbl_admin";
                                }
                                ?>
                                <div class="mb-3" style="width: 300px;">
                                    <label for="inputState" class="form-label">Select Lesson</label>
                                    <select id="inputState" class="form-select" name="lesson">
                                        <option selected disabled></option>
                                        <?php
                                        if (mysqli_num_rows($result) > 0) {
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                $lesson_id = $row['lesson_id'];
                                                $name = $row['name'];
                                                $type = $row['type'];
                                                $level = $row['level'];
                                                echo "<option value='$lesson_id'>$type: $level - $name</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <h3 class="ms-4 mt-3 mb-3">Options</h3>
                        <div class="row">
                            <div class="col-lg-2 ms-4">
                                <div class="mb-3">
                                    <label for="Max Score" class="form-label">Max Score</label>
                                    <input type="text" id="Max Score" class="form-control" name="max">
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="mb-3 position-relative" id="datepicker1">
                                    <label class="form-label">Date Start</label>
                                    <input type="datetime-local" class="form-control" name="date_start">
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="mb-3 position-relative" id="datepicker1">
                                    <label class="form-label">Due</label>
                                    <input type="datetime-local" class="form-control" name="due">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-2 ms-4 mt-4">
                                <div class="mb-3 p-0">
                                    <input type="checkbox" class="form-check-input" id="customCheck1" name="allow">
                                    <label for="customCheck1" class="form-check-label">Allow Late?</label>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="mb-3">
                                    <label for="Grading" class="form-label">Grading</label>
                                    <select id="Grading" class="form-select" name="grading">
                                        <option selected disabled>Select grading options</option>
                                        <option>Latest Grade</option>
                                        <option>Highest Grade</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-2 me-4">
                                <div class="mb-3">
                                    <label for="inputState" class="form-label">Grading Score</label>
                                    <select id="inputState" class="form-select" name="grading_score">
                                        <option selected disabled>Select score options</option>
                                        <option value="best score">Best Score</option>
                                        <option value="latest score">Latest Score</option>
                                    </select>
                                </div>
                            </div>
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
                            <div class="instructions" id="snow-editor" style="height: 300px;" name="instructions"></div>
                        </div>
                        <div class="row justify-content-md-center mt-4">
                            <div class="card col-sm-11">
                                <div class="card-body">
                                    <div class="row mt-4">
                                        <div class="col-sm-6 offset-sm-3 text-center">
                                            <input type="submit" class="btn btn-primary" value="Create Quiz" name="createquiz">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <script>
            $(document).ready(function () {
                $("#multiple_choice").on("submit", function () {
                    var hvalue = $('.instructions').text();
                    $(this).append("<input type='hidden' name='instructions' value=' " + hvalue + " '/>");
                });
            });
        </script>



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
        $(document).ready(function () {
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