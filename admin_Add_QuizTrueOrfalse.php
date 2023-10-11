<?php
session_start();
$user_id = $_SESSION['user_id'];
?>
<!DOCTYPE html>
<html lang="en" class="menuitem-active">

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
    <link href="assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style" disabled="disabled">

    <!-- Quill css -->
    <link href="assets/css/vendor/quill.core.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/vendor/quill.snow.css" rel="stylesheet" type="text/css" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-pzjw8+ua9bmDXzKrQl/Mv6D5stvOBbhddb5y3p4e9fJ8D4w5erhPvj6M2ybp7l3b" crossorigin="anonymous">
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
                                    <ul class="side-nav">


                                        <li class="side-nav-item">
                                            <a href="admin_dashboard.php" class="side-nav-link">
                                                <i class="uil-home"></i>
                                                <span>Dashboard</span>
                                            </a>
                                        </li>

                                        <li class="side-nav-item">
                                            <a data-bs-toggle="collapse" href="#sidebarDashboards" aria-expanded="false"
                                                aria-controls="sidebarDashboards" class="side-nav-link collapsed">
                                                <i class="uil-user-plus"></i>
                                                <span class="badge bg-success float-end"></span>
                                                <span> Users </span>
                                                <span class="menu-arrow"></span>
                                            </a>
                                            <div class="collapse" id="sidebarDashboards" style="">
                                                <ul class="side-nav-second-level">
                                                    <li>
                                                        <a href="admin_addAccount.php">Admin</a>
                                                    </li>
                                                    <li>
                                                        <a href="admin_student.php">Student</a>
                                                    </li>
                                                    <li>
                                                        <a href="admin_teacher.php">Teacher</a>
                                                    </li>

                                                </ul>
                                            </div>
                                        </li>

                                        <li class="side-nav-item">
                                            <a href="admin_manage_lesson.php" class="side-nav-link">
                                                <i class="fa fa-book"></i>
                                                <span>Manage Lesson</span>
                                            </a>
                                        </li>

                                        <li class="side-nav-item">
                                            <a data-bs-toggle="collapse" href="#sidebarDashboardsLessons"
                                                aria-expanded="false" aria-controls="sidebarDashboards"
                                                class="side-nav-link collapsed">
                                                <i class="uil-user-plus"></i>
                                                <span class="badge bg-success float-end"></span>
                                                <span> Manage Request Lessons </span>
                                                <span class="menu-arrow"></span>
                                            </a>
                                            <div class="collapse" id="sidebarDashboardsLessons" style="">
                                                <ul class="side-nav-second-level">
                                                    <li>
                                                        <a href="admin_accepted_lessons.php">Accepted Lessons</a>
                                                    </li>
                                                    <li>
                                                        <a href="admin_pending_lessons.php">Pending Lessons</a>
                                                    </li>
                                                    <li>
                                                        <a href="admin_archive_lessons.php">Archive Lessons</a>
                                                    </li>

                                                </ul>
                                            </div>
                                        </li>

                                        <li class="side-nav-item">
                                            <a data-bs-toggle="collapse" href="#sidebarquiz" aria-expanded="false"
                                                aria-controls="sidebarquiz" class="side-nav-link collapsed">
                                                <i class="uil-user-plus"></i>
                                                <span class="badge bg-success float-end"></span>
                                                <span> Manage Quiz </span>
                                                <span class="menu-arrow"></span>
                                            </a>
                                            <div class="collapse" id="sidebarquiz">
                                                <ul class="side-nav-third-level">
                                                    <li>
                                                        <a href="admin_Add_QuizMultiple.php"><i
                                                                class=" uil-list-ul"></i> Multiple Choice</a>
                                                    </li>
                                                    <li>
                                                        <a href="admin_Add_QuizTrueOrfalse.php"><i
                                                                class=" uil-check-circle"></i> <i
                                                                class="uil-times-circle"></i> True or False</a>
                                                    </li>
                                                    <li>
                                                        <a href="admin_QuizView.php"><i class="uil-eye"></i> Quiz
                                                            View</a>
                                                    </li>

                                                </ul>
                                            </div>
                                        </li>
                                        <li class="side-nav-item">
                                            <a href="admin_assign_lesson_to_teacher.php " class="side-nav-link">
                                                <i class="uil-user-plus"></i>
                                                <span>Assign Lesson to Teacher</span>
                                            </a>
                                        </li>
                                        <li class="side-nav-item">
                                            <a data-bs-toggle="collapse" href="#sidebarclass" aria-expanded="false"
                                                aria-controls="sidebarclass" class="side-nav-link">
                                                <i class="uil-folder-plus"></i>
                                                <span> Manage Class/Section </span>
                                                <span class="menu-arrow"></span>
                                            </a>
                                            <div class="collapse" id="sidebarclass">
                                                <ul class="side-nav-second-level">
                                                    <li>
                                                        <a href="admin_class.php">Create Class/Section</a>
                                                    </li>
                                                    <li>
                                                        <a href="admin_assign_teacher_class.php">Assign Teacher to
                                                            Class</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li class="side-nav-item">
                                            <a data-bs-toggle="collapse" href="#sidebarArea" aria-expanded="false"
                                                aria-controls="sidebarArea" class="side-nav-link">
                                                <i class="uil-folder-plus"></i>
                                                <span> Manage Area </span>
                                                <span class="menu-arrow"></span>
                                            </a>
                                            <div class="collapse" id="sidebarArea">
                                                <ul class="side-nav-second-level">
                                                    <li>
                                                        <a href="admin_manage_area.php">Create/Register Area</a>
                                                    </li>
                                                    <li>
                                                        <a href="admin_assign_teacher_lesson.php">Assign Teacher to
                                                            Area</a>
                                                    </li>
                                                    <li>
                                                        <a href="admin_assign_class_area.php">Assign Class to Area</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li class="side-nav-item">
                                            <a href="#" class="side-nav-link">
                                                <i class="uil-user-plus"></i>
                                                <span>Progress</span>
                                            </a>
                                        </li>

                                        <li class="side-nav-item">
                                            <a data-bs-toggle="collapse" href="#sidebarEmail" aria-expanded="false"
                                                aria-controls="sidebarEmail" class="side-nav-link">
                                                <i class="uil-folder-plus"></i>
                                                <span> Reports </span>
                                                <span class="menu-arrow"></span>
                                            </a>
                                            <div class="collapse" id="sidebarEmail">
                                                <ul class="side-nav-second-level">
                                                    <li>
                                                        <a href="#">List of Teacher</a>
                                                    </li>
                                                    <li>
                                                        <a href="#">List of Admin</a>
                                                    </li>
                                                    <li>
                                                        <a href="#">List of Learners</a>
                                                    </li>
                                                    <li>
                                                        <a href="#">List of Lesson w/Content</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>

                                    </ul>


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
                <div class="navbar-custom">
                    <ul class="list-unstyled topbar-menu float-end mb-0">
                        <li class="dropdown notification-list d-lg-none">
                            <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#"
                                role="button" aria-haspopup="false" aria-expanded="false">
                                <i class="dripicons-search noti-icon"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-animated dropdown-lg p-0">
                                <form class="p-3">
                                    <input type="text" class="form-control" placeholder="Search ..."
                                        aria-label="Recipient's username">
                                </form>
                            </div>
                        </li>





                        <li class="dropdown notification-list">
                            <a class="nav-link dropdown-toggle nav-user arrow-none me-0" data-bs-toggle="dropdown"
                                href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <span class="account-user-avatar">
                                    <img src="assets/images/users/avatar-1.jpg" alt="user-image" class="rounded-circle">
                                </span>
                                <span>
                                    <?php
                                    include 'dbcon.php';

                                    if (isset($_SESSION['user_id'])) {
                                        $user_id = $_SESSION['user_id'];

                                        $sql = "SELECT tbl_userinfo.user_id, tbl_userinfo.firstname, tbl_userinfo.middlename, tbl_userinfo.lastname, tbl_user_level.level
                                                    FROM tbl_admin
                                                    JOIN tbl_userinfo ON tbl_admin.user_id = tbl_userinfo.user_id
                                                    JOIN tbl_user_level ON tbl_admin.level_id = tbl_user_level.level_id
                                                    WHERE tbl_user_level.level = 'ADMIN' AND tbl_userinfo.user_id = '$user_id'
                                                    LIMIT 1;";

                                        $result = mysqli_query($conn, $sql);

                                        if ($result && mysqli_num_rows($result) > 0) {
                                            $row = mysqli_fetch_assoc($result);
                                            ?>
                                            <span class="account-user-name">
                                                <?php echo $row['firstname'] . ' ' . $row['lastname'] . ' ' . $row['lastname']; ?>
                                            </span>
                                            <span class="account-position">
                                                <?php echo $row['level']; ?>
                                            </span>
                                            <?php
                                        } else {
                                            echo "No records found in tbl_admin";
                                        }
                                    } else {
                                        echo "No user ID provided";
                                    }
                                    ?>
                                </span>
                            </a>
                            <div
                                class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu profile-dropdown">
                                <!-- item-->
                                <div class=" dropdown-header noti-title">
                                    <h6 class="text-overflow m-0">Welcome !</h6>
                                </div>

                                <!-- item-->
                                <a href="admin_profile.php" class="dropdown-item notify-item">
                                    <i class="mdi mdi-account-circle me-1"></i>
                                    <span>My Account</span>
                                </a>
                                <!-- item-->
                                <a href="login.php?logout=true" class="dropdown-item notify-item">
                                    <i class="mdi mdi-logout me-1"></i>
                                    <span>Logout</span>
                                </a>
                            </div>
                        </li>

                    </ul>
                    <button class="button-menu-mobile open-left">
                        <i class="mdi mdi-menu"></i>
                    </button>

                </div>
                <!-- end Topbar -->
                <!-- Start Content-->
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashbaord</a></li>

                                        <li class="breadcrumb-item active">Module</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">True or False</h4>
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
                    <form action="teacher_add_quiz_trueorfalse.php?user_id=<?php echo $row['user_id'] ?>" method="POST"
                        id="multiple_choice">
                        <div class="mb-3 me-5 ms-4">
                            <label for="simpleinput" class="form-label">Title</label>
                            <input type="text" id="simpleinput" class="form-control" name="title">
                            <div class="col-lg-3 me-4">
                                <?php
                                include 'dbcon.php';

                                $sql = "SELECT tbl_lesson.lesson_id, tbl_lesson.name, tbl_lesson.type, GROUP_CONCAT(DISTINCT tbl_lesson_files.status) AS status
                                            FROM tbl_content
                                            JOIN tbl_lesson ON tbl_lesson.lesson_id = tbl_content.lesson_id
                                            JOIN tbl_lesson_files ON tbl_lesson_files.lesson_files_id = tbl_content.lesson_files_id
                                            WHERE tbl_lesson_files.status = 1
                                            GROUP BY tbl_lesson.name";

                                $result = mysqli_query($conn, $sql);

                                if ($result && mysqli_num_rows($result) > 0) {
                                    // No need to fetch the first row here
                                } else {
                                    echo "No records found in tbl_admin";
                                }
                                ?>
                                <div class="mb-3">
                                    <label for="inputState" class="form-label">Select Lesson</label>
                                    <select id="inputState" class="form-select" name="lesson">
                                        <option selected disabled>Select Lesson</option>
                                        <?php
                                        if (mysqli_num_rows($result) > 0) {
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                $lesson_id = $row['lesson_id'];
                                                $name = $row['name'];
                                                $type = $row['type'];
                                                echo "<option value='$lesson_id'>$type: $name</option>";
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
                            <div class="col-lg-2">
                                <div class="mb-3">
                                    <label for="inputState" class="form-label">Grading Score</label>
                                    <select id="inputState" class="form-select" name="grading_score">
                                        <option selected disabled>Select score options</option>
                                        <option value="best score">Best Score</option>
                                        <option value="latest score">Latest Score</option>
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
                                    <div class="question-list">
                                        <div class="question-container mb-4">
                                            <label>Question #1</label>
                                            <textarea class="form-control mb-3" name="questions[]" cols="130" rows="5"
                                                placeholder="Enter your Questions here" required></textarea>
                                            <table class="table table-hover">
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <div class="form-check form-check-inline">
                                                                <input type="radio" id="customRadio1a"
                                                                    name="correct_choice[0]" class="form-check-input"
                                                                    value="true">
                                                                <label class="form-check-label"
                                                                    for="customRadio1a">True</label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="form-check form-check-inline">
                                                                <input type="radio" id="customRadio1b"
                                                                    name="correct_choice[0]" class="form-check-input"
                                                                    value="false">
                                                                <label class="form-check-label"
                                                                    for="customRadio1b">False</label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-sm-6">
                                            <input type="submit" class="btn btn-primary" value="Create Quiz"
                                                name="createquiz">
                                        </div>
                                        <div class="col-sm-6 text-sm-end">
                                            <input type="button" class="btn btn-primary add-question-btn"
                                                value="Add Question" name="addquestion">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- JavaScript to add more questions dynamically -->
            <script>
                var questionCounter = 1;

                // Function to add new question fields
                function addQuestionField() {
                    questionCounter++;
                    var questionDiv = document.createElement('div');
                    questionDiv.classList.add('question-container', 'mb-4');
                    questionDiv.innerHTML = `
                    <label>Question #${questionCounter}</label>
                    <textarea class="form-control mb-3" name="questions[]" cols="130" rows="5" placeholder="Enter your Question here" required></textarea>
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <td>
                                    <div class="form-check form-check-inline">
                                        <input type="radio" id="customRadio${questionCounter}a" name="correct_choice[${questionCounter - 1}]" class="form-check-input" value="true">
                                        <label class="form-check-label" for="customRadio${questionCounter}a">True</label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-check form-check-inline">
                                        <input type="radio" id="customRadio${questionCounter}b" name="correct_choice[${questionCounter - 1}]" class="form-check-input" value="false">
                                        <label class="form-check-label" for="customRadio${questionCounter}b">False</label>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                `;
                    var questionList = document.querySelector('.question-list');
                    questionList.appendChild(questionDiv);
                }

                // Add event listener for the "Add Question" button
                var addQuestionBtn = document.querySelector('.add-question-btn');
                addQuestionBtn.addEventListener('click', addQuestionField);
            </script>

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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha384-KyZXEAg3QhqLMpG8r+Ud0QD2JyKn2tv8U+X9s70gcS4lSAwiGgFA1fJp6jRX4UX5"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-pzjw8+ua9bmDXzKrQl/Mv6D5stvOBbhddb5y3p4e9fJ8D4w5erhPvj6M2ybp7l3b"
        crossorigin="anonymous"></script>
    <script>
        $(document).ready(function () {
            $('#add-lesson-btn').click(function () {
                $('#add-quiz-modal').modal('show');
            });
        });
    </script>




    </div>
    </div>
    </div>
    </div>
    <div class="simplebar-placeholder" style="width: 280px; height: 755px;"></div>
    </div>
    <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
        <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
    </div>
    <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
        <div class="simplebar-scrollbar" style="height: 671px; transform: translate3d(0px, 0px, 0px); display: block;">
        </div>
    </div>
    </div>
    </div>

    <div class="rightbar-overlay"></div>
    <!-- /End-bar -->


    <!-- bundle -->
    <script src="assets/js/vendor.min.js"></script>
    <script src="assets/js/app.min.js"></script>

    <!-- quill js -->
    <script src="assets/js/vendor/quill.min.js"></script>
    <!-- quill Init js-->
    <script src="assets/js/pages/demo.quilljs.js"></script>



</body>

</html>