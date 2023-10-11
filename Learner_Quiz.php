<?php
session_start();
$user_id = $_SESSION['user_id'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <!-- <title>Project Dashboard | Hyper - Responsive Bootstrap 5 Admin Dashboard</title> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description">
    <meta content="Coderthemes" name="author">
    <!-- App favicon -->
    <!-- <link rel="shortcut icon" href="assets/images/favicon.ico"> -->

    <!-- App css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="light-style">
    <link href="assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style" disabled="disabled">

</head>

<body class=""
    data-layout-config="{&quot;leftSideBarTheme&quot;:&quot;dark&quot;,&quot;layoutBoxed&quot;:false, &quot;leftSidebarCondensed&quot;:false, &quot;leftSidebarScrollable&quot;:false,&quot;darkMode&quot;:false, &quot;showRightSidebarOnStart&quot;: false}"
    style="visibility: visible;" data-leftbar-theme="dark">
    <!-- Begin page -->
    <div class="wrapper">
        <!-- ========== Left Sidebar Start ========== -->
        <div class="leftside-menu">

            <!-- LOGO -->
            <a href="index.php" class="logo text-center logo-light">
                <span class="logo-lg">
                    <img src="assets/images/" alt="" height="16">
                </span>
                <span class="logo-sm">
                    <img src="assets/images/logo_sm.png" alt="" height="16">
                </span>
            </a>

            <!-- LOGO -->
            <a href="index.php" class="logo text-center logo-dark">
                <span class="logo-lg">
                    <img src="assets/images/logo-dark.png" alt="" height="16">
                </span>
                <span class="logo-sm">
                    <img src="assets/images/logo_sm_dark.png" alt="" height="16">
                </span>
            </a>

            <div class="h-100" id="leftside-menu-container" data-simplebar="init">
                <div class="simplebar-wrapper" style="margin: 0px;">
                    <div class="simplebar-height-auto-observer-wrapper">
                        <div class="simplebar-height-auto-observer"></div>
                    </div>
                    <div class="simplebar-mask">
                        <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                            <div class="simplebar-content-wrapper" style="height: 100%; overflow: hidden scroll;">
                                <div class="simplebar-content" style="padding: 0px;">

                                    <!--- Sidemenu -->
                                    <?php include('learnerSideMenu.php') ?>


                                    <!-- End Sidebar -->

                                    <div class="clearfix"></div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="simplebar-placeholder" style="width: 260px; height: 1512px;"></div>
                </div>
                <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                    <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
                </div>
                <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
                    <div class="simplebar-scrollbar"
                        style="height: 344px; transform: translate3d(0px, 0px, 0px); display: block;"></div>
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
                            <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#"
                                role="button" aria-haspopup="false" aria-expanded="false">
                                <i class="dripicons-bell noti-icon"></i>
                                <span class="noti-icon-badge"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated dropdown-lg">

                                <!-- item-->
                                <div class="dropdown-item noti-title">
                                    <h5 class="m-0">
                                        <span class="float-end">
                                            <a href="javascript: void(0);" class="text-dark">
                                                <small>Clear All</small>
                                            </a>
                                        </span>Notification
                                    </h5>
                                </div>

                                <div style="max-height: 230px;" data-simplebar="init">
                                    <div class="simplebar-wrapper" style="margin: 0px;">
                                        <div class="simplebar-height-auto-observer-wrapper">
                                            <div class="simplebar-height-auto-observer"></div>
                                        </div>
                                        <div class="simplebar-mask">
                                            <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                                                <div class="simplebar-content-wrapper"
                                                    style="height: auto; overflow: hidden;">
                                                    <div class="simplebar-content" style="padding: 0px;">

                                                        <!-- All-->
                                                        <a href="javascript:void(0);"
                                                            class="dropdown-item text-center text-primary notify-item notify-all">
                                                            View All
                                                        </a>

                                                    </div>
                        </li>


                        <li class="dropdown notification-list">
                            <a class="nav-link dropdown-toggle nav-user arrow-none me-0" data-bs-toggle="dropdown"
                                href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <span class="account-user-avatar">
                                    <img src="assets/images/users/avatar-1.jpg" alt="user-image" class="rounded-circle">
                                </span>

                                <?php
                                include 'dbcon.php';

                                if (isset($_SESSION['user_id'])) {
                                    $user_id = $_SESSION['user_id'];

                                    $sql = "SELECT tbl_userinfo.user_id, tbl_userinfo.firstname, tbl_userinfo.middlename, tbl_userinfo.lastname, tbl_user_level.level
                                                FROM tbl_learner
                                                JOIN tbl_userinfo ON tbl_learner.user_id = tbl_userinfo.user_id
                                                JOIN tbl_user_level ON tbl_learner.level_id = tbl_user_level.level_id
                                                WHERE tbl_user_level.level = 'LEARNER' AND tbl_userinfo.user_id = '$user_id'
                                                LIMIT 1;";

                                    $result = mysqli_query($conn, $sql);

                                    if ($result && mysqli_num_rows($result) > 0) {
                                        $row = mysqli_fetch_assoc($result);
                                        ?>
                                        <span>
                                            <span class="account-user-name">
                                                <?php echo $row['firstname'] . ' ' . $row['middlename'] . ' ' . $row['lastname']; ?>
                                            </span>
                                            <span class="account-position">
                                                <?php echo $row['level']; ?>
                                            </span>
                                        </span>
                                        <?php
                                    } else {
                                        echo "No records found in tbl_learner";
                                    }
                                } else {
                                    echo "No user ID provided";
                                }
                                ?>
                            </a>
                            <div
                                class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu profile-dropdown">
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="mdi mdi-account-circle me-1"></i>
                                    <span>My Account</span>
                                </a>
                                <!-- item-->
                                <a href="learner_login.php?logout=true" class="dropdown-item notify-item">
                                    <i class="mdi mdi-logout me-1"></i>
                                    <span>Logout</span>
                                </a>
                            </div>
                        </li>

                    </ul>
                    <button class="button-menu-mobile open-left">
                        <i class="mdi mdi-menu"></i>
                    </button>
                    <div class="app-search dropdown d-none d-lg-block">
                        <form>
                            <div class="input-group">
                                <input type="text" class="form-control dropdown-toggle" placeholder="Search..."
                                    id="top-search">
                                <span class="mdi mdi-magnify search-icon"></span>
                                <button class="input-group-text btn-primary" type="submit">Search</button>
                            </div>
                        </form>

                        <div class="dropdown-menu dropdown-menu-animated dropdown-lg" id="search-dropdown">

                            <!-- item-->


                            <div class="notification-list">
                                <!-- item-->



                            </div>
                            </a>
                        </div>
                    </div>
                </div>
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

                                    <!-- <li class="breadcrumb-item"><a href="Teacher_index.php">Dashboard</a></li> -->

                                </ol>
                            </div>
                            <!-- <h4 class="page-title">TOPICS</h4> -->
                        </div>
                    </div>
                </div>
                <!-- end page title -->
                <form action="learner_submit_quiz.php" method="post">
                    <div class="row justify-content-md-center mt-4">
                        <div class="card col-sm-10">
                            <div class="card-body">
                                <?php
                                include 'dbcon.php';
                                if (isset($_GET['quiz_options_id'])) {
                                    $quiz_options_id = $_GET['quiz_options_id'];

                                    $sql = "SELECT tbl_quiz_options.quiz_options_id, tbl_quiz_multiple_choice.multiple_choice_id, tbl_quiz_multiple_choice.quiz_options_id, 
                                        tbl_quiz_multiple_choice.question, tbl_quiz_multiple_choice.choiceA, tbl_quiz_multiple_choice.choiceB, tbl_quiz_multiple_choice.choiceC, 
                                        tbl_quiz_multiple_choice.choiceD, tbl_quiz_multiple_choice.correct_answer
                                        FROM tbl_quiz_options
                                        JOIN tbl_quiz_multiple_choice ON tbl_quiz_options.quiz_options_id = tbl_quiz_multiple_choice.quiz_options_id
                                        WHERE tbl_quiz_options.quiz_options_id = $quiz_options_id";

                                    $result = mysqli_query($conn, $sql);

                                    if ($result && mysqli_num_rows($result) > 0) {
                                        $questionNumber = 1;
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            ?>
                                            <div class="card card-body mb-0">
                                                <h5 class="card-title">Question
                                                    <?php echo $questionNumber; ?>
                                                </h5>
                                                <p class="mt-2">
                                                    <?php echo $row['question'] ?>
                                                </p>
                                                <div class="list-group">
                                                    <table class="table table-hover">
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <div class="form-check form-check-inline">
                                                                        <!-- Set the input name to customRadio<?php echo $questionNumber; ?>[] -->
                                                                        <input type="radio" id="customRadio1"
                                                                            name="customRadio<?php echo $questionNumber; ?>[]"
                                                                            class="form-check-input" value="a" required>
                                                                        <label class="form-check-label" for="customRadio1">
                                                                            <?php echo $row['choiceA'] ?>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <div class="form-check form-check-inline">
                                                                        <!-- Set the input name to customRadio<?php echo $questionNumber; ?>[] -->
                                                                        <input type="radio" id="customRadio2"
                                                                            name="customRadio<?php echo $questionNumber; ?>[]"
                                                                            class="form-check-input" value="b" required>
                                                                        <label class="form-check-label" for="customRadio2">
                                                                            <?php echo $row['choiceB'] ?>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <div class="form-check form-check-inline">
                                                                        <!-- Set the input name to customRadio<?php echo $questionNumber; ?>[] -->
                                                                        <input type="radio" id="customRadio3"
                                                                            name="customRadio<?php echo $questionNumber; ?>[]"
                                                                            class="form-check-input" value="c" required>
                                                                        <label class="form-check-label" for="customRadio3">
                                                                            <?php echo $row['choiceC'] ?>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <div class="form-check form-check-inline">
                                                                        <!-- Set the input name to customRadio<?php echo $questionNumber; ?>[] -->
                                                                        <input type="radio" id="customRadio4"
                                                                            name="customRadio<?php echo $questionNumber; ?>[]"
                                                                            class="form-check-input" value="d" required>
                                                                        <label class="form-check-label" for="customRadio4">
                                                                            <?php echo $row['choiceD'] ?>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <?php
                                            $questionNumber++; // Increment the question number for the next iteration
                                        }
                                    } else {
                                        // If there are no multiple-choice questions, check for true/false questions
                                        $sql = "SELECT tbl_quiz_options.quiz_options_id, tbl_quiz_true_or_false.true_or_false_id, tbl_quiz_true_or_false.quiz_options_id,tbl_quiz_true_or_false.question, tbl_quiz_true_or_false.correct_choice
                                            FROM tbl_quiz_options
                                            JOIN tbl_quiz_true_or_false ON tbl_quiz_options.quiz_options_id = tbl_quiz_true_or_false.quiz_options_id
                                            WHERE tbl_quiz_options.quiz_options_id = $quiz_options_id";

                                        $result = mysqli_query($conn, $sql);

                                        if ($result && mysqli_num_rows($result) > 0) {
                                            $questionNumber = 1; // Initialize the question number counter for true/false questions
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                <div class="card card-body mb-0">
                                                    <h5 class="card-title">Question
                                                        <?php echo $questionNumber; ?>
                                                    </h5> <!-- Display the question number -->
                                                    <p class="mt-2">
                                                        <?php echo $row['question'] ?>
                                                    </p>
                                                    <div class="list-group">
                                                        <table class="table table-hover">
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <div class="form-check form-check-inline">
                                                                            <input type="radio" id="customRadio1"
                                                                                name="customRadio<?php echo $questionNumber; ?>"
                                                                                class="form-check-input" required>
                                                                            <label class="form-check-label"
                                                                                for="customRadio1">True</label>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <div class="form-check form-check-inline">
                                                                            <input type="radio" id="customRadio2"
                                                                                name="customRadio<?php echo $questionNumber; ?>"
                                                                                class="form-check-input" required>
                                                                            <label class="form-check-label"
                                                                                for="customRadio2">False</label>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <?php
                                                $questionNumber++; // Increment the question number for the next iteration
                                            }
                                        }
                                    }
                                }
                                ?>
                                <div class="row">
                                    <div class="col-sm-6 text-md-end">
                                        <button class="btn btn-primary" name="btnSubmit">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>



            </div> <!-- container -->

        </div> <!-- content -->



    </div>

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->


    </div>
    <!-- END wrapper -->


    <!-- Start right sidebar -->
    <?php #include('Teacher_Settings.php'); ?>
    <!-- End right side bar -->

    <!-- bundle -->
    <script src="assets/js/vendor.min.js"></script>
    <script src="assets/js/app.min.js"></script>

    <!-- third party js -->
    <script src="assets/js/vendor/Chart.bundle.min.js"></script>
    <!-- third party js ends -->

    <!-- demo app -->
    <script src="assets/js/pages/demo.dashboard-projects.js"></script>
    <!-- end demo js-->

</body>

</html>