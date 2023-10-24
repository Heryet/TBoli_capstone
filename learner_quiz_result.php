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

    <style>
tr.selected-answer.correct {
  background-color: #4CAF50; /* Green color for correct answer */
  color: white;
}

tr.selected-answer.incorrect {
  background-color: #FF0000; /* Red color for incorrect answer */
  color: white;
}

tr.selected-answer.correct label {
  color: white;
}

tr.selected-answer.incorrect label {
  color: white;
}
    </style>
</head>

<body <?php include('dataconfig.php') ?>>
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
                                    echo "No user ID ";
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
            <div class="container">
        <!-- Check if the score is available and display it -->
        <?php
        include 'dbcon.php';

        if (isset($_GET['quiz_options_id'])) {
            $quiz_options_id = $_GET['quiz_options_id'];

            // Retrieve the learner's scores from the tbl_quiz_score table
            $sql = "SELECT tbl_quiz_score.quiz_score_id, tbl_quiz_score.question_id, tbl_quiz_score.score, tbl_quiz_score.max_score
                FROM `tbl_quiz_score`
                WHERE question_id = '$quiz_options_id'";

            $result = mysqli_query($conn, $sql);

            if ($result) {
                if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    $quiz_score_id = $row['quiz_score_id'];
                    $question_id = $row['question_id'];
                    $score = $row['score'];
                    $max_score = $row['max_score'];
                    ?>
                    <h2>Your Score: </h2>
                    <div class="row justify-content-md-center">
                        <div class="card col-sm-10">
                            <div class="card-body">
                                <?php
                                $percentage = round(($score / $max_score) * 100);
                                $passingScore = 75;
                                $perfectScore = 100;

                                if ($percentage == $perfectScore) {
                                    $resultText = 'Perfect';
                                    $circleColor = 'green';

                                    $sqlPerfect = "UPDATE tbl_quiz_score SET remark = 'PERFECT' WHERE user_id = '$user_id'";
                                    $perfectResult = mysqli_query($conn, $sqlPerfect);
                                } elseif ($percentage >= $passingScore) {
                                    $resultText = 'Pass';
                                    $circleColor = 'green';

                                    $sqlPassed = "UPDATE tbl_quiz_score SET remark = 'PASSED' WHERE user_id = '$user_id'";
                                    $passResult = mysqli_query($conn, $sqlPassed);
                                } else {
                                    $resultText = 'Fail';
                                    $circleColor = 'red';

                                    $sqlFailed = "UPDATE tbl_quiz_score SET remark = 'FAILED' WHERE user_id = '$user_id'";
                                    $failResult = mysqli_query($conn, $sqlFailed);
                                }

                                $scoreText = $score . ' / ' . $max_score;
                                ?>
                                <div style="width: 200px; height: 200px; border-radius: 50%; background-color: transparent; border: 5px solid <?php echo $circleColor; ?>; display: flex; align-items: center; justify-content: center; flex-direction: column; margin: 0 auto;">
                                    <h2 style="margin: 0; font-size: 50px;"><?php echo $percentage; ?>%</h2>
                                    <p style="margin: 5px 0 0; font-size: 24px; text-align: center;"><?php echo $scoreText; ?></p>
                                    <p style="margin: 5px 0 0; font-size: 24px; text-align: center;"><?php echo $resultText; ?></p>
                                </div>
                                <?php
                                ?>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            } else {
                echo 'Error: ' . mysqli_error($conn);
            }
        } else {
            echo '<h2>No user ID provided.</h2>';
        }
        ?>
  
    </div>
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
                                
                                $sql = "SELECT tbl_quiz_question.question, tbl_quiz_question.question_id FROM tbl_quiz_question 
                                        WHERE tbl_quiz_question.quiz_options_id = '$quiz_options_id'";
                                
                                $result = mysqli_query($conn, $sql);
                                
                                if ($result && mysqli_num_rows($result) > 0) {
                                    $questionNumber = 1;
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $question_id = $row['question_id'];
                                        
                                        // Retrieve the correct answer for the question
                                        $sql_correct_choice = "SELECT tbl_quiz_choices.choices, tbl_quiz_choices.is_right FROM tbl_quiz_choices 
                                                                WHERE tbl_quiz_choices.question_id = '$question_id' AND tbl_quiz_choices.is_right = 1";
                                        
                                        $result_correct_choice = mysqli_query($conn, $sql_correct_choice);
                                        
                                        // Check if a valid result was obtained
                                        if ($result_correct_choice) {
                                            $correct_choice = mysqli_fetch_assoc($result_correct_choice);
                                            $isCorrect = false; // Flag to check if the selected answer is correct
                                            
                                            if ($correct_choice) {
                                                $correct_answer = $correct_choice['choices'];
                                                // Retrieve the selected answer for the user
                                                $sql_selected_answer = "SELECT tbl_quiz_answer.selected_answer FROM tbl_quiz_answer 
                                                                        WHERE tbl_quiz_answer.question_id = '$question_id' AND tbl_quiz_answer.user_id = '$user_id'";
                                                
                                                $result_selected_answer = mysqli_query($conn, $sql_selected_answer);
                                                
                                                if ($result_selected_answer) {
                                                    $selected_answer = mysqli_fetch_assoc($result_selected_answer);
                                                    
                                                    if ($selected_answer) {
                                                        $user_selected_answer = $selected_answer['selected_answer'];
                                                        $isCorrect = ($user_selected_answer == $correct_answer);
                                                    }
                                                }
                                            }
                                            
                                            // Store the correct answer in a hidden input
                                            echo '<input type="hidden" name="correct_answer_' . $questionNumber . '" value="' . $correct_answer . '">';
                                            
                                            // Add a CSS class to style the radio button based on correctness
                                            $radioClass = $isCorrect ? 'correct' : 'incorrect';
                                        }
                                        
                                        ?>
                                        <div class="card card-body mb-0">
                                            <h5 class="card-title">Question <?php echo $questionNumber . ': ' . $row['question']; ?></h5>
                                            <br>
                                            <div class="list-group">
                                                <table class="table table-hover">
                                                    <tbody>
                                                        <?php
                                                        $sql_choices = "SELECT tbl_quiz_choices.choices FROM tbl_quiz_choices WHERE question_id = '$question_id'";
                                                        $result_choices = mysqli_query($conn, $sql_choices);
                                                        while ($result_choices && $row_choices = mysqli_fetch_assoc($result_choices)) {
                                                            ?>
                                                            <tr class="<?php echo ($user_selected_answer == $row_choices['choices']) ? 'selected-answer' : ''; echo ($isCorrect) ? ' correct' : ' incorrect'; ?>">
                                                                <td>
                                                                    <div class="form-check form-check-inline">
                                                                        <input type="radio" id="customRadio<?php echo $questionNumber; ?>"
                                                                            name="customRadio<?php echo $questionNumber; ?>"
                                                                            class="form-check-input" value="<?php echo $row_choices['choices']; ?>"
                                                                            <?php if ($user_selected_answer == $row_choices['choices']) {
                                                                                echo 'checked';
                                                                            } ?> disabled> <!-- Add disabled attribute here -->
                                                                        <label class="form-check-label" for="customRadio<?php echo $questionNumber; ?>">
                                                                            <?php echo $row_choices['choices']; ?>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                            }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <?php
                                        
                                        $questionNumber++; // Increment the question number for the next iteration
                                    }
                                }
                            }
                            ?>
                            <?php 
                            $sql = "SELECT tbl_quiz_score.remark, tbl_quiz_score.attempts AS scoreAttempts, tbl_quiz_options.attempts AS optionsAttempts 
                            FROM tbl_quiz_score 
                            JOIN tbl_quiz_options ON tbl_quiz_score.question_id = tbl_quiz_options.quiz_options_id
                            WHERE tbl_quiz_score.user_id = '$user_id'";
                            $result = mysqli_query($conn, $sql);
                            

                            if($result){
                                $row = mysqli_fetch_assoc($result);
                                $remark = $row['remark'];
                                $scoreAttempts = $row['scoreAttempts'];
                                $optionsAttempts = $row['optionsAttempts'];
                                if ($scoreAttempts >= $optionsAttempts){
                                    ?>
                                    <div class="row">
                                        <div class="col-sm-6 text-md-end">
                                            <a href="Learner_index.php" class="btn btn-primary">Dashboard</a>
                                        </div>
                                    </div>
                                    <?php
                                }
                                elseif($remark == 'FAILED') {
                                    ?>
                                    <div class="row">
                                        <div class="col-sm-6 text-md-end">
                                            <a href="Learner_Retake_Quiz.php?quiz_options_id=<?php echo $quiz_options_id ?>" class="btn btn-primary">Retake Quiz</a>
                                        </div>
                                    </div>
                                    <?php
                                } elseif ($remark == 'PASSED'){
                                    ?> 
                                    <div class="row">
                                        <div class="col-sm-6 text-md-end">
                                            <a href="Learner_Retake_Quiz.php?quiz_options_id=<?php echo $quiz_options_id ?>" class="btn btn-primary">Retake Quiz</a>
                                        </div>
                                    </div>
                                    <?php
                                } else {
                                    ?>
                                    <div class="row">
                                        <div class="col-sm-6 text-md-end">
                                            <a href="Learner_index.php" class="btn btn-primary">Dashboard</a>
                                        </div>
                                    </div>
                                    <?php
                                }
                            }
                            ?>
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